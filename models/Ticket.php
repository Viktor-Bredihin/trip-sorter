<?php

namespace models;

/**
 * Class TicketAbstract
 * Base class for all types of tickets
 * @package models
 */
abstract class Ticket
{
    /**
     * @var string $startPoint
     */
    public $startPoint;

    /**
     * @var string $endPoint
     */
    public $endPoint;

    /**
     * @var string $seat
     */
    public $seat;

    /**
     * Ticket constructor.
     * @param array $ticket
     */
    public function __construct($ticket)
    {
        $this->setStartPoint($ticket['startPoint']);
        $this->setEndPoint($ticket['endPoint']);
        $this->setSeat(isset($ticket['seat']) ? $ticket['seat'] : null);
    }

    /**
     * @return string $startPoint
     */
    public function getStartPoint()
    {
        return $this->startPoint;
    }

    /**
     * @param string $startPoint
     */
    public function setStartPoint($startPoint)
    {
        $this->startPoint = $startPoint;
    }

    /**
     * @return string $endPoint
     */
    public function getEndPoint()
    {
        return $this->endPoint;
    }

    /**
     * @param string $endPoint
     */
    public function setEndPoint($endPoint)
    {
        $this->endPoint = $endPoint;
    }

    /**
     * @return string $seat
     */
    public function getSeat()
    {
        return $this->seat;
    }

    /**
     * @param string $seat
     */
    public function setSeat($seat)
    {
        $this->seat = $seat;
    }
}