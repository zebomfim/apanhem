/**
 * Menu Toggle Functionality
 * Responsive menu with breakpoint at 1024px
 */

// Global toggle function for inline onclick
function toggleMobileMenu() {
  const mobileMenu = document.getElementById('mobile-menu');
  const body = document.body;
  
  if (mobileMenu) {
    mobileMenu.classList.toggle('menu__mobile--open');
    
    // Prevent body scroll when menu is open
    if (mobileMenu.classList.contains('menu__mobile--open')) {
      body.style.overflow = 'hidden';
    } else {
      body.style.overflow = '';
    }
  }
}

// Global toggle function for submenu expansion
function toggleMobileSubmenu(button, event) {
  // Prevent event propagation to avoid conflicts with link clicks on Android
  if (event) {
    event.preventDefault();
    event.stopPropagation();
  }
  
  const section = button.closest('.menu__mobile-nav-section');
  const isExpanded = button.getAttribute('aria-expanded') === 'true';
  
  if (section) {
    section.classList.toggle('menu__mobile-nav-section--open');
    button.setAttribute('aria-expanded', !isExpanded);
  }
  
  // Return false to prevent any default behavior
  return false;
}

// Wait for DOM to be ready
(function() {
  'use strict';

  let resizeHandler = null;

  // Initialize menu functionality
  function initMenu() {
    const mobileMenu = document.getElementById('mobile-menu');
    const body = document.body;

    // Close mobile menu when clicking outside
    function closeMobileMenu() {
      if (mobileMenu && mobileMenu.classList.contains('menu__mobile--open')) {
        mobileMenu.classList.remove('menu__mobile--open');
        body.style.overflow = '';
      }
    }

    // Close mobile menu when clicking on links
    function closeOnLinkClick() {
      const mobileLinks = document.querySelectorAll('.menu__mobile-nav-title-link, .menu__mobile-nav-child-link');
      mobileLinks.forEach(link => {
        // Remove existing listener if any, then add new one
        const newLink = link.cloneNode(true);
        link.parentNode.replaceChild(newLink, link);
        newLink.addEventListener('click', closeMobileMenu);
      });
    }

    // Handle window resize
    function handleResize() {
      const windowWidth = window.innerWidth;
      
      // Close mobile menu on desktop
      if (windowWidth >= 1024) {
        closeMobileMenu();
      }
    }

    // Remove old resize handler if exists
    if (resizeHandler) {
      window.removeEventListener('resize', resizeHandler);
    }
    resizeHandler = handleResize;
    window.addEventListener('resize', resizeHandler);

    // Close menu on escape key (only add once)
    if (!document.menuEscapeHandler) {
      document.menuEscapeHandler = function(e) {
        if (e.key === 'Escape') {
          closeMobileMenu();
        }
      };
      document.addEventListener('keydown', document.menuEscapeHandler);
    }

    // Auto-expand sections with active pages
    function autoExpandActiveSections() {
      const activeLinks = document.querySelectorAll('.menu__mobile-nav-title-link--active, .menu__mobile-nav-child-link--active');
      activeLinks.forEach(link => {
        const section = link.closest('.menu__mobile-nav-section');
        if (section) {
          const toggle = section.querySelector('.menu__mobile-nav-toggle');
          if (toggle && !section.classList.contains('menu__mobile-nav-section--open')) {
            section.classList.add('menu__mobile-nav-section--open');
            toggle.setAttribute('aria-expanded', 'true');
          }
        }
      });
    }

    // Initialize submenu toggles with event listeners for better cross-device compatibility
    function initializeSubmenuToggles() {
      const toggles = document.querySelectorAll('.menu__mobile-nav-toggle');
      toggles.forEach(toggle => {
        // Check if already initialized to avoid duplicate listeners
        if (toggle.dataset.initialized === 'true') {
          return;
        }
        
        // Mark as initialized
        toggle.dataset.initialized = 'true';
        
        // Remove inline onclick to avoid conflicts - use only event listeners
        toggle.removeAttribute('onclick');
        
        // Add event listeners for click (works on all devices)
        toggle.addEventListener('click', function(e) {
          e.preventDefault();
          e.stopPropagation();
          e.stopImmediatePropagation();
          toggleMobileSubmenu(this, e);
          return false;
        }, { passive: false, capture: true });
        
        // Also handle mousedown for better desktop support
        toggle.addEventListener('mousedown', function(e) {
          e.preventDefault();
          e.stopPropagation();
        }, { passive: false });
      });
    }

    // Initialize
    closeOnLinkClick();
    
    // Initialize submenu toggles
    initializeSubmenuToggles();
    
    // Auto-expand active sections
    autoExpandActiveSections();
    
    // Re-initialize when menu opens (in case of dynamic content)
    if (mobileMenu && !mobileMenu.menuObserver) {
      mobileMenu.menuObserver = new MutationObserver(function(mutations) {
        mutations.forEach(function(mutation) {
          if (mutation.attributeName === 'class' && mobileMenu.classList.contains('menu__mobile--open')) {
            autoExpandActiveSections();
            // Re-initialize toggles when menu opens
            setTimeout(initializeSubmenuToggles, 100);
          }
        });
      });
      mobileMenu.menuObserver.observe(mobileMenu, { attributes: true });
    }
  }

  // Initialize on DOMContentLoaded (initial page load)
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initMenu);
  } else {
    // DOM already loaded
    initMenu();
  }

  // Make function available globally for Barba.js hooks
  window.initMenu = initMenu;
})();
