<?php
class Db {
    protected $db;
    protected $table;
    protected $columns = [];
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

    static protected function instantiate($record) {
        $object = new static;
        foreach ($record as $property => $value) {
            if (property_exists($property)) {
                $object->$property = $value;
            }
        }
        return $object;
    }
}
?>