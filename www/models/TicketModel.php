<?php

/* TODO: CLEAN SOME SQL FUNCTIONS NEEDED (REPEATED) */

require_once $_SERVER['DOCUMENT_ROOT'] . "/database/DatabaseClass.php";

class Ticket extends Database
{
    protected static int $id;
    protected static int $type;
    protected static int $priority; //1: normal, 2: low, 3: high, 4: urgent
    protected static string $subject;
    protected static string $ticket_text;
    protected static int $state; //1: todo - 2:wip - 3:done
    protected static string $creation_date;
    protected static string $modification_date;
    protected static int $user_id;

    function __construct($type = 1, $priority = 1, $ticket_text = '', $subject = '', $state = 1, $user_id = 1, $creation_date = '', $modification_date = '')
    {
        self::$type = $type;
        self::$priority = $priority;
        self::$ticket_text = $ticket_text;
        self::$subject = $subject;
        self::$state = $state;
        self::$user_id = $user_id;
        self::$creation_date = $creation_date;
        self::$modification_date = $modification_date;
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

    public static function get_tickets_by_user($user_id)
    {
        parent::$query = "SELECT
                            tickets.id AS id,
                            tickets_priority.priority_name AS priority,
                            tickets_type.type AS type,
                            CONCAT(`users`.`name`, ' ', `users`.`surname`) AS user,
                            tickets.subject AS subject,
                            tickets.creation_date AS creation_date,
                            tickets.modification_date AS modification_date,
                            tickets_state.ticket_state AS state
                            FROM tickets
                            INNER JOIN users ON tickets.user_id = users.id
                            INNER JOIN tickets_type ON tickets.type = tickets_type.id
                            INNER JOIN tickets_priority ON tickets.priority = tickets_priority.id
                            INNER JOIN tickets_state ON tickets.state = tickets_state.id
                            WHERE user_id = ?
                            ORDER BY tickets.creation_date DESC";
        $result = parent::get_results_from_query([$user_id]);
        return $result;
    }

    public static function get_tickets()
    {
        parent::$query = "SELECT
                            tickets.id AS id,
                            tickets_priority.priority_name AS priority,
                            tickets_type.type AS type,
                            CONCAT(`users`.`name`, ' ', `users`.`surname`) AS user,
                            tickets.subject AS subject,
                            tickets.creation_date AS creation_date,
                            tickets.modification_date AS modification_date,
                            tickets_state.ticket_state AS state,
                            tickets_state.ticket_state_label AS state_label
                            FROM tickets
                            INNER JOIN users ON tickets.user_id = users.id
                            INNER JOIN tickets_type ON tickets.type = tickets_type.id
                            INNER JOIN tickets_priority ON tickets.priority = tickets_priority.id
                            INNER JOIN tickets_state ON tickets.state = tickets_state.id
                            ORDER BY tickets.id";
        $result = self::get_results_from_query();
        parent::close_connection();
        return $result;
    }

    public static function get_ticket_details($id)
    {
        parent::$query = "SELECT
                            tickets.id AS id,
                            tickets_priority.priority_name AS priority,
                            tickets_type.type AS type,
                            CONCAT(`users`.`name`, ' ', `users`.`surname`) AS user,
                            tickets.subject AS subject,
                            tickets.ticket_text AS ticket_text,
                            tickets.creation_date AS creation_date,
                            tickets.modification_date AS modification_date,
                            tickets_state.ticket_state AS state
                            FROM tickets
                            INNER JOIN users ON tickets.user_id = users.id
                            INNER JOIN tickets_type ON tickets.type = tickets_type.id
                            INNER JOIN tickets_priority ON tickets.priority = tickets_priority.id
                            INNER JOIN tickets_state ON tickets.state = tickets_state.id
                            WHERE tickets.id = ?";
        $result = parent::get_results_from_query([$id]);
        return $result;
    }

    public static function get_ticket_types()
    {
        parent::$query = "SELECT * FROM tickets_type";
        $result = self::get_results_from_query();
        parent::close_connection();
        return $result;
    }

    public static function get_ticket_priorities()
    {
        parent::$query = "SELECT * FROM tickets_priority";
        $result = self::get_results_from_query();
        parent::close_connection();
        return $result;
    }

    public static function get_ticket_states(){
        parent::$query = "SELECT id, ticket_state as state, ticket_state_label as label FROM tickets_state";
        $result = self::get_results_from_query();
        parent::close_connection();
        return $result;
    }

    public static function get_ticket_responses($id)
    {
        parent::$query = "SELECT 
                            tickets_responses.id AS id, 
                            tickets_responses.message AS message, 
                            tickets_responses.message_date AS message_date, 
                            tickets_responses.ticket_id AS ticket_id,
                            CONCAT(`users`.`name`, ' ', `users`.`surname`) AS user
                            FROM tickets_responses
                            INNER JOIN users ON tickets_responses.user_id = users.id 
                            WHERE tickets_responses.ticket_id = ? 
                            ORDER BY tickets_responses.message_date ASC";
        $result = self::get_results_from_query([$id]);
        parent::close_connection();
        return $result;
    }

    public static function insert()
    {
        parent::$query = "INSERT INTO tickets (type, priority, subject, ticket_text, state, user_id, creation_date, modification_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        $data = [
            'type' => self::$type,
            'priority' => self::$priority,
            'subject' => self::$subject,
            'ticket_text' => self::$ticket_text,
            'state' => self::$state,
            'user_id' => self::$user_id,
            'creation_date' => self::$creation_date,
            'modification_date' => self::$modification_date
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

    public static function insert_response($ticket_id, $response_text, $user_id, $response_date)
    {
        settype($ticket_id, 'int');
        settype($user_id, 'int');
        parent::$query = "INSERT INTO tickets_responses (message, ticket_id, user_id, message_date) VALUES (?, ?, ?, ?)";

        $data = [
            'message' => $response_text,
            'ticket_id' => $ticket_id,
            'user_id' => $user_id,
            'message_date' => $response_date
        ];

        parent::execute_query(array_values($data));
        self::update_modificacion_date($ticket_id, $response_date);
    }

    public static function update_modificacion_date($id, $modification_date)
    {

        require_once $_SERVER['DOCUMENT_ROOT'] . "/helpers/dates.php";
        $date = new Date();

        parent::$query = "UPDATE tickets SET modification_date = ? WHERE id = ?";

        $data = [
            'modification_date' => $modification_date,
            'id' => $id
        ];

        parent::execute_query(array_values($data));
    }

    public static function update_ticket_state($id, $state, $modification_date){
        parent::$query = "UPDATE tickets SET state = ?, modification_date = ? WHERE id = ?";

        $data = [
            'state' => $state,
            'modification_date' => $modification_date,
            'id' => $id
        ];

        parent::execute_query(array_values($data));
        
    }

    public static function get_all_unfinished_tickets(){
        parent::$query = "SELECT
                            id, state
                            FROM tickets
                            WHERE state = 1 OR state = 2";
        $result = self::get_results_from_query();
        parent::close_connection();
        return count($result);
    }

    public static function get_finished_tickets(){
        parent::$query = "SELECT
                            id, state
                            FROM tickets
                            WHERE state = 3";
        $result = self::get_results_from_query();
        parent::close_connection();
        return count($result);
    }
}
