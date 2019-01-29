<?php

require_once ('./core/model.php');

class ParamBase {

    public static function get($key, $default = false)
    {
        if (empty($_REQUEST[$key])) return $default;
        return $_REQUEST[$key];
    }

    public static function getAll($keys, $defaults = [])
    {
        $params = [];
        foreach ($keys as $key) {
            if (isset($_REQUEST[$key])) $params[$key] = $_REQUEST[$key];
			else $params = self::isDefaultValue($params, $key, $defaults);
        }
        return $params;
    }

    private static function isDefaultValue($params, $key, $defaults)
    {
        if (!array_key_exists($key, $defaults)) return;
        foreach ($defaults as $key_default => $value_default) {
            if ($key_default == $key) $params[$key] = $value_default;
        }
        return $params;
    }

    public static function getIds($key)
    {
        if (empty($_REQUEST[$key])) exit('параметр '.$key.' не существует');
        $str = $_REQUEST[$key];
        return explode(',', rtrim($str, ','));
    }
}