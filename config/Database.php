<?php

class Database
{
    private static $instance = null;

    private function __construct() {}

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new PDO("mysql:host=127.0.0.1;dbname=NoteFlow", "root", "123456");

            self::$instance->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION
            );
        }

        return self::$instance;
    }
}
