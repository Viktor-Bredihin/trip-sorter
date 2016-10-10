<?php

namespace tests\models;

use services\TripSorter;

class TripSorterTest extends \PHPUnit_Framework_TestCase
{
    public function testSortSuccess()
    {
        $items = [
            (object)[
                'startPoint' => 'Point B',
                'endPoint'   => 'Point C'
            ],
            (object)[
                'startPoint' => 'Point A',
                'endPoint'   => 'Point B'
            ],
            (object)[
                'startPoint' => 'Point D',
                'endPoint'   => 'Point E'
            ],
            (object)[
                'startPoint' => 'Point C',
                'endPoint'   => 'Point D'
            ]
        ];

        $this->assertEquals([
            $items[1],
            $items[0],
            $items[3],
            $items[2]
        ], TripSorter::sort($items));
    }

    /**
     * @expectedException Exception
     */
    public function testSortFail()
    {
        $items = [
            (object)[
                'startPoint' => 'Point A',
                'endPoint'   => 'Point B'
            ],
            (object)[
                'startPoint' => 'Point D',
                'endPoint'   => 'Point E'
            ],
            (object)[
                'startPoint' => 'Point C',
                'endPoint'   => 'Point D'
            ]
        ];
        TripSorter::sort($items);
    }
}