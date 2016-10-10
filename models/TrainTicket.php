<?php

namespace models;
use models\Ticket as Ticket;

class TrainTicket extends Ticket
{
    public $number;

    public function __construct(array $ticket)
    {
        parent::__construct($ticket);
        $this->setNumber(isset($ticket['number']) ? $ticket['number'] : null);
    }

    /**
     * @return string $number
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param string $number
     */
    public function setNumber($number)
    {
        $this->number = $number;
    }

    public function __toString()
    {
        $result = "Take train {$this->getNumber()} from " . $this->getStartPoint() . ' to ' . $this->getEndPoint() . '.';
        if ($this->getSeat()) {
            $result .= ' Sit in seat ' . $this->getSeat();
        }

        return $result;
    }
}