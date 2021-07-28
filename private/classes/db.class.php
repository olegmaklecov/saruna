<?php
class Db {
    static protected $db;
    static protected $table;
    static protected $columns = [];
    protected $errors = [];

    static public function setDb($db) {
        self::$db = $db;
    }

    static protected function find($sql) {
        $result = self::$db->query($sql);
        if (!$result) {
            exit('Database query failed.');
        }
        $objects = [];
        while ($record = $result->fetch_assoc()) {
            $objects[] = static::instantiate($record);
        }
        $result->free();
        return $objects;
    }

    static public function findById($id) {
        $sql = 'SELECT * FROM ' . static::$table . ' ';
        $sql .= 'WHERE id = \'' . self::$db->escape_string($id) . '\'';
        $result = static::find($sql);
        return array_shift($result);
    }

    static protected function instantiate($record) {
        $object = new static;
        foreach ($record as $property => $value) {
            if (property_exists($object, $property)) {
                $object->$property = $value;
            }
        }
        return $object;
    }
}
?>