<?php

namespace tests\models;

use models\Ticket;
use models\TrainTicket;
use models\FlightTicket;
use models\Trip;

class TripTest extends \PHPUnit_Framework_TestCase
{
    public function testAddRemoveTicket()
    {
        $trip = new Trip();
        $ticket = new FlightTicket([
            'startPoint' => 'Point A',
            'endPoint' => 'Point B'
        ]);
        // add ticket
        $trip->addTicket($ticket);
        $this->assertEquals(1, count($trip->getTickets()));

        // remove ticket
        $trip->removeTicket($ticket);
        $this->assertEquals(0, count($trip->getTickets()));
    }

    public function testSort()
    {
        $trip = new Trip();
        $tickets = [
            new FlightTicket([
                'startPoint' => 'Point A',
                'endPoint' => 'Point B'
            ]),
            new TrainTicket([
                'startPoint' => 'Point C',
                'endPoint' => 'Point D'
            ]),
            new FlightTicket([
                'startPoint' => 'Point B',
                'endPoint' => 'Point C'
            ])
        ];
        $trip->addTicket($tickets[0])->addTicket($tickets[1])->addTicket($tickets[2]);

        $trip->sortTickets();

        $this->assertEquals([$tickets[0], $tickets[2], $tickets[1]], $trip->getTickets());
    }
}