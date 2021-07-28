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

    public function setHashedPwd() {
        $this->pwd = password_hash($this->unhashed_pwd, PASSWORD_BCRYPT);
    }

    public function verifyPwd($pwd) {
        return password_verify($this->pwd , $pwd);
    }
}
?>