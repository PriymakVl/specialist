<?php

class Helper {

    public static function createArrayOfObject($items, $class)
    {
        $objects = [];
        if (empty($items)) return $objects;
        foreach ($items as $item) {
            $objects[] = new $class($item->id);
        }
        return $objects;
    }
}