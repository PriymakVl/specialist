<?php

trait OrderPositionConvert {

	public function convertPositionsToTable($positions) 
	{
		$table = '<table>';
		foreach ($positions as $position) {
			$table .= '<tr><td>'.$position->symbol.'</td><td>'.$position->qty.'шт.</td><td>'.$position->note.'</td></tr>';
		}
		return $table .= '</table>';
	}

}