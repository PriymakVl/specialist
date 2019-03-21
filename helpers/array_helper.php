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
	
	
	
}

























