<?php

require_once (__DIR__ . '/Db.php');

class Table
{
    protected $db = null;

    protected $table = null;

    /**
     * Table constructor.
     * @param $db
     */
    public function __construct (Db $db)
    {
        $this->db = $db;
    }

    public function findAll ()
    {
        $pdo = $this->db->getPdo();
        return $pdo->query(sprintf('SELECT * FROM %s', $this->table));
    }
}
