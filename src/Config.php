<?php

namespace AllTheSatoshi\Util;

class Config {
    static private $ini;
    static private $db;

    static public function ini($section, $param) {
        if(!isset(self::$ini)) self::$ini = parse_ini_file("template/config.ini", true);
        return self::$ini[$section][$param];
    }

    static public function getDatabase() {
        if(!isset(self::$db)) self::$db = (new \MongoClient())->btcfaucet;
        return self::$db;
    }

    static public function getCollection($name) {
        return self::getDatabase()->selectCollection($name);
    }
}