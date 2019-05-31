<?php

class ProductBase extends Model
{
	public $timePlanUnitOne; //трудоемкость одного изделия с спецификацией
	public $timePlanUnitAll; //трудоемкость всех изделий с спецификацией
	public $timePlanUnitOneDivision; //в часах
	public $timePlanUnitAllDivision; //в часах

	public $timePlanDetailOne; //трудоемкость без спецификации
	public $timePlanDetailAll; //трудоемкость без спецификации
	public $timePlanDetailOneDivision; //в часах
	public $timePlanDetailAllDivision; //в часах

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