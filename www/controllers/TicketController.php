<?php

session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . "/models/TicketModel.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/models/SessionModel.php";

class TicketController
{

    public function details($id)
    {
        $tables = true;
        $ticket_js = true;
        $ticket = new Ticket();
        $responses = $ticket->get_ticket_responses($id);
        $data = array_merge(...$ticket->get_ticket_details($id));
        $states = $ticket->get_ticket_states();

        require_once HEADER;
        require_once $_SERVER['DOCUMENT_ROOT'] . '/views/ticket/details.php';
        require_once FOOTER;
    }

    public function ticket_list()
    {
        $ticket = new Ticket();
        return $ticket->get();
    }


    public function send()
    {

        $ticket = new Ticket();
        $ticket_send = true;
        $ticket_types = $ticket->get_ticket_types();
        $ticket_priorities = $ticket->get_ticket_priorities();

        require_once HEADER;
        require_once $_SERVER['DOCUMENT_ROOT'] . '/views/ticket/send.php';
        require_once FOOTER;
    }

    public function exec_send_ticket()
    {
        $_post = json_decode(file_get_contents('php://input'), true);

        $type = $_post['type'];
        $priority = $_post['priority'];
        $ticket_text = $_post['ticket_text'];
        $subject = $_post['subject'];
        $state = 1;
        $user_id = $_SESSION['id'];
        $creation_date = $_post['creation_date'];
        $modification_date = $_post['creation_date'];

        $ticket = new Ticket($type, $priority, $ticket_text, $subject, $state, $user_id, $creation_date, $modification_date);
        $ticket->insert();
        $ticket = null;

        header("Location: /user/profile/" . $user_id);
    }

    public function response()
    {
        $_post = json_decode(file_get_contents('php://input'), true);
        $ticket_id = $_post['ticket_id'];
        $response_text = $_post['response_text'];
        $user_id = $_SESSION['id'];

        $response = new Ticket();
        $response->insert_response($ticket_id, $response_text, $user_id);
        $response->update_modificacion_date($ticket_id);
    }

    public function update_state()
    {
        $_put = json_decode(file_get_contents('php://input'), true);
        $ticket_id = $_put['id'];
        $state_id = $_put['state'];

        $ticket = new Ticket();
        $ticket->update_ticket_state($ticket_id, $state_id);
        $ticket->update_modificacion_date($ticket_id);
    }
}
