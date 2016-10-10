<?php

namespace services;

/**
 * Class TripSorter
 * sorts an array of tickets and return trip in correct order
 * The idea of sorting algorithm to find the start of the trip and then order rest of items one by one
 * @package services
 */
class TripSorter
{
    /**
     * @var array $items
     * items need to be sorted
     */
    protected static $items;

    /**
     * @var array items
     * sorted items
     */
    protected static $itemsSorted;

    /**
     * @param array $items
     * @return array $itemsSorted
     */
    public static function sort($items)
    {
        self::$items = $items;
        self::$itemsSorted = array();

        self::getTripStart();

        self::doSort();

        return self::$itemsSorted;
    }

    /**
     * @throws \Exception if not possible to find the start of the trip
     * get start of the trip
     */
    protected static function getTripStart()
    {
        $startPoints = [];
        $endPoints = [];
        foreach (self::$items as $item) {
            if (!$item->startPoint || !$item->endPoint) {
                throw new \Exception("start point and end point required");
            }

            $startPoints[] = $item->startPoint;
            $endPoints[] = $item->endPoint;
        }

        $tripStart = isset(self::$items[key(array_diff($startPoints, $endPoints))]) ? self::$items[key(array_diff($startPoints, $endPoints))] : null;

        if ($tripStart) {
            self::$itemsSorted[] = $tripStart;
        } else {
            throw new \Exception("There is a broken chain in the trip!");
        }
    }

    /**
     * Do sort
     * @throws \Exception if there is a broken chain
     */
    protected static function doSort()
    {
        $nextSortedItem = array_filter(self::$items, function ($item) {
            return end(self::$itemsSorted)->endPoint == $item->startPoint;
        });
        $nextSortedItem = reset($nextSortedItem);

        if ($nextSortedItem) {
            self::$itemsSorted[] = $nextSortedItem;
            self::doSort();
        } elseif(count(self::$itemsSorted) != count(self::$items)) {
            throw new \Exception("There is a broken chain in the trip!");
        }
    }
}