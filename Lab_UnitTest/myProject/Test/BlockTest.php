<?php
namespace myProject\Test;
use myProject\Block;

    class BlockTest extends \PHPUnit_Framework_TestCase
    {
        public function testMaxBlock ()
        {
            $origin = [
                [1, 1, 0, 0, 0, 0, 0, 0, 0, 0],
                [1, 1, 0, 1, 1, 0, 0, 0, 0, 0],
                [0, 0, 0, 1, 1, 0, 0, 0, 0, 0],
                [0, 0, 0, 0, 0, 1, 1, 1, 0, 0],
                [1, 1, 1, 1, 1, 0, 0, 0, 0, 0],
                [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
                [1, 1, 1, 0, 1, 0, 0, 0, 0, 0],
                [1, 0, 0, 1, 1, 0, 1, 1, 1, 0],
                [1, 0, 0, 1, 1, 0, 1, 1, 1, 1],
                [1, 1, 0, 1, 1, 0, 0, 0, 0, 0]
            ];

            $expectedResult = [
                [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
                [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
                [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
                [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
                [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
                [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
                [1, 1, 1, 0, 1, 0, 0, 0, 0, 0],
                [1, 0, 0, 1, 1, 0, 1, 1, 1, 0],
                [1, 0, 0, 1, 1, 0, 1, 1, 1, 1],
                [1, 1, 0, 1, 1, 0, 0, 0, 0, 0]

            ];

            $findMax = new Block();
            $result = $findMax->findMaxBlock($origin);
            $this->assertEquals($expectedResult, $result);
        }
    }

