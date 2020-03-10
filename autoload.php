<?php

if (file_exists('/var/www/html/env.php')) {
    include '/var/www/html/env.php';
}

if (!function_exists('env')) {
    function env($key, $default = null)
    {
        $value = getenv($key);

        if ($value === false) {
            return $default;
        }

        return $value;
    }
}

?>