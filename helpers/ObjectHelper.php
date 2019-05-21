<?php

class ObjectHelper {

    public static function createArray($items, $class_name, $methods = false)
    {
        $objects = [];
        if (empty($items)) return $objects;
        foreach ($items as $item) {
			$object = self::createObject($item, $class_name, $methods);
			$object = self::callMethodsObject($object, $methods);
			$objects[] = $object;
        }
        return $objects;
    }
	
	private static function createObject($item, $class_name, $methods) {
		if (in_array('setData', $methods)) $object = (new $class_name)->setData($item);
		else $object = new $class_name ($item->id);
		return $object;
	}
	
	private static function  callMethodsObject($object, $methods) 
	{
		foreach ($methods as $method_name) {
			if ($method_name == 'setData') continue;
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
	//checks that all values are the same in array objects
	public static function checkValuesProperty($objects, $name_property, $value_property) 
	{
		if (!$objects) return false;
		foreach ($objects as $object) {
			if ($object->$name_property != $value_property) return false;
		}
		return true;
	}
	//checks if there is a property value in an array of objects
	public static function inPropertyValue($objects, $name_property, $value_property)
	{
		if (!$objects) return false;
		foreach ($objects as $object) {
			if ($object->$name_property == $value_property) return true;
		}
		return false;
	}
	
	public static function selectByValueProperty($objects, $name_property, $value_property) 
	{
		if (!$objects) return false;
		foreach ($objects as $object) {
			if ($object->$name_property == $value_property) $select[] = $object;
		}
		if (isset($select)) return $select;
	}
	
	
}

























