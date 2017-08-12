<?php

class SessionController {

    private static function sesionStart($className) {
        if (!session_id())
            session_start();

        if (!isset($_SESSION[$className]))
            $_SESSION[$className] = [];
    }

    public static function all($className) {
        self::sesionStart($className);
        $list = [];
        if (isset($_SESSION[$className])) {
            foreach ($_SESSION[$className] as $object) {
                $list[] = unserialize($object);
            }
        }
        return $list;
    }

    public static function get($className, $id) {
        self::sesionStart($className);
        foreach (self::all($className, false) as $obj) {
            if (intval($obj->getId()) == intval($id))
                return $obj;
        }
        return false;
    }

    public static function add($className, $object) {
        self::sesionStart($className);
        if (!self::get($className, $object->getId())) {
            $_SESSION[$className][] = serialize($object);
            return true;
        }
        return false;
    }

    public static function update($className, $object, $id) {
        foreach (self::all($className, false) as $index => $obj) {
            if (intval($obj->getId()) == intval($id)) {
                $_SESSION[$className][$index] = serialize($object);
                return true;
            }
        }
        return false;
    }

    public static function delete($className, $id) {
        foreach (self::all($className, false) as $index => $obj) {
            if (intval($obj->getId()) == intval($id)) {
                unset($_SESSION[$className][$index]);
                return true;
            }
        }
        return false;
    }

    public static function clear($className) {
        self::sesionStart($className);
        unset($_SESSION[$className]);
    }

}
