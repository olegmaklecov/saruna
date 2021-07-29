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

    protected function sanitise() {
        $sanitised = [];
        $properties = [];
        foreach (static::$columns as $column) {
            if ($column == 'id') { continue; }
            $properties[$column] = $this->$column;
        }
        foreach ($properties as $key => $value) {
            $sanitised[$key] = self::$db->escape_string($value);
        }
        return $sanitised;
    }

    public function create() {
        $properties = $this->sanitise();
        $sql = 'INSERT INTO ' . static::$table . ' (';
        $sql .= join(', ', array_keys($properties));
        $sql .= ') VALUES (\'';
        $sql .= join('\', \'', array_values($properties));
        $sql .= '\')';
        self::$db->query($sql);
        $this->id = self::$db->insert_id;
    }

    public function merge($args=[]) {
        foreach ($args as $key => $value) {
            if (property_exists($this, $key) && !is_null($value)) {
                $this->$key = $value;
            }
        }
    }

    public function update() {
        $properties = $this->sanitise();
        $pairs = [];
        foreach ($properties as $key => $value) {
            $pairs[] = "$key='$value'";
        }
        $sql = 'UPDATE ' . static::$table . ' SET ';
        $sql .= join(', ', $pairs);
        $sql .= ' WHERE id = \'' . self::$db->escape_string($this->id) . '\' ';
        $sql .= 'LIMIT 1';
        echo $sql;
        self::$db->query($sql);
    }

    public function delete() {
        $sql = 'DELETE FROM ' . static::$table . ' ';
        $sql .= 'WHERE id = \'' . self::$db->escape_string($this->id) . '\' ';
        $sql .= 'LIMIT 1';
        self::$db->query($sql);
    }
}
?>