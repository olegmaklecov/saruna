<?php
class User extends Db {
    static protected $table = 'users';
    static protected $columns = ['id', 'username', 'pwd'];

    public $id;
    public $username;
    public $unhashed_pwd;
    public $confirm_pwd;
    protected $pwd;
    public $pwd_required = true;

    public function __construct($args=[]) {
        $this->username = $args['username'] ?? '';
        $this->unhashed_pwd = $args['unhashed_pwd'] ?? '';
        $this->confirm_pwd = $args['confirm_pwd'] ?? '';
    }

    static public function findByUsername($username) {
        $sql = 'SELECT * FROM ' . static::$table . ' ';
        $sql .= 'WHERE username = \'' . self::$db->escape_string($username) . '\'';
        $result = static::find($sql);
        if (!empty($result)) {
            return array_shift($result);
        } else {
            return false;
        }
    }

    public function setHashedPwd() {
        $this->pwd = password_hash($this->unhashed_pwd, PASSWORD_BCRYPT);
    }

    public function verifyPwd($pwd) {
        return password_verify($pwd, $this->pwd);
    }

    protected function validate() {
        $this->errors = [];

        if (isBlank($this->username)) {
            $this->errors[] = 'Username cannot be blank.';
        } elseif (!hasLength($this->username, ['min' => 6, 'max' => 24])) {
            $this->errors[] = 'Username must be between 6 and 24 characters long.';
        } elseif (!hasUniqueUsername($this->username, $this->id)) {
            $this->errors[] = 'Username already exists.';
        }

        if (isBlank($this->unhashed_pwd)) {
            $this->errors[] = 'Password cannot be blank.';
        } elseif (!hasLength($this->unhashed_pwd, ['min' => 8])) {
            $this->errors[] = 'Password must be at least 8 characters long.';
        }

        if (isBlank($this->confirm_pwd) || $this->unhashed_pwd !== $this->confirm_pwd) {
            $this->errors[] = 'Please confirm password.';
        }

        return $this->errors;
    }
}
?>