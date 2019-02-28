<?php

class Message {

    public $section;
    public $class;
    public $text;

    public function set($type, $key)
    {
        $text = $this->parse($key);
        $_SESSION['message']['text'] = $text;
        $_SESSION['message']['type'] = $type;
    }

    public function get()
    {
        if (empty($_SESSION['message'])) return;
        $this->class = 'message-'.$_SESSION['message']['type'];
        $this->text = $_SESSION['message']['text'];
        unset($_SESSION['message']);
    }

    private function parse($key)
    {
        $messages = parse_ini_file('./web/files/messages.ini', true);
        return $messages[$this->section][$key];
    }


}