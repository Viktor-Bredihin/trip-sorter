<?php

namespace models;

use services\TripSorter;
use models\Ticket;

/**
 * Class Trip
 * @package models
 */
class Trip
{
    /**
     * @var array $tickets
     */
    public $tickets;

    /**
     * @param \models\Ticket $ticket
     * @return $this
     */
    public function addTicket(Ticket $ticket)
    {
        $this->tickets[] = $ticket;

        return $this;
    }

    /**
     * @param \models\Ticket $ticket
     * @return $this
     */
    public function removeTicket(Ticket $ticket)
    {
        if(($key = array_search($ticket, $this->tickets)) !== FALSE) {
            unset($this->tickets[$key]);
        }

        return $this;
    }

    /**
     * @return array $tickets
     */
    public function getTickets()
    {
        return $this->tickets;
    }

    /**
     * @return $this
     * sort tickets
     */
    public function sortTickets()
    {
        $this->tickets = TripSorter::sort($this->tickets);
        return $this;
    }

    /**
     * get instructions how to complete the trip
     */
    public function getLead()
    {
        $result = [];
        foreach ($this->tickets as $ticket) {
            $result[] = (string)$ticket . '</br>';
        }
    }

    /**
     * get instructions how to complete the trip
     */
    public function lead()
    {
        foreach ($this->tickets as $ticket) {
            echo $ticket . '</br>';
        }
    }
}