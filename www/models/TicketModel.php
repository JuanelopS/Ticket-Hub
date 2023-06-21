<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/database/DatabaseClass.php";

class Ticket extends Database
{

    protected static int $id;
    protected static int $type;
    protected static int $priority; //1: normal, 2: low, 3: high, 4: urgent
    protected static string $ticket_text;
    protected static int $state; //1: todo - 2:wip - 3:done
    protected static string $creation_date;
    protected static string $modification_date;
    protected static int $user_id;

    function __construct($type, $priority, $ticket_text, $state, $user_id)
    {
        self::$type = $type;
        self::$priority = $priority;
        self::$ticket_text = $ticket_text;
        self::$state = $state;
        self::$user_id = $user_id;
    }

    public static function get($data = '')
    {
        if ($data === '') {
            parent::$query = "SELECT * FROM tickets";
            $result = self::get_results_from_query();
            parent::close_connection();
            return $result;
        } else {
            parent::$query = "SELECT * FROM tickets WHERE id = ?";
            $result = parent::get_results_from_query([$data]);
            return $result;
        }
    }

    public static function get_ticket_types()
    {
        parent::$query = "SELECT * FROM tickets_type";
        $result = self::get_results_from_query();
        parent::close_connection();
        return $result;
    }

    public static function get_ticket_priorities() {
        parent::$query = "SELECT * FROM tickets_priority";
        $result = self::get_results_from_query();
        parent::close_connection();
        return $result;
    }

    public static function insert()
    {
        parent::$query = "INSERT INTO tickets (type, ticket_text, state, modification_date, user_id, priority) VALUES (?, ?, ?, ?, ?)";

        $data = [
            'type' => self::$type,
            'ticket_text' => self::$ticket_text,
            'state' => self::$state,
            'modification_date' => self::$modification_date,
            'user_id' => self::$user_id,
            'priority' => self::$priority
        ];

        parent::execute_query(array_values($data));
    }

    public static function delete($id)
    {
        parent::$query = "DELETE FROM tickets WHERE id = ?";
        parent::execute_query([$id]);
    }

    public static function update($data, $query)
    {
        parent::$query = $query;
        $data_update = $data;
        parent::execute_query(array_values($data_update));
    }
}
