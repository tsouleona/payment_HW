<?php
namespace myProject\Test;
use myProject\Model;

    class ModelTest extends \PHPUnit_Framework_TestCase
    {
        public function providerTestExpense ()
        {
            return [
                ['20160809001', '100', 'test', true],
                ['20160809001', '100000', 'test', '您的出款金額大於餘額'],
                ['20160809001', '-55', 'test', '您的出款金額不能小於0']
            ];
        }

        public function providerTestDeposit ()
        {
            return [
                ['20160809001', '100', 'test', true],
                ['20160809001', '-55', 'test', '您的出款金額不能小於0']
            ];
        }

        public function providerTestId ()
        {
            return [
                ['20160809001', true],
                ['20160809002', true],
                ['123456', false]
            ];
        }

        public function providerTestEntry ()
        {
            return [
                ['20160809001', true],
                ['20160809002', true],
                ['123456', false]
            ];
        }

        /**
         * @dataProvider providerTestExpense
         * */
        public function testExpense ($userId, $amount, $memo, $expectedResult)
        {
            $model = new Model();
            $result = $model->findExpenseconflict($userId, $amount, $memo);
            $this->assertEquals($expectedResult, $result);
        }

        /**
         * @dataProvider providerTestDeposit
         * */
        public function testDeposit ($userId, $amount, $memo, $expectedResult)
        {
            $model = new Model();
            $result = $model->findDepositconflict($userId, $amount, $memo);
            $this->assertEquals($expectedResult, $result);
        }

        /**
         * @dataProvider providerTestId
         * */
        public function testId ($userId, $expectedResult)
        {
            $model = new Model();
            $result = $model->checkId($userId);
            $this->assertEquals($expectedResult, $result);
        }

        /**
         * @dataProvider providerTestEntry
         * */
        public function testEntry ($userId, $expectedResult)
        {
            $model = new Model();
            $result = $model->selectEntry($userId);
            $this->assertEquals($expectedResult, $result);
        }



    }