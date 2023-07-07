<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/models/SessionModel.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/models/UserModel.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/models/TicketModel.php";
class DevelopController
{

    public function __construct()
    {
    }

    public function password_hash_cost()
    {

        /**
         * This code will benchmark your server to determine how high of a cost you can
         * afford. You want to set the highest cost that you can without slowing down
         * you server too much. 8-10 is a good baseline, and more is good if your servers
         * are fast enough. The code below aims for ≤ 50 milliseconds stretching time,
         * which is a good baseline for systems handling interactive logins.
         */

        $timeTarget = 0.05; // 50 milliseconds 

        $cost = 8;
        do {
            $cost++;
            $start = microtime(true);
            password_hash("test", PASSWORD_BCRYPT, ["cost" => $cost]);
            $end = microtime(true);
        } while (($end - $start) < $timeTarget);

        echo "Appropriate Cost Found: " . $cost;
    }


    public function dates(){
        require_once $_SERVER['DOCUMENT_ROOT'] . "/helpers/dates.php";

        $date = new Date();
        echo $date->get_date();
        echo "<br>";
        echo $date->calculate_days_ago('2023-06-23 14:59:59');
    }

    public function ticket_list_json(){
        $ticket = new Ticket();
        $tickets = $ticket->get_tickets();
        header('Content-Type: application/json');
        echo json_encode($tickets);
    }

    public function ticket_list(){
        
        require_once HEADER;
        
        require_once FOOTER;
        echo "<script src='../assets/js/develop.js'></script>";
    }
}
