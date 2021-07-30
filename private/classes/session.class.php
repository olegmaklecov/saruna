<?php
class Session {
    public $user_id;
    public $username;

    public function __construct() {
        session_start();
        $this->checkLogin();
    }

    public function login($user) {
        $this->user_id = $user->id;
        $this->username = $user->username;
        $_SESSION['user_id'] = $user->id;
        $_SESSION['username'] = $user->username;
    }

    public function logout() {
        unset($this->user_id);
        unset($this->username);
        unset($_SESSION['user_id']);
        unset($_SESSION['username']);
    }

    public function isLoggedIn() {
        return isset($this->user_id);
    }

    public function isUser($id) {
        return $this->user_id == $id;
    }

    private function checkLogin() {
        if (isset($_SESSION['user_id'])) {
            $this->user_id = $_SESSION['user_id'];
            $this->username = $_SESSION['username'];
        }
    }
}
?>