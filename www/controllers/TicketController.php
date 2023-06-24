<?php

session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . "/models/TicketModel.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/models/SessionModel.php";

class TicketController
{

    public function details($id){

        $tables = true;
        $ticket_response = true;
        $ticket = new Ticket();
        $responses = $ticket->get_ticket_responses($id);
        $data = array_merge(...$ticket->get_ticket_details($id));
        require_once HEADER;
        require_once $_SERVER['DOCUMENT_ROOT'] . '/views/ticket/details.php';
        require_once FOOTER;
    }
    public function send()
    {

        $ticket = new Ticket();
        $ticket_types = $ticket->get_ticket_types();
        $ticket_priorities = $ticket->get_ticket_priorities();

        require_once HEADER;
        require_once $_SERVER['DOCUMENT_ROOT'] . '/views/ticket/send.php';
        require_once FOOTER;
    }

    public function ticket_list(){
        $ticket = new Ticket();
        return $ticket->get();
    }

    public function exec_send_ticket()
    {
        if ($_POST != null) {

            $type = $_POST['type'];
            $priority = $_POST['priority'];
            $ticket_text = $_POST['ticket_text'];
            $subject = $_POST['subject'];
            $state = 1;
            $user_id = $_SESSION['id'];

            $ticket = new Ticket($type, $priority, $ticket_text, $subject, $state, $user_id);
            $ticket->insert();
            $ticket = null;

            header("Location: /user/profile/" . $user_id);
        }
    }

    public function response(){

        $_post = json_decode(file_get_contents('php://input'), true);
        $ticket_id = $_post['ticket_id'];
        $response_text = $_post['response_text'];

        $response = new Ticket();
        $response->insert_response($ticket_id, $response_text);
    }


}