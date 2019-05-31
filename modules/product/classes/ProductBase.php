<?php

class ProductBase extends Model
{
	public $timePlanUnit; //трудоемкость одного изделия с спецификацией
	public $timePlanProduct; //трудоемкость без спецификации
	public $timePlanSpecification; //трудоемкость деталей в спецификации

	const TYPE_CATEGORY = 1;
    const TYPE_PRODUCT = 2;
    const TYPE_UNIT = 3;
    const TYPE_DETAIL = 4;
	const TYPE_STANDARD = 5;
	const TYPE_OTHER = 6;
	
	public $parent;
	public $typeViewSpecification;
	public $actions;
	public $orderProducts; //for statistics
	public $specificationGroup;//divided on group detail, unit and other
	public $drawings;
	public $specification;
	public $specificationAll;
	public $typeString;
	


}