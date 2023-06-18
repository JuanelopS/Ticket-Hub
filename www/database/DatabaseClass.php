<?php

/* TODO: FUNCTION TO CREATE BACKUP DATABASE */
/* TODO: TIME ZONE DATABASE SERVER */


require_once $_SERVER['DOCUMENT_ROOT'] . "/config/constants.php";

abstract class Database
{

    protected static $connection = null;
    protected static $query;
    protected static $stmt;

    /* CRUD ABSTRACT / STATIC FUNCTIONS FOR SUBCLASSES */

/*     abstract protected static function get_all();
    abstract protected static function get_by_id($id); */
    abstract protected static function get();
    abstract protected static function insert();
    abstract protected static function delete($id);
    abstract protected static function update($data, $query);

    /* OPEN / CLOSE CONNECTIONS */

    protected static function open_connection()
    {
        try {
            self::$connection = new PDO(DB_DSN, DB_USER, DB_PASSWORD, array(
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            ));
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
    public static function get_results_from_query($data = array())
    {
        try {
            self::open_connection();
            self::$stmt = self::$connection->prepare(self::$query);
            self::$stmt->execute($data);
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
    public static function execute_query($data = "")
    {
        try {
            self::open_connection();
            self::$stmt = self::$connection->prepare(self::$query);
            self::$stmt->execute($data);
            self::$connection->lastInsertId();
        } catch (PDOException $e) {
            echo "<p style='color:red'>Error: " . $e->getMessage() . "</p><br>";
            var_dump(self::$stmt);
        } finally {
            self::close_connection();
        }
    }

}
