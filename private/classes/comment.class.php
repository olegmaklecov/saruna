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
        $this->content = $args['content'] ?? '';
        $this->date = date('Y-n-j');
    }

    static public function findByPostId($post_id) {
        $sql = 'SELECT * FROM ' . static::$table . ' ';
        $sql .= 'WHERE post_id = \'' . self::$db->escape_string($post_id) . '\' ';
        $sql .= 'ORDER BY date DESC';
        return static::find($sql);
    }

    protected function validate() {
        $this->errors = [];

        if (isBlank($this->content)) {
            $this->errors[] = 'Content cannot be blank.';
        }

        return $this->errors;
    }
}
?>