<?php

/*
 * This file is part of Atozsites/Atozsites-star-ratings.
 *
 * (c) Atozsites <admin@Atozsites.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Atozsites\StarRating;

if (! defined('ABSPATH')) {
    http_response_code(404);
    die();
}

$gap = [prefix('gap'), get_option(prefix('gap'))];
$size = [prefix('size'), get_option(prefix('size'))];
$stars = [prefix('stars'), get_option(prefix('stars'))];
$greet = [prefix('greet'), get_option(prefix('greet'))];

return [
    [
        'type' => 'text',
        'title' => __('Greeting text', 'Atozsites-star-ratings'),
        'name' => $greet[0],
        'value' => $greet[1],
        'help' => implode('<br>', [
            __('Text that will be displayed when no votes have been casted.', 'Atozsites-star-ratings').'<br>',
            __('The following variables are available:', 'Atozsites-star-ratings').'<br>',
            sprintf(__('%s Post type.', 'Atozsites-star-ratings'), '<code>[type]</code>'),
        ]),
    ],

    [
        'type' => 'number',
        'title' => __('Stars', 'Atozsites-star-ratings'),
        'name' => $stars[0],
        'value' => $stars[1],
        'min' => 1,
        'help' => __('Total number of stars.', 'Atozsites-star-ratings'),
    ],

    [
        'type' => 'number',
        'title' => __('Gap', 'Atozsites-star-ratings'),
        'name' => $gap[0],
        'value' => $gap[1],
        'min' => 0,
        'help' => __('Gap between the stars.', 'Atozsites-star-ratings'),
    ],

    [
        'type' => 'number',
        'title' => __('Size', 'Atozsites-star-ratings'),
        'name' => $size[0],
        'value' => $size[1],
        'min' => 1,
        'help' => __('Size of a single star.', 'Atozsites-star-ratings'),
    ],
];
