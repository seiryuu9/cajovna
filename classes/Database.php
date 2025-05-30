<?php

namespace cajovna\classes;

if (!defined('__ROOT__'))
{
    define('__ROOT__', dirname(dirname(__FILE__)));
}

require_once __ROOT__.'/db/config.php';

class Database
{
    private $conn;

    public function __construct() //konstruktor zabezpeci, aby sa pripojenie zavolalo hned po vytvoreni instancie triedy databaza
    {
        $this->connect();
    }

    protected function connect(): void
    {
        $config = DATABASE;

        $options = array(
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION, //kazda databazova chyba bude PDOException
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC, //defaultne sa bude vracat asociativne pole
        );

        try {
            $this->conn = new \PDO('mysql:host=' . $config['HOST'] . ';dbname=' .
                $config['DBNAME'] . ';port=' . $config['PORT'], $config['USER_NAME'],
                $config['PASSWORD'], $options);
        } catch (\PDOException $e) {
            die('Chyba pripojenia: ' . $e->getMessage());
        }
    }

    // Getter na získanie pripojenia
    public function getConnection(): \PDO //vysledkom bude instancia triedy PDO, teda databazove pripojenie
    {
        return $this->conn;
    }

}

//PDO je PHP Data Objects - zabezpecuje rovnake rozhranie pre pripojenie k roznym databazam
// napr prepared statements zabezpecuju, ze sa do databazy nedostanu zle udaje (sql injection)
// \PDO je globalna, inak namespace conflict cajovna\classes\pdo