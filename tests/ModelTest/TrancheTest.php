<?php
namespace LendInvest\ModelTest;

use LendInvest\Model\Tranche;
use LendInvest\Model\Investment;
use LendInvest\Model\Interest;

/**
 * TrancheTest
 *
 * @package LendInvest
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class TrancheTest extends \PHPUnit_Framework_TestCase
{
    public function testTrancheInstance()
    {
        $this->assertInstanceOf('LendInvest\Model\Tranche', new Tranche);
    }

    public function testTrancheProperties()
    {
        $this->assertClassHasAttribute('loan', 'LendInvest\Model\Tranche');
        $this->assertClassHasAttribute('interest', 'LendInvest\Model\Tranche');
        $this->assertClassHasAttribute('maxAmount', 'LendInvest\Model\Tranche');
        $this->assertClassHasAttribute('investments', 'LendInvest\Model\Tranche');
        $this->assertClassHasAttribute('createdAt', 'LendInvest\Model\Tranche');
    }

    public function testTrancheDoesNotHaveInvestments()
    {
        $tranche = new Tranche;
        $this->assertFalse($tranche->hasInvestments());
    }


    public function testCanAddInvestmentToTranche()
    {
        $tranche = new Tranche;
        $investment = new Investment;

        $tranche->addInvestment($investment);
        $this->assertTrue($tranche->hasInvestments());

        $investments = $tranche->getInvestments();
        foreach ($investments as $investment) {
            $this->assertInstanceOf('LendInvest\Model\Investment', $investment);
        }
    }
}
