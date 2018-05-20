<?php

if (! function_exists('value_desc')) {
    function value_desc($path, $value)
    {
        $configs = config($path);
        foreach ($configs as $config)
        {
            if ($config['value'] == $value)
            {
                return $config['desc'];
            }
        }
    }
}
