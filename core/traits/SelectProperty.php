<?php

trait SelectProperty {

	//parament value for compare
	public function selectProperty($items, $name, $value, $not = false)
	{
		if (!$items) return;
		foreach ($items as $item) {
			if ($item->$name == $value) $select[] = $item;
			else $select_not[] = $item;
		}
		if ($not && isset($select_not)) return $select_not;
		else if (!$not && isset($select)) return $select;
	}
	
	public function selectProperties($items, $name, array $values, $not = false)
	{
		if (!$items) return;
		foreach ($items as $item) {
			if (in_array($item->$name, $values)) $select[] = $item;
			else $select_not[] = $item;
		}
		if ($not && isset($select_not)) return $select_not;
		else if (!$not && isset($select)) return $select;
	}


}