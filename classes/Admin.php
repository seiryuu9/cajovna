<?php

namespace cajovna\classes;
use PDO;
require_once __DIR__ . '/../classes/Database.php';

class Admin{

    private const VALID_USERNAME = 'admin';
    private const VALID_PASSWORD_HASH = '$2y$10$0K6pSxCLILEOwh/bjk46SeftnvbxBhUGmJhx2JlRbHTpiePZJ/4Z6';

    public static function login($username, $password){
        // Hardcoded login (replace with database if needed)
        $error = '';

        // self pre staticke (nemusi existovat instancia na zavolanie)
        if ($username === self::VALID_USERNAME && password_verify($password, self::VALID_PASSWORD_HASH)) {
            $_SESSION['admin_logged_in'] = true;
            header('Location: messages.php');
            exit;
        } else {
            $error = 'Nesprávne meno alebo heslo.';
            return $error;
        }
    }

    public static function logout(){
        session_start();
        session_destroy();
        header("Location: login.php");
        exit;
    }

    public static function check(){
        session_start();
        if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
            header('Location: login.php'); //ak nie je prihlaseny, presmeruj na login
            exit;
        }
    }

    public static function editMessage($id, $data = null){

        self::check();
        $db = new Database();
        $conn = $db->getConnection();

        $id = intval($id);
        $stmt = $conn->prepare("SELECT * FROM formular WHERE id = ?");
        $stmt->execute([$id]);
        $message = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($data) {
            $meno = $data['meno'];
            $email = $data['email'];
            $sprava = $data['sprava'];

            $update = $conn->prepare("UPDATE formular SET meno = ?, email = ?, sprava = ? WHERE id = ?"); //CRUD - update
            $update->execute([$meno, $email, $sprava, $id]);

            header("Location: messages.php");
            exit;
        }
        return $message;
    }

    public static function deleteMessage($id){
        self::check();
        $db = new Database();
        $conn = $db->getConnection();

        $id = intval($id);
        $stmt = $conn->prepare("DELETE FROM formular WHERE id = ?"); //CRUD - delete
        $stmt->execute([$id]);

        header("Location: messages.php");
        exit;
    }

}