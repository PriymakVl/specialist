<?php

class ObjectHelper {

    public static function createArray($items, $class_name, $methods = false)
    {
        $objects = [];
        if (empty($items)) return $objects;
        foreach ($items as $item) {
			$object = self::createObject($item, $class_name, $methods);
			unset($methods['getData'], $methods['setData']);
			if ($methods) self::callMethodsObject($object, $methods);
			$objects[] = $object;
        }
        return $objects;
    }
	
	private static function createObject($item, $class_name, $methods) {
		if (in_array('setData', $methods)) $object = (new $class_name)->setData($item);
		else if (in_array('getData', $methods)) $object = (new $class_name)->getData($item->id);
		else $object = new $class_name ($item->id);
		return $object;
	}
	
	private static function  callMethodsObject($object, $methods) 
	{
		foreach ($methods as $method_name) {
			$object->$method_name();
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

























