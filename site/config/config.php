<?php

// nginx-proxy en VPS pasa este header al contenedor
if (!empty($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
    $_SERVER['HTTPS'] = 'on';
}

return [
    'debug' => true,

    'panel' => [
        'install' => true,  // Desactivar en producción
    ],

    // Email: El transporte se configura automáticamente a través del componente 'email'
    // definido en el plugin websolidaria-core, leyendo las variables del .env
    'email' => [],

    // Tipografía y fechas
    'smartypants' => true,
    'languages'   => true,
    'date.handler'   => 'date',
    'date.format'    => 'j/n/Y',
    'date.timezone'  => 'Europe/Madrid',

    // SEO Plugin (tobimori/kirby-seo)
    // En local, noindex para no contaminar Google con el entorno de desarrollo
    'tobimori.seo.lang'    => 'es_ES',
    'tobimori.seo.language' => 'es',
    'tobimori.seo.robots'  => [
        'index'        => false,
        'follow'       => true,
        'noarchive'    => true,
        'nosnippet'    => true,
        'noimageindex' => true,
    ],

    // Kirby Imagex (timnarr/kirby-imagex)
    'timnarr.imagex' => [
        'cache'              => true,
        'customLazyloading' => false,
        'formats'            => ['avif', 'webp'],
        'includeInitialFormat' => true,
        'noSrcsetInImg'      => false,
        'relativeUrls'       => false,
    ],

    // Thumbs: srcsets estándar compartidos (mismo estándar que Kseman)
    'thumbs' => [
        'quality' => 80,
        'srcsets' => [
            'img-small'       => ['300w' => ['width' => 300, 'crop' => true, 'quality' => 80], '600w' => ['width' => 600, 'crop' => true, 'quality' => 80], '900w' => ['width' => 900, 'crop' => true, 'quality' => 80], '1200w' => ['width' => 1200, 'crop' => true, 'quality' => 80]],
            'img-small-webp'  => ['300w' => ['width' => 300, 'crop' => true, 'quality' => 75, 'format' => 'webp', 'sharpen' => 10], '600w' => ['width' => 600, 'crop' => true, 'quality' => 75, 'format' => 'webp', 'sharpen' => 10], '900w' => ['width' => 900, 'crop' => true, 'quality' => 75, 'format' => 'webp', 'sharpen' => 10], '1200w' => ['width' => 1200, 'crop' => true, 'quality' => 75, 'format' => 'webp', 'sharpen' => 10]],
            'img-small-avif'  => ['300w' => ['width' => 300, 'crop' => true, 'quality' => 65, 'format' => 'avif', 'sharpen' => 25], '600w' => ['width' => 600, 'crop' => true, 'quality' => 65, 'format' => 'avif', 'sharpen' => 25], '900w' => ['width' => 900, 'crop' => true, 'quality' => 65, 'format' => 'avif', 'sharpen' => 25], '1200w' => ['width' => 1200, 'crop' => true, 'quality' => 65, 'format' => 'avif', 'sharpen' => 25]],
            'img-medium'      => ['400w' => ['width' => 400, 'crop' => true, 'quality' => 80], '800w' => ['width' => 800, 'crop' => true, 'quality' => 80], '1200w' => ['width' => 1200, 'crop' => true, 'quality' => 80], '1600w' => ['width' => 1600, 'crop' => true, 'quality' => 80], '1920w' => ['width' => 1920, 'crop' => true, 'quality' => 80]],
            'img-medium-webp' => ['400w' => ['width' => 400, 'crop' => true, 'quality' => 75, 'format' => 'webp', 'sharpen' => 10], '800w' => ['width' => 800, 'crop' => true, 'quality' => 75, 'format' => 'webp', 'sharpen' => 10], '1200w' => ['width' => 1200, 'crop' => true, 'quality' => 75, 'format' => 'webp', 'sharpen' => 10], '1600w' => ['width' => 1600, 'crop' => true, 'quality' => 75, 'format' => 'webp', 'sharpen' => 10], '1920w' => ['width' => 1920, 'crop' => true, 'quality' => 75, 'format' => 'webp', 'sharpen' => 10]],
            'img-medium-avif' => ['400w' => ['width' => 400, 'crop' => true, 'quality' => 65, 'format' => 'avif', 'sharpen' => 25], '800w' => ['width' => 800, 'crop' => true, 'quality' => 65, 'format' => 'avif', 'sharpen' => 25], '1200w' => ['width' => 1200, 'crop' => true, 'quality' => 65, 'format' => 'avif', 'sharpen' => 25], '1600w' => ['width' => 1600, 'crop' => true, 'quality' => 65, 'format' => 'avif', 'sharpen' => 25], '1920w' => ['width' => 1920, 'crop' => true, 'quality' => 65, 'format' => 'avif', 'sharpen' => 25]],
            'img-large'       => ['800w' => ['width' => 800, 'crop' => true, 'quality' => 85], '1200w' => ['width' => 1200, 'crop' => true, 'quality' => 85], '1600w' => ['width' => 1600, 'crop' => true, 'quality' => 85], '1920w' => ['width' => 1920, 'crop' => true, 'quality' => 85], '2560w' => ['width' => 2560, 'crop' => true, 'quality' => 85]],
            'img-large-webp'  => ['800w' => ['width' => 800, 'crop' => true, 'quality' => 80, 'format' => 'webp', 'sharpen' => 10], '1200w' => ['width' => 1200, 'crop' => true, 'quality' => 80, 'format' => 'webp', 'sharpen' => 10], '1600w' => ['width' => 1600, 'crop' => true, 'quality' => 80, 'format' => 'webp', 'sharpen' => 10], '1920w' => ['width' => 1920, 'crop' => true, 'quality' => 80, 'format' => 'webp', 'sharpen' => 10], '2560w' => ['width' => 2560, 'crop' => true, 'quality' => 80, 'format' => 'webp', 'sharpen' => 10]],
            'img-large-avif'  => ['800w' => ['width' => 800, 'crop' => true, 'quality' => 70, 'format' => 'avif', 'sharpen' => 25], '1200w' => ['width' => 1200, 'crop' => true, 'quality' => 70, 'format' => 'avif', 'sharpen' => 25], '1600w' => ['width' => 1600, 'crop' => true, 'quality' => 70, 'format' => 'avif', 'sharpen' => 25], '1920w' => ['width' => 1920, 'crop' => true, 'quality' => 70, 'format' => 'avif', 'sharpen' => 25], '2560w' => ['width' => 2560, 'crop' => true, 'quality' => 70, 'format' => 'avif', 'sharpen' => 25]],
        ],
    ],
];
