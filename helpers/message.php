<?php

class Message {

    public static function setSession($type, $section, $key)
    {
        $messages = parse_ini_file('./web/files/messages.ini', true);
        $message = $messages[$section][$key];
        $_SESSION[$type] = $message;
    }

    public static function getFromSession()
    {
        $message = null;
        if (isset($_SESSION['error'])) {
            $message['class'] = 'message error-message';
            $message['text'] = $_SESSION['error'];
            unset($_SESSION['error']);
        }
        else if (isset($_SESSION['success'])) {
            $message['class'] = 'message success-message';
            $message['text'] = $_SESSION['success'];
            unset($_SESSION['success']);
        }
        return $message;
    }

    public static function get($section, $key)
    {
        $messages = parse_ini_file('./web/files/messages.ini', true);
        return $messages[$section][$key];
    }


}