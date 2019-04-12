<?php

class ArrayHelper {
	
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
	
	public static function deleteValue($value, $array)
	{
		while (($i = array_search($value, $array)) !== false) {
			unset($array[$i]);
		} 
		return $array;
	}
	
	public static function getRandom($quantity, $min, $max)
	{
		for ($i = 0; $i < $quantity; $i++) {
			$random[] = rand($min, $max);
		}
		return $random;
	}
	
	
	
}

























