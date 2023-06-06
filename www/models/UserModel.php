<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/database/DatabaseClass.php";

class User extends Database
{

    protected static int $id_user;
    protected static string $email;
    private static string $password;
    protected static string $name;
    protected static string $surname;
    protected static string $register_date;
    protected static int $id_rol = 2;  //1: admin, 2: regular_user

    function __construct($email, $password, $name, $surname)
    {
        self::$email = $email;
        self::$password = $password;
        self::$name = $name;
        self::$surname = $surname;
    }

    public function get_password()
    {
        return $this->password;
    }

    public function set_password($password)
    {
        $this->password = $password;
    }

    public static function get_all()
    {
        parent::$query = "SELECT * FROM users";
        $result = self::get_results_from_query();
        parent::close_connection();
        return $result;
    }

    public static function get_by_id($data)
    {
        parent::$query = "SELECT * FROM users WHERE id_user = ?";
        $result = parent::get_results_from_query([$data]);
        return $result;
    }

    public static function insert()
    {
        parent::$query = "INSERT INTO users (email,password,name,surname, id_rol) VALUES (?, ?, ?, ?, ?)";

        $data = [
            'email' => self::$email,
            'password' => self::$password,
            'name' => self::$name,
            'surname' => self::$surname,
            'id_rol' => self::$id_rol
        ];

        parent::execute_query(array_values($data));
    }

    public static function delete($id)
    {
        parent::$query = "DELETE FROM users WHERE id_user = ?";
        parent::execute_query([$id]);
    }

    public static function update($id)
    {
        parent::$query = "UPDATE users SET email = ?, password = ?, name = ?, surname = ? WHERE id_user = ?";

        $data = [
            'email' => self::$email,
            'password' => self::$password,
            'name' => self::$name,
            'surname' => self::$surname,
            'id_user' => $id
        ];

        parent::execute_query(array_values($data));
    }
}