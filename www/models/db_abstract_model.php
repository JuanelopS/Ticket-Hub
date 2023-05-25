<?php

abstract class DBAbstractModel
{
    private static $db_host = 'mysql';
    private static $db_name = 'dbname';
    private static $db_user = 'root';
    private static $db_pass = 'test';
    protected $table_name;
    protected $query;
    protected $rows = array();
    private $conn;

    # Abstract methods
    abstract protected function get();
    abstract protected function set();
    abstract protected function edit();
    abstract protected function delete();

    # Database connection
    private function open_connection()
    {
        self::$conn =
        new PDO("mysql:host=" . self::$db_host . ";dbname=" . self::$db_name . ";charset=utf8", self::$db_user, self::$db_pass);
    }

    # Database close connection
    private function close_connection()
    {
        self::$conn = null;
    }

    # Database queries INSERT, DELETE, UPDATE
    protected function execute_single_query()
    {
        $this->open_connection();
        $this->conn->query($this->query);
        $this->close_connection();
    }

    # Database query SELECT (array)
    protected function get_results_from_query()
    {
        $this->open_connection();
        $result = $this->conn->query($this->query);
        while ($this->rows[] = $result->fetch_assoc());
        $result->close();
        $this->close_connection();
        array_pop($this->rows);
    }
}
