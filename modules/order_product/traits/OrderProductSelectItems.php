<?php

trait OrderProductSelectItems {

	public function selectMainItems($items)
	{
		if (!$items) return;
		foreach ($items as $item) {
			if ($item->id_parent == self::ID_MAIN_ORDER) $select[] = $item;
		}
		if (isset($select)) return $select;
	}

}