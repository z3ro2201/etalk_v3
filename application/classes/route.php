<?php
class route {

    private static $routes = array();
    private static $pathNotFound = null;
    private static $methodNotAllowed = null;

    public static function add($method, $location, $function)
    {
        if(empty($method)) $method = 'GET';
        
        array_push(
            self::$routes, array(
                'location' => $location,
                'method'   => $method,
                'function' => $function
            )
        );

    }

    public static function run($base_path = '/')
    {

        $parse_url = parse_url($_SERVER['REQUEST_URI']);

        $reg_replace = "/\r\n|\r|\n|\t/";
        $compress = null;
        if(!extension_loaded('zlib')) ob_start('ob_gzhandler');
        else ob_start();

        if(!strpos($parse_url['path'], 'admin/manager')) {
            require_once _root . '/application/components/_header.php';
        }
        else require_once _root . '/application/components/_admin_header.php';

        if(isset($parse_url['path'])) $path = $parse_url['path'];
        else $path = '/';

        $method = $_SERVER['REQUEST_METHOD'];
        
        $path_match_found = false;
        $route_match_found = false;

        foreach(self::$routes as $route)
        {
            
            if($base_path != '' && $base_path != '/') $route['location'] = '(' . $base_path . ')' . $route['location'];

            $route['location'] = '^' . $route['location'];
            $route['location'] = $route['location'] . '$';

            if(preg_match('#' . $route['location'] . '#', $path, $matches))
            {
                $path_match_found = true;

                if(strtolower($method) == strtolower($route['method']))
                {
                    array_shift($matches);

                    if($base_path != '' && $base_path != '/') array_shift($matches);

                    call_user_func_array($route['function'], $matches);

                    $route_match_found = true;
                    break;
                }
            }
        }

        if(!strpos($parse_url['path'], 'admin/manager')) {
            require_once _root . '/application/components/_footer.php';
        }
        else require_once _root . '/application/components/_admin_footer.php';
        
        $content = ob_get_clean();
        $content = preg_replace($reg_replace, '', $content);
        ob_flush();

        if(!$route_match_found)
        {
            if($path_match_found)
            {
                header("HTTP/1.0 405 Method Not Allowed");
                if(self::$methodNotAllowed){
                    call_user_func_array(self::$methodNotAllowed, Array($path,$method));
                }
            } else {
                header("HTTP/1.0 404 Not Found");
                if(self::$pathNotFound){
                    call_user_func_array(self::$pathNotFound, Array($path));
                }
            }

            echo"route error!";
        } else print_r($content);
    }

}
?>