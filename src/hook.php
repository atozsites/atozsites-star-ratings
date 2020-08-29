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

function add_plugin_filter($tag, callable $callback, $priority = 10, $acceptedArgs = 1)
{
    $tag = config('nick').'::filter.'.$tag;

    return add_filter($tag, $callback, $priority, $acceptedArgs);
}

function apply_plugin_filters($tag, ...$arguments)
{
    $tag = config('nick').'::filter.'.$tag;

    return apply_filters($tag, ...$arguments);
}

function remove_plugin_filter($tag, callable $callback, $priority = 10)
{
    $tag = config('nick').'::filter.'.$tag;

    return remove_filter($tag, $callback, $priority);
}

function add_plugin_action($tag, callable $callback, $priority = 10, $acceptedArgs = 1)
{
    $tag = config('nick').'::action.'.$tag;

    return add_action($tag, $callback, $priority, $acceptedArgs);
}

function do_plugin_action($tag, ...$arguments)
{
    $tag = config('nick').'::action.'.$tag;

    return do_action($tag, ...$arguments);
}

function remove_plugin_action($tag, callable $callback, $priority = 10)
{
    $tag = config('nick').'::action.'.$tag;

    return remove_action($tag, $callback, $priority);
}
