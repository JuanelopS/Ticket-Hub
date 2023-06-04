<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/config/constants.php";

abstract class Database
{

    protected static $connection = null;
    protected static $query;
    protected static $stmt;

    /* CRUD ABSTRACT / STATIC FUNCTIONS FOR SUBCLASSES */

    abstract protected static function get_all();
    abstract protected static function get_by_id($id);
    abstract protected static function insert();
    abstract protected static function delete($id);
    abstract protected static function update($id);

    /* OPEN / CLOSE CONNECTIONS */

    protected static function open_connection()
    {
        try {
            self::$connection = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    protected static function close_connection()
    {
        self::$connection = null;
    }

    /**
     * Static function for return array data from database (SELECT)
     *
     * @param  $data
     * @return array
     */
    public static function get_results_from_query($data = "")
    {
        try {
            self::open_connection();
            self::$stmt = self::$connection->prepare(self::$query);
            self::$stmt->bindParam(':id', $data);
            self::$stmt->execute();
            return self::$stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            self::close_connection();
        }
    }

    /**
     * Static function for execute a simple query (INSERT, UPDATE, DELETE)
     *
     * @param array $data
     * @return void
     */
    public static function execute_query($data = '')
    {
        try {
            self::open_connection();
            self::$stmt = self::$connection->prepare(self::$query);
            self::$stmt->execute($data);
            print self::$connection->lastInsertId();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage() . "<br>";
            echo "<b>ERROR</b>";
        } finally {
            self::close_connection();
        }
    }
}
