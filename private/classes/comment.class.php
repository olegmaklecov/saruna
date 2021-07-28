<?php
class Comment extends Db {
    static protected $table = 'comments';
    static protected $columns = ['id', 'post_id', 'username', 'content', 'date'];

    public $id;
    public $post_id;
    public $username;
    public $content;
    public $date;

    public function __construct($args=[]) {
        $this->post_id = $args['post_id'] ?? '';
        $this->username = $args['username'] ?? '';
        $this->content = $args['content'] ?? '';
        $this->date = $args['date'] ?? '';
    }

    static public function findByPostId($post_id) {
        $sql = 'SELECT * FROM ' . static::$table . ' ';
        $sql .= 'WHERE post_id = \'' . self::$db->escape_string($post_id) . '\'';
        return static::find($sql);
    }
}
?>