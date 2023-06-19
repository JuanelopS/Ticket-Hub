<?php

session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . "/models/UserModel.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/models/SessionModel.php";

class TicketController
{

    public function send()
    {
        require_once HEADER;
        require_once $_SERVER['DOCUMENT_ROOT'] . '/views/ticket/send.php';
        require_once FOOTER;
    }

}
