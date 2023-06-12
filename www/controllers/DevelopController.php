<?php

class DevelopController
{

    public function __construct()
    {
    }

    public function aa(){
        $data = [[
            'name' => 'Juan',
            'surname' => 'Gavira',
            'age' => 40,
            'data' => [1, 2, 3, 4, 5]
        ]];

        $flat_array = array_merge(...$data);

        var_dump($flat_array);
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
}
