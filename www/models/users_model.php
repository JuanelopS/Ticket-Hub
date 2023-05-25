<?php

require_once 'db_abstract_model.php';

class User extends DBAbstractModel
{
    protected $id_user;
    public $email;
    public $name;
    public $surname;
    protected $register_date;
    protected $id_rol;
    private $password;

    public function __construct()
    {
        $this->table_name = 'users';
    }

    public function get($user_email = '')
    {
        if ($user_email != '') {
            $this->query = "
                            SELECT
                            *
                            FROM
                            $this->table_name
                            ";
            $this->get_results_from_query();
        }
        if (count($this->rows) == 1) {
            foreach ($this->rows[0] as $propiedad => $valor) {
                $this->$propiedad = $valor;
            }
        }
    }

    public function set($user_data = [])
    {
        if (array_key_exists('email', $user_data)) {
            $this->get($user_data['email']);
            if ($user_data['email'] != $this->email) {
                foreach ($user_data as $campo => $valor) {
                    $$campo = $valor;
                }
                $this->query = "
                                INSERT INTO
                                usuarios
                                (nombre, apellido, email, clave)
                                VALUES
                                ('$nombre', '$apellido', '$email', '$clave')
                                ";
                $this->execute_single_query();
            }
        }
    }

    public function edit($user_data = [])
    {
        foreach ($user_data as $campo => $valor) {
            $$campo = $valor;
        }
        $this->query = "
                        UPDATE
                        usuarios
                        SET
                        nombre='$nombre',
                        apellido='$apellido',
                        clave='$clave'
                        WHERE
                        email = '$email'
                        ";
        $this->execute_single_query();
    }

    public function delete($user_email = '')
    {
        $this->query = "
                        DELETE FROM
                        usuarios
                        WHERE
                        email = '$user_email'
                        ";
        $this->execute_single_query();
    }

}
