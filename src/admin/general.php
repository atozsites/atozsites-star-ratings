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

$enable = [prefix('enable'), get_option(prefix('enable'))];
$position = [prefix('position'), get_option(prefix('position'))];
$strategies = [prefix('strategies'), (array) get_option(prefix('strategies'), [])];
$manuallyControlled = [prefix('manual_control'), (array) get_option(prefix('manual_control'), [])];
$excludedLocations = [prefix('exclude_locations'), (array) get_option(prefix('exclude_locations'), [])];
$excludedCategories = [prefix('exclude_categories'), (array) get_option(prefix('exclude_categories'), [])];

$postTypes = [
    ['value' => 'post', 'label' => __('Posts', 'Atozsites-star-ratings')],
    ['value' => 'page', 'label' => __('Pages', 'Atozsites-star-ratings')],
];

foreach (get_post_types([
    'publicly_queryable' => true,
    '_builtin' => false,
], 'objects') as $postType) {
    $postTypes[] = [
        'value' => $postType->name,
        'label' => $postType->labels->name,
    ];
}

$categories = get_terms([
    'taxonomy' => 'category',
    'hide_empty' => false,
    'parent' => 0,
]);

return [
    [
        'type' => 'checkbox',
        'title' => __('Status', 'Atozsites-star-ratings'),
        'label' => __('Active', 'Atozsites-star-ratings'),
        'name' => $enable[0],
        'value' => true,
        'filter' => function ($bool) {
            return (string) $bool;
        },
        'checked' => checked($enable[1], '1', false),
        'help' => __('Globally activate/deactivate the star ratings.', 'Atozsites-star-ratings'),
    ],

    // Strategies

    [
        'title' => __('Strategies', 'Atozsites-star-ratings'),
        'name' => $strategies[0],
        'help' => __('Select the voting strategies.', 'Atozsites-star-ratings'),
        'filter' => function ($values) {
            return (array) $values;
        },
        'fields' => [
            [
                'type' => 'checkbox',
                'label' => __('Allow voting in archives', 'Atozsites-star-ratings'),
                'name' => $strategies[0].'[]',
                'value' => 'archives',
                'checked' => in_array('archives', $strategies[1]),
            ],
            [
                'type' => 'checkbox',
                'label' => __('Allow guests to vote', 'Atozsites-star-ratings'),
                'name' => $strategies[0].'[]',
                'value' => 'guests',
                'checked' => in_array('guests', $strategies[1]),
            ],
            [
                'type' => 'checkbox',
                'label' => __('Unique votes (based on IP Address)', 'Atozsites-star-ratings'),
                'name' => $strategies[0].'[]',
                'value' => 'unique',
                'checked' => in_array('unique', $strategies[1]),
            ],
        ],
    ],

    // Manual Control

    [
        'title' => __('Manual Control', 'Atozsites-star-ratings'),
        'name' => $manuallyControlled[0],
        'help' => sprintf(__('Select the post types that should not auto embed the<br>markup and will be manually controlled by the theme.<br>E.g. Using %s in your template.', 'Atozsites-star-ratings'), '<code>echo Atozsites_star_ratings();</code>'),
        'filter' => function ($values) {
            return (array) $values;
        },
        'fields' => array_map(function ($field) use ($manuallyControlled) {
            $field['type'] = 'checkbox';
            $field['name'] = $manuallyControlled[0].'[]';
            $field['checked'] = in_array($field['value'], $manuallyControlled[1]);

            return $field;
        }, $postTypes),
    ],

    // Locations

    [
        'title' => __('Disable Locations', 'Atozsites-star-ratings'),
        'name' => $excludedLocations[0],
        'help' => __('Select the locations where the star ratings should be excluded.', 'Atozsites-star-ratings'),
        'filter' => function ($values) {
            return (array) $values;
        },
        'fields' => array_map(function ($field) use ($excludedLocations) {
            $field['type'] = 'checkbox';
            $field['name'] = $excludedLocations[0].'[]';
            $field['checked'] = in_array($field['value'], $excludedLocations[1]);

            return $field;
        }, array_merge([
                [
                    'label' => __('Home page', 'Atozsites-star-ratings'),
                    'value' => 'home',
                ],
                [
                    'label' => __('Archives', 'Atozsites-star-ratings'),
                    'value' => 'archives',
                ],
            ], $postTypes)
        ),
    ],

    // Categories

    [
        'type' => 'select',
        'multiple' => true,
        'title' => __('Disable Categories', 'Atozsites-star-ratings'),
        'name' => $excludedCategories[0],
        'filter' => function ($values) {
            return (array) $values;
        },
        'options' => array_map(function ($category) use ($excludedCategories) {
            return [
                'label' => $category->name,
                'value' => $category->term_id,
                'selected' => in_array($category->term_id, $excludedCategories[1]),
            ];
        }, $categories),
        'help' => __('Exclude star ratings from posts belonging to the selected categories.<br>Use <strong>cmd/ctrl + click</strong> to select/deselect multiple categories.', 'Atozsites-star-ratings'),
    ],

    // Position

    [
        'title' => __('Default Position', 'Atozsites-star-ratings'),
        'name' => $position[0],
        'help' => __('Choose a default position.', 'Atozsites-star-ratings'),
        'fields' => [
            [
                'type' => 'radio',
                'label' => __('Top Left', 'Atozsites-star-ratings'),
                'name' => $position[0],
                'value' => 'top-left',
                'checked' => checked($position[1], 'top-left', false),
            ],
            [
                'type' => 'radio',
                'label' => __('Top Center', 'Atozsites-star-ratings'),
                'name' => $position[0],
                'value' => 'top-center',
                'checked' => checked($position[1], 'top-center', false),
            ],
            [
                'type' => 'radio',
                'label' => __('Top Right', 'Atozsites-star-ratings'),
                'name' => $position[0],
                'value' => 'top-right',
                'checked' => checked($position[1], 'top-right', false),
            ],
            [
                'type' => 'radio',
                'label' => __('Bottom Left', 'Atozsites-star-ratings'),
                'name' => $position[0],
                'value' => 'bottom-left',
                'checked' => checked($position[1], 'bottom-left', false),
            ],
            [
                'type' => 'radio',
                'label' => __('Bottom Center', 'Atozsites-star-ratings'),
                'name' => $position[0],
                'value' => 'bottom-center',
                'checked' => checked($position[1], 'bottom-center', false),
            ],
            [
                'type' => 'radio',
                'label' => __('Bottom Right', 'Atozsites-star-ratings'),
                'name' => $position[0],
                'value' => 'bottom-right',
                'checked' => checked($position[1], 'bottom-right', false),
            ],
        ],
    ],
];
