<?php

trait OrderContentAdd {

	private function addProductsByPositions()
	{
		(new OrderProduct)->addProductsByPositions($this->positions);
	}
}