<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/models/SessionModel.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/models/UserModel.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/models/TicketModel.php";

class AdminController
{

    public function dashboard()
    {
        session_start();
        $tables = true;
        require_once HEADER;
        require_once $_SERVER['DOCUMENT_ROOT'] . "/views/admin/dashboard.php";

        $tickets_data = self::get_all_tickets();
        require_once $_SERVER['DOCUMENT_ROOT'] . "/views/ticket/list.php";

        $users = self::get_all_users();
        require_once $_SERVER['DOCUMENT_ROOT'] . "/views/user/list.php";

        require_once FOOTER;
    }

    private function get_all_tickets()
    {
        $tickets = new Ticket();

        $data = [
            'tickets' => $tickets->get_tickets(),
            'unfinished_tickets' => $tickets->get_all_unfinished_tickets(),
            'finished_tickets' => $tickets->get_finished_tickets()
        ];

        return $data;
    }

    private function get_all_users(){
        $users = new User();
        return $users->get();
    }

    private function get_tickets_by_user($id){
        $tickets = new Ticket();
        return $tickets->get_tickets_by_user($id);
    }
}
