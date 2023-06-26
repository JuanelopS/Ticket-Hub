<?php

class Date
{

    protected $date;

    public function __construct()
    {
        $this->date = new DateTime();
    }

    public function get_date()
    {
        return $this->date->format('Y-m-d H:i:s');
    }

    public function get_format_date()
    {
        return $this->date->format('d-m-Y H:i:s');
    }

    /**
     * Calculates how many days have passed since a given date
     *
     * @param string $date
     * @return string
     */
    public function calculate_days_ago($date)
    {

        $this->date->setTimestamp(strtotime($date));
        $now = new DateTime();
        $interval = $this->date->diff($now);
        return $interval->format('%a');
    }
}
