<?php
namespace LendInvest\DomainTest\Entity;

use LendInvest\Domain\Entity\Loan;
use LendInvest\Domain\Entity\Investor;
use LendInvest\Domain\Entity\Tranche;
use LendInvest\Domain\Entity\Investment;

use LendInvest\Domain\Type\Uuid;
use LendInvest\Domain\Type\Interest;
use LendInvest\Domain\Type\DateTime;
use LendInvest\Domain\Type\Money;

/**
 * TrancheTest
 *
 * @package LendInvest
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class TrancheTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @group domain
     */
    public function itCanBeConstructed()
    {
        $tranche = new Tranche(Uuid::uuid4());

        $this->assertInstanceOf(Tranche::class, $tranche);
    }

    /**
     * @test
     * @group domain
     */
    public function itHasRequiredProperties()
    {
        $this->assertClassHasAttribute('id', Tranche::class);
        $this->assertClassHasAttribute('loan', Tranche::class);
        $this->assertClassHasAttribute('interest', Tranche::class);
        $this->assertClassHasAttribute('maxAmount', Tranche::class);
        $this->assertClassHasAttribute('investments', Tranche::class);
        $this->assertClassHasAttribute('createdAt', Tranche::class);
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

    public function testGetCurrentAmount()
    {
        $tranche = new Tranche;
        $tranche->setMaxAmount(1000);

        $this->assertEquals(0, $tranche->getCurrentAmount());

        $investment = new Investment();
        $investment->setInvestor(new Investor());
        $investment->setAmount(600);

        $tranche->addInvestment($investment);

        $this->assertEquals(600, $tranche->getCurrentAmount());
    }

    /**
     * @expectedException RuntimeException
     */
    public function testAddingInvestmentThrowsAnExeptionWhenMaxAmountExceeded()
    {
        $tranche = new Tranche;
        $tranche->setMaxAmount(1000);

        $investment = new Investment();
        $investment->setInvestor(new Investor());
        $investment->setAmount(1500);

        $tranche->addInvestment($investment);
    }


    public function testGetNumberOfDays()
    {
        $loan = new Loan;
        $loan->setStartDate(new \DateTime("2015-10-01"));
        $loan->setEndDate(new \DateTime("2015-10-31"));
        $this->assertEquals(31, $loan->getNumberOfDays());
    }


    public function testTrancheInterestRate()
    {
        $loan = new Loan;
        $loan->setStartDate(new \DateTime("2015-10-01"));
        $loan->setEndDate(new \DateTime("2015-10-31"));

        $percentage = 6;

        $tranche = new Tranche;
        $tranche->setLoan($loan);
        $tranche->setInterest(new Interest($percentage));
        $tranche->setMaxAmount(1000);


        $interest = $tranche->getInterest();
        $this->assertInstanceOf('LendInvest\Model\Interest', $interest);
        $this->assertEquals($percentage, $interest->getPercentage());

        $this->assertEquals(0.19, $tranche->getDailyInterestRate());
    }
}
