<?php
class Post extends Db {
    static protected $table = 'posts';
    static protected $columns = ['id', 'user_id', 'title', 'content', 'date', 'category'];

    public $id;
    public $user_id;
    public $title;
    public $content;
    public $date;
    public $category;

    public function __construct($args=[]) {
        $this->user_id = '1';
        $this->title = $args['title'] ?? '';
        $this->content = $args['content'] ?? '';
        $this->date = date('Y-n-j');
        $this->category = $args['category'] ?? '';
    }

    static public function findAll() {
        $sql = 'SELECT * FROM ' . self::$table;
        return static::find($sql);
    }

    static public function findByUserId($user_id) {
        $sql = 'SELECT * FROM ' . static::$table . ' ';
        $sql .= 'WHERE user_id = \'' . self::$db->escape_string($user_id) . '\'';
        return static::find($sql);
    }
}
?>