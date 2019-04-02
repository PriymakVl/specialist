<?php

trait DrawingMessage {

	public function addFileMessage()
	{
		if ($this->data) $this->setMessage('success', 'add');
		else $this->setMessage('error', 'add_error');
		return $this;
	}


}