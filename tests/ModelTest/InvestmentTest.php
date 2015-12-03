<?php
namespace LendInvest\ModelTest;

use LendInvest\Model\Investment;

/**
 * InvestmentTest
 *
 * @package LendInvest
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class InvestmentTest extends \PHPUnit_Framework_TestCase
{
    public function testTrancheInstance()
    {
        $this->assertInstanceOf('LendInvest\Model\Investment', new Investment);
    }

    public function testTrancheProperties()
    {
        $this->assertClassHasAttribute('amount', 'LendInvest\Model\Investment');
        $this->assertClassHasAttribute('investor', 'LendInvest\Model\Investment');
        $this->assertClassHasAttribute('createdAt', 'LendInvest\Model\Investment');
    }
}
