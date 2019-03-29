<?php

trait ProductConvert {

	public function convertPropeties()
	{
		$this->typeString = $this->setTypeString($this->type);
		return $this;
	}
	
	public static function setTypeString()
	{
		switch ($this->type) {
			case self::TYPE_CATEGORY: return 'Категория';
			case self::TYPE_PRODUCT: return 'Изделие';
			case self::TYPE_UNIT: return 'Узел';
			case self::TYPE_DETAIL: return 'Деталь';
			case self::TYPE_STANDARD: return 'Стандартное изделие';
			case self::TYPE_OTHER: return 'Прочее';
			default: return 'Тип не определен';
		}
	}

}