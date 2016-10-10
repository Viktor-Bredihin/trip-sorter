<?php

namespace models;
use models\Ticket as Ticket;

class FlightTicket extends Ticket
{
    public $flight;

    public function __construct(array $ticket)
    {
        parent::__construct($ticket);
        $this->setFlight(isset($ticket['flight']) ? $ticket['flight'] : null);
    }

    /**
     * @return string $flight
     */
    public function getFlight()
    {
        return $this->flight;
    }

    /**
     * @param string $flight
     */
    public function setFlight($flight)
    {
        $this->flight = $flight;
    }

    public function __toString()
    {
        $result = "Take train {$this->getFlight()} from " . $this->getStartPoint() . ' to ' . $this->getEndPoint() . '.';
        if ($this->getSeat()) {
            $result .= ' Sit in seat ' . $this->getSeat();
        }

        return $result;
    }
}