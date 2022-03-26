<?php


use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;


function parse_request($request, $keys)
{
    $return = [];
    foreach ($keys as $key) {
        $return[$key] = $request->get($key);
    }

    return $return;
}

function is_dashboard()
{
    $route = Route::current();
    $prefix = $route->getPrefix();

    return !!str_replace('/', '', $prefix) == Config::get('awebooking.prefix_dashboard');
}



function get_dashboard_folder()
{
    $folder = 'customer';
    if (Sentinel::inRole('administrator')) {
        $folder = 'administrator';
    } elseif (Sentinel::inRole('partner')) {
        $folder = 'partner';
    }

    return $folder;
}


function get_menu_dashboard()
{
    if (Sentinel::inRole('administrator')) {
        $menu = Config::get('admin_menu');
    } elseif (Sentinel::inRole('partner')) {
        $menu = Config::get('awebooking.partner_menu');
    } else {
        $menu = Config::get('awebooking.customer_menu');
    }
    return $menu;
}

function updateEnv($key = 'APP_KEY', $key_value = '')
{
    $path = base_path('.env');
    if (file_exists($path)) {
        file_put_contents($path, str_replace(
            $key . '=' . env($key),
            $key . '=' . $key_value,
            file_get_contents($path)
        ));
    }
}

function setEnvironmentValue(array $values)
{
    $envFile = app()->environmentFilePath();
    $str = file_get_contents($envFile);
    if (!empty($str)) {
        if (count($values) > 0) {
            foreach ($values as $envKey => $envValue) {
                $str .= "\n"; // In case the searched variable is in the last line without \n
                $keyPosition = strpos($str, "{$envKey}=");
                $endOfLinePosition = strpos($str, "\n", $keyPosition);
                $oldLine = substr($str, $keyPosition, $endOfLinePosition - $keyPosition);

                // If key does not exist, add it
                if (!$keyPosition || !$endOfLinePosition || !$oldLine) {
                    $str .= "{$envKey}={$envValue}\n";
                } else {
                    $str = str_replace($oldLine, "{$envKey}={$envValue}", $str);
                }
            }
        }

        $str = substr($str, 0, -1);
        if (!file_put_contents($envFile, $str)) return false;
        return true;
    }
    return false;
}

function updateConfig($key = '', $key_value = '')
{
    $path = config_path('app.php');
    if (file_exists($path)) {
        file_put_contents($path, str_replace(
            "'" . $key . "' => '" . config('app.' . $key) . "'",
            "'" . $key . "' => '" . $key_value . "'",
            file_get_contents($path)
        ));
    }
}



function get_site_name()
{
    return get_option('site_name', Config::get('app.name', __('Laravel App')));
}



function dashboard_url($url = '', $id = '', $page = '')
{
    if (empty($id) && empty($page)) {
        return url(Config::get('awebooking.prefix_dashboard') . '/' . $url);
    } else {
        if (!empty($id) && !empty($page)) {
            return url(Config::get('awebooking.prefix_dashboard') . '/' . $url . '/' . $id . '/' . $page);
        } elseif (!empty($id)) {
            return url(Config::get('awebooking.prefix_dashboard') . '/' . $url . '/' . $id);
        } elseif (!empty($page)) {
            return url(Config::get('awebooking.prefix_dashboard') . '/' . $url . '/' . $page);
        }
    }
}

function auth_url($name = '')
{
    return url(Config::get('awebooking.prefix_auth') . '/' . $name);
}




function current_url()
{
    return Request::fullUrl();
}



function current_screen()
{
    return Route::currentRouteName();
}

function start_get_view()
{
    ob_start();
}

function end_get_view()
{
    return @ob_get_clean();
}
function _wp_call_all_hook($args)
{
    global $hh_filter;

    $hh_filter['all']->do_all_hook($args);
}

function apply_filters($tag, $value)
{
    global $hh_filter, $hh_current_filter;

    $args = array();

    // Do 'all' actions first.
    if (isset($hh_filter['all'])) {
        $hh_current_filter[] = $tag;
        $args = func_get_args();
        _wp_call_all_hook($args);
    }

    if (!isset($hh_filter[$tag])) {
        if (isset($hh_filter['all'])) {
            array_pop($hh_current_filter);
        }
        return $value;
    }

    if (!isset($hh_filter['all'])) {
        $hh_current_filter[] = $tag;
    }

    if (empty($args)) {
        $args = func_get_args();
    }

    // don't pass the tag name to WP_Hook
    array_shift($args);

    $filtered = $hh_filter[$tag]->apply_filters($value, $args);

    array_pop($hh_current_filter);

    return $filtered;
}


function wp_parse_str($string, &$array)
{
    parse_str($string, $array);
    /**
     * Filters the array of variables derived from a parsed string.
     *
     * @param array $array The array populated with variables.
     * @since 2.3.0
     *
     */
    $array = apply_filters('wp_parse_str', $array);
}

function wp_parse_args($args, $defaults = '')
{
    if (is_object($args)) {
        $r = get_object_vars($args);
    } elseif (is_array($args)) {
        $r = &$args;
    } else {
        wp_parse_str($args, $r);
    }

    if (is_array($defaults)) {
        foreach ($defaults as $key => $value) {
            if (isset($r[$key]) && !empty($r[$key])) {
                $defaults[$key] = $r[$key];
            }
        }
        return $defaults;
    }
    return $r;
}
function detect_link(string $value, int $img = 1, int $video = 1, array $protocols = array('http', 'mail', 'twitter', 'https'), array $attributes = array('target' => '_blank'), $video_height = 400)
{
    $links = array();
    $value = preg_replace_callback('~(<a .*?>.*?</a>|<.*?>)~i', function ($match) use (&$links) {
        return '<' . array_push($links, $match[1]) . '>';
    }, $value);
    foreach ((array)$protocols as $protocol) {
        switch ($protocol) {
            case 'http':
            case 'https':
                $value = preg_replace_callback(
                    '~(?:\(?(https?)://([^\s\!]+)(?<![?,:.\"]))~i',
                    function ($match) use ($protocol, &$links, $attributes, $img, $video, $video_height) {
                        if ($match[1]) {

                            $protocol = $match[1];
                            $str = $match[0];
                            if ($str[0] === '(') {
                                $match[2] = substr($match[2], 0, -1);
                            }
                            $link = $match[2] ?: $match[3];
                            if ($video) {
                                if (strpos($link, 'youtube.com') !== false || strpos($link, 'youtu.be') !== false) {
                                    $exp = explode('=', $link);
                                    $ht = '<iframe width="100%" height="' . $video_height . '" src="https://www.youtube.com/embed/' . end($exp) . '?rel=0&showinfo=0&color=orange&iv_load_policy=3" frameborder="0" allowfullscreen></iframe>';
                                    return '<' . array_push($links, $ht) . '></a>';
                                }
                                if (strpos($link, 'vimeo.com') !== false) {
                                    $exp = explode('/', $link);
                                    $ht = '<iframe width="100%" height="' . $video_height . '" src="https://player.vimeo.com/video/' . end($exp) . '" frameborder="0" allowfullscreen></iframe>';
                                    return '<' . array_push($links, $ht) . '></a>';
                                }
                            }
                            if ($img) {
                                if (strpos($link, '.png') !== false || strpos($link, '.jpg') !== false || strpos($link, '.jpeg') !== false || strpos($link, '.gif') !== false || strpos($link, '.bmp') !== false || strpos($link, '.webp') !== false) {
                                    return '<' . array_push($links, "<a target='_blank' href=\"$protocol://$link\" class=\"htmllink\"><img alt=\"" . __('Attachment') . "\" src=\"$protocol://$link\" class=\"htmlimg\">") . '></a>';
                                }
                            }

                            if ($str[0] === '(') {
                                return '<' . array_push($links, "(<a target='_blank' href=\"$protocol://$link\" class=\"htmllink\">$link</a>)") . '>';
                            } else {
                                return '<' . array_push($links, "<a target='_blank' href=\"$protocol://$link\" class=\"htmllink\">$link</a>") . '>';
                            }
                        }
                    },
                    $value
                );
                break;
            case 'mail':
                $value = preg_replace_callback('~([^\s<]+?@[^\s<]+?\.[^\s<]+)(?<![\.,:])~', function ($match) use (&$links, $attributes) {
                    return '<' . array_push($links, "<a target='_blank' href=\"mailto:{$match[1]}\" class=\"htmllink\">{$match[1]}</a>") . '>';
                }, $value);
                break;
            case 'twitter':
                $value = preg_replace_callback('~(?<!\w)[@#]([\w\._]+)~', function ($match) use (&$links, $attributes) {
                    return '<' . array_push($links, "<a target='_blank' href=\"https://twitter.com/" . ($match[0][0] == '@' ? '' : 'search/%23') . $match[1] . "\" class=\"htmllink\">{$match[0]}</a>") . '>';
                }, $value);
                break;
            default:
                $value = preg_replace_callback('~' . preg_quote($protocol, '~') . '://([^\s<]+?)(?<![\.,:])~i', function ($match) use ($protocol, &$links, $attributes) {
                    return '<' . array_push($links, "<a target='_blank' href=\"$protocol://{$match[1]}\" class=\"htmllink\">{$match[1]}</a>") . '>';
                }, $value);
                break;
        }
    }
    return preg_replace_callback('/<(\d+)>/', function ($match) use (&$links) {
        return $links[$match[1] - 1];
    }, $value);
}
function force_balance_tags($text)
{
    $tagstack = array();
    $stacksize = 0;
    $tagqueue = '';
    $newtext = '';
    // Known single-entity/self-closing tags
    $single_tags = array('area', 'base', 'basefont', 'br', 'col', 'command', 'embed', 'frame', 'hr', 'img', 'input', 'isindex', 'link', 'meta', 'param', 'source');
    // Tags that can be immediately nested within themselves
    $nestable_tags = array('blockquote', 'div', 'object', 'q', 'span');

    // WP bug fix for comments - in case you REALLY meant to type '< !--'
    $text = str_replace('< !--', '<    !--', $text);
    // WP bug fix for LOVE <3 (and other situations with '<' before a number)
    $text = preg_replace('#<([0-9]{1})#', '&lt;$1', $text);

    while (preg_match('/<(\/?[\w:]*)\s*([^>]*)>/', $text, $regex)) {
        $newtext .= $tagqueue;

        $i = strpos($text, $regex[0]);
        $l = strlen($regex[0]);

        // clear the shifter
        $tagqueue = '';
        // Pop or Push
        if (isset($regex[1][0]) && '/' == $regex[1][0]) { // End Tag
            $tag = strtolower(substr($regex[1], 1));
            // if too many closing tags
            if ($stacksize <= 0) {
                $tag = '';
                // or close to be safe $tag = '/' . $tag;

                // if stacktop value = tag close value then pop
            } elseif ($tagstack[$stacksize - 1] == $tag) { // found closing tag
                $tag = '</' . $tag . '>'; // Close Tag
                // Pop
                array_pop($tagstack);
                $stacksize--;
            } else { // closing tag not at top, search for it
                for ($j = $stacksize - 1; $j >= 0; $j--) {
                    if ($tagstack[$j] == $tag) {
                        // add tag to tagqueue
                        for ($k = $stacksize - 1; $k >= $j; $k--) {
                            $tagqueue .= '</' . array_pop($tagstack) . '>';
                            $stacksize--;
                        }
                        break;
                    }
                }
                $tag = '';
            }
        } else { // Begin Tag
            $tag = strtolower($regex[1]);

            // Tag Cleaning

            // If it's an empty tag "< >", do nothing
            if ('' == $tag) {
                // do nothing
            } elseif (substr($regex[2], -1) == '/') { // ElseIf it presents itself as a self-closing tag...
                // ...but it isn't a known single-entity self-closing tag, then don't let it be treated as such and
                // immediately close it with a closing tag (the tag will encapsulate no text as a result)
                if (!in_array($tag, $single_tags)) {
                    $regex[2] = trim(substr($regex[2], 0, -1)) . "></$tag";
                }
            } elseif (in_array($tag, $single_tags)) { // ElseIf it's a known single-entity tag but it doesn't close itself, do so
                $regex[2] .= '/';
            } else { // Else it's not a single-entity tag
                // If the top of the stack is the same as the tag we want to push, close previous tag
                if ($stacksize > 0 && !in_array($tag, $nestable_tags) && $tagstack[$stacksize - 1] == $tag) {
                    $tagqueue = '</' . array_pop($tagstack) . '>';
                    $stacksize--;
                }
                $stacksize = array_push($tagstack, $tag);
            }

            // Attributes
            $attributes = $regex[2];
            if (!empty($attributes) && $attributes[0] != '>') {
                $attributes = ' ' . $attributes;
            }

            $tag = '<' . $tag . $attributes . '>';
            //If already queuing a close tag, then put this tag on, too
            if (!empty($tagqueue)) {
                $tagqueue .= $tag;
                $tag = '';
            }
        }
        $newtext .= substr($text, 0, $i) . $tag;
        $text = substr($text, $i + $l);
    }

    // Clear Tag Queue
    $newtext .= $tagqueue;

    // Add Remaining text
    $newtext .= $text;

    // Empty Stack
    while ($x = array_pop($tagstack)) {
        $newtext .= '</' . $x . '>'; // Add remaining tags to close
    }

    // WP fix for the bug with HTML comments
    $newtext = str_replace('< !--', '<!--', $newtext);
    $newtext = str_replace('<    !--', '< !--', $newtext);

    return $newtext;
}
function balanceTags($text, $force = false, $detect_link = false)
{
    $text = str_replace('<script>', '&lt;script&gt;', $text);
    $text = str_replace('</script>', '&lt;/script&gt;', $text);
    return $detect_link ? detect_link(force_balance_tags($text)) : force_balance_tags($text);
}
function dashboard_pagination($args = [])
{
    $defaults = [
        'range' => 4,
        'total' => 0,
        'previous_string' => 'Prev',
        'next_string' => 'Next',
        'before_output' => '<nav aria-label="navigation"><ul class="pagination">',
        'after_output' => '</ul></nav>',
        'posts_per_page' => 12,
    ];

    $args = wp_parse_args($args, $defaults);
    $args['range'] = (int)$args['range'] - 1;
    $posts_per_page = $args['posts_per_page'];

    $count = ceil($args['total'] / $posts_per_page);

    $current_params = \Illuminate\Support\Facades\Route::current()->parameters();
    $page = isset($current_params['page']) ? $current_params['page'] : 1;
    $ceil = ceil($args['range'] / 2);
    if ($count <= 1)
        return false;
    if (!$page)
        $page = 1;
    if ($count > $args['range']) {
        if ($page <= $args['range']) {
            $min = 1;
            $max = $args['range'] + 1;
        } elseif ($page >= ($count - $ceil)) {
            $min = $count - $args['range'];
            $max = $count;
        } elseif ($page >= $args['range'] && $page < ($count - $ceil)) {
            $min = $page - $ceil;
            $max = $page + $ceil;
        }
    } else {
        $min = 1;
        $max = $count;
    }
    $echo = '';
    $url = dashboard_url(Route::currentRouteName());
    foreach ($current_params as $key => $param) {
        if ($key !== 'page') {
            $url .= '/' . $param;
        }
    }
    $previous_num = intval($page) - 1;


    $previous = $url . '/' . $previous_num . '/';

    if ($previous && (1 == $page)) {
        $echo .= ' <a href="#" class="prev"><li>' . $args['previous_string'] . '</li></a>';
    }
    if ($previous && (1 != $page)) {
        $echo .= '<li class="page-item"><a class="page-link" data-pagination="' . $previous_num . '" href="' . $previous . '" title="previous">' . $args['previous_string'] . '</a></li>';
    }
    if (!empty($min) && !empty($max)) {
        for ($i = $min; $i <= $max; $i++) {
            if ($page == $i) {
                $echo .= '  <a class="is-active" data-pagination="' . $i . '" href="javascript:void(0);"><li>' . str_pad((int)$i, 1, '0', STR_PAD_LEFT) . '</li></a>';
            } else {
                $_url = $url . '/' . $i . '/';
                $echo .= sprintf('<li class="page-item"><a class="page-link" data-pagination="' . $i . '" href="%s">%2d</a></li>', $_url, $i);
            }
        }
    }
    $next_num = intval($page) + 1;

    $next = $url . '/' . $next_num . '/';

    if ($next && ($count == $page)) {
        $echo .= '<li class="disabled"><a class="page-link" href="javascript:void(0);" title="next">' . $args['next_string'] . '</a></li>';
    }
    if ($next && ($count != $page)) {
        $echo .= '<li class="page-item"><a class="page-link" data-pagination="' . $next_num . '" href="' . $next . '" title="next">' . $args['next_string'] . '</a></li>';
    }
    if (isset($echo))
        echo balanceTags($args['before_output'] . $echo . $args['after_output']);
}


function is_email($email)
{

    if (strlen($email) < 6) {
        return false;
    }

    if (strpos($email, '@', 1) === false) {
        return false;
    }

    list($local, $domain) = explode('@', $email, 2);

    if (!preg_match('/^[a-zA-Z0-9!#$%&\'*+\/=?^_`{|}~\.-]+$/', $local)) {
        return false;
    }

    if (preg_match('/\.{2,}/', $domain)) {
        return false;
    }

    if (trim($domain, " \t\n\r\0\x0B.") !== $domain) {
        return false;
    }

    $subs = explode('.', $domain);

    if (2 > count($subs)) {
        return false;
    }

    foreach ($subs as $sub) {
        if (trim($sub, " \t\n\r\0\x0B-") !== $sub) {
            return false;
        }

        if (!preg_match('/^[a-z0-9-]+$/i', $sub)) {
            return false;
        }
    }

    return $email;
}
