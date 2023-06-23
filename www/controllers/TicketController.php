<?php

session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . "/models/TicketModel.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/models/SessionModel.php";

class TicketController
{
    public function send()
    {

        $ticket = new Ticket();
        $ticket_types = $ticket->get_ticket_types();
        $ticket_priorities = $ticket->get_ticket_priorities();

        require_once HEADER;
        require_once $_SERVER['DOCUMENT_ROOT'] . '/views/ticket/send.php';
        require_once FOOTER;
    }

    function exec_send_ticket()
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
}