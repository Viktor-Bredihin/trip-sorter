<?php

namespace models;

use \Exception;
use models\TrainTicket;
use models\FlightTicket;

class TicketFactory
{
    /**
     * @param array $ticket
     * @param string $type
     * @return \models\FlightTicket|\models\TrainTicket
     * @throws Exception
     */
    public static function create($ticket, $type)
    {
        switch ($type) {
            case 'train':
                $ticket = new TrainTicket($ticket);
                break;
            case 'flight':
                $ticket = new FlightTicket($ticket);
                break;
            default:
                throw new Exception('Transport type not found!');
        }

        return $ticket;
    }
}