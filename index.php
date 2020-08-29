<?php

/**
 * Plugin Name:     Atozsites Star Ratings
 * Plugin Slug:     Atozsites-star-ratings
 * Plugin Nick:     Atozsites
 * Plugin URI:      https://github.com/Atozsites/atozsites-star-ratings
 * Description:     Allow blog visitors to involve and interact more effectively with your website by rating posts.
 * Author:          Atozsites
 * Author URI:      http://Atozsites.com
 * Text Domain:     Atozsites-star-ratings
 * Version:         1.0
 */

namespace Atozsites\StarRating;

if (! defined('ABSPATH')) {
    http_response_code(404);
    die();
}

define('Atozsites_star_ratings', __FILE__);

if (file_exists($freemius = __DIR__.'/freemius.php')) {
    require_once $freemius;
}

require_once __DIR__.'/src/config.php';

config([
    'views' => __DIR__.'/views/',
    'shortcode' => 'kkstarratings',
    'options' => [
        // General
        'enable' => true,
        'strategies' => ['guests'],
        'manual_control' => [],
        'exclude_locations' => ['home', 'archives'],
        'exclude_categories' => [],
        'position' => 'top-left',
        // Appearance
        'gap' => 4,
        'stars' => 5,
        'size' => 24,
        'greet' => 'Rate this [type]',
        // Rich snippets
        'grs' => true,
        'sd' => <<<HTML
{
    "@context": "https://schema.org/",
    "@type": "CreativeWorkSeries",
    "name": "[title]",
    "aggregateRating": {
        "@type": "AggregateRating",
        "ratingValue": "[score]",
        "bestRating": "[best]",
        "ratingCount": "[count]"
    }
}
HTML
    ],
]);

require_once __DIR__.'/src/global.php';
require_once __DIR__.'/src/hook.php';
require_once __DIR__.'/src/ajax.php';
require_once __DIR__.'/src/view.php';
require_once __DIR__.'/src/post.php';
require_once __DIR__.'/src/response.php';
require_once __DIR__.'/src/legacy.php';

if (is_admin()) {
    require_once __DIR__.'/src/activate.php';
    require_once __DIR__.'/src/admin.php';
    require_once __DIR__.'/src/metabox.php';
} else {
    require_once __DIR__.'/src/validate.php';
    require_once __DIR__.'/src/shortcode.php';
    require_once __DIR__.'/src/assets.php';
}

add_action('plugins_loaded', function () {
    do_action(prefix('init'));
});
