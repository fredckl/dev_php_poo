<?php


class Db
{
    /**
     * Définition de l'hôte
     **/
    private $host = null;
    /**
     * Définition de la base de données
     **/
    private $dbname = null;
    /**
     * Définition du nom d'utilisateur à l'accès à la base de données
     **/
    private $user = null;
    /**
     * Définition du mot de passe pour l'accès à la base de données
     **/
    private $password = null;

    /**
     * Définition de la future instance PDO
     **/
    private $pdo = null;

    public function __construct($dbname, $user, $password, $host = 'localhost')
    {
        $this->dbname = $dbname;
        $this->user = $user;
        $this->password = $password;
        $this->host = $host;


    }

    /**
     * Instanciation et récupétation d'une nouvelle instance PDO
     */
    public function getPdo ()
    {
        return new PDO('mysql:host='. $this->host . ';dbname=' . $this->dbname , $this->user, $this->password);
    }
}

