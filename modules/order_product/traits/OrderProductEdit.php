<?php

trait OrderProductEdit {

	public function edit()
	{
		$this->editModel();
		$this->editStateUpAndDown($this->post->state);
		return $this;
	}
	
	public function editRating()
	{
		$this->setRating($this->get->rating);
		$this->editRatingActions();
		return $this;
	}
	
	public function editRatingActions()
	{
		if (!$this->actions) return;
		foreach ($this->actions as $action) {
			$action->setRating($this->get->rating);
		}
	}
}