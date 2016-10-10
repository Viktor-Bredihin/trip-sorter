<?php

require __DIR__ . "/app/autoload.php";

use models\Trip;
use models\TicketFactory;

$trip = new Trip();
for ($i = 1; $i < 10; $i++) {
    $trip->addTicket(TicketFactory::create([
        'startPoint' => $i,
        'endPoint' => $i + 1
    ], 'train'));
}

$trip->sortTickets()->lead();