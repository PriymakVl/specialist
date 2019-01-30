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
	
	public static function getArrayPropertyFromArrayObjects($objects, $property) {
		if(empty($objects)) return false;
		foreach ($objects as $obj) {
			$properties[] = $obj->$property;
		}
		return $properties;
	}
	
	public static function getSameValuesArray($array)
	{
		$array_same_values = [];
		if (!is_array($array)) return $array_same_values;
		$count_values = array_count_values($array);
		foreach ($count_values as $value => $count) {
			if ($count > 1) $array_same_values[] = $value;
		}
		return $array_same_values;
	}
	
	public static function getObjectsWithSameId($objects, $id)
	{
		$same = [];
		foreach ($objects as $obj) {
			if ($obj->id == $id) {
				$same[] = $obj;
			}
		}
		return $same;
	}
	
	public static function deleteObjectsFromArrayById($objects, $id)
	{
		foreach ($objects as $key => $obj) {
			if ($obj->id == $id) unset($objects[$key]);
		}
		return $objects;
	}
	
	
	
}

























