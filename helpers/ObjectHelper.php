<?php

class ObjectHelper {

    public static function createArray($items, $class_name, $methods = false)
    {
        $objects = [];
        if (empty($items)) return $objects;
        foreach ($items as $item) {
			self::createObject($item, $class_name, $methods);
			$objects[] = $object;
        }
        return $objects;
    }
	
	private static function createObject($item, $class_name, $methods) {
		if (empty($methods)) return new $class_name ($item->id);
		if (in_array('setData')) $object = (new $class_name)->setData($item);
		else if (in_array('getData')) $object = (new $class_name)->getData($item->id);
		else $object = new $class_name ($item->id);
		debug($object);
		foreach ($methods as $method_name) {
			if ($method_name != 'setData' || $method_name != 'getData') $object->$method_name();
		}
		return $object;
	}
	
	public static function getArrayProperties($objects, $property) {
		if(empty($objects)) return false;
		foreach ($objects as $obj) {
			$properties[] = $obj->$property;
		}
		return $properties;
	}
	
	
	public static function getAllSameId($objects, $id)
	{
		$same = [];
		foreach ($objects as $obj) {
			if ($obj->id == $id) $same[] = $obj;
		}
		return $same;
	}
	
	public static function deleteAllById($objects, $id)
	{
		foreach ($objects as $key => $obj) {
			if ($obj->id == $id) unset($objects[$key]);
		}
		return $objects;
	}
	
	
	
}

























