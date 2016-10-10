<?php

namespace tests\models;

use models\TicketFactory;
use models\FlightTicket;
use models\TrainTicket;

class FlightTicketTest extends \PHPUnit_Framework_TestCase
{
    public function testCreate()
    {
        $trainTicket = TicketFactory::create([
            'startPoint' => 'Point A',
            'endPoint'   => 'Point B',
            'seat'       => 'Seat 1',
            'number'     => 'Number C'
        ], 'train');

        $this->assertInstanceOf(TrainTicket::class, $trainTicket);

        $flightTicket = TicketFactory::create([
            'startPoint' => 'Point A',
            'endPoint'   => 'Point B',
            'seat'       => 'Seat 1',
            'flight'     => 'Flight C'
        ], 'flight');

        $this->assertInstanceOf(FlightTicket::class, $flightTicket);
    }
}