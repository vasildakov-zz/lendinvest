<?php
namespace LendInvest\ModelTest;

use LendInvest\Model\Investor;

/**
 * InvestorTest
 *
 * @package LendInvest
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class InvestorTest extends \PHPUnit_Framework_TestCase
{
    public function testInvestorInstance()
    {
        $this->assertInstanceOf('LendInvest\Model\Investor', new Investor);
    }

    public function testInvestorProperties()
    {
        $this->assertClassHasAttribute('name', 'LendInvest\Model\Investor');
        $this->assertClassHasAttribute('surname', 'LendInvest\Model\Investor');
        $this->assertClassHasAttribute('email', 'LendInvest\Model\Investor');
        $this->assertClassHasAttribute('city', 'LendInvest\Model\Investor');
        $this->assertClassHasAttribute('address', 'LendInvest\Model\Investor');
        $this->assertClassHasAttribute('wallet', 'LendInvest\Model\Investor');
    }
}
