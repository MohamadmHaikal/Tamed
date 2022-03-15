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
            $key . '=' . env($key), $key . '=' . $key_value, file_get_contents($path)
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
            "'" . $key . "' => '" . config('app.' . $key) . "'", "'" . $key . "' => '" . $key_value . "'", file_get_contents($path)
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

