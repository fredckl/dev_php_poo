<?php


class AddressesTable
{
    private $db = null;

    private $table = 'addresses';

    public function __construct ($db)
    {
        $this->db = $db;
    }

    public function findAll ()
    {
        $pdo = $this->db->getPdo();
        return $pdo->query(sprintf('SELECT * FROM %s', $this->table));
    }
}
