<?php

namespace LendInvest\DomainTest\Entity;

use LendInvest\Domain\Entity;
use LendInvest\Domain\Type;

/**
 * LoanTest
 *
 * @package LendInvest
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class LoanTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \PHPUnit_Framework_MockObject_MockObject|Type\Uuid
     */
    protected $id;

    /**
     * @var \PHPUnit_Framework_MockObject_MockObject|Type\CurrencyInterface
     */
    protected $currency;

    /**
     * @var \PHPUnit_Framework_MockObject_MockObject|Entity\TrancheInterface
     */
    protected $tranche;

    /**
     * @var \PHPUnit_Framework_MockObject_MockObject|Type\DateTime
     */
    protected $start;

    /**
     * @var \PHPUnit_Framework_MockObject_MockObject|Type\DateTime
     */
    protected $end;

    protected function setUp()
    {
        $this->id = $this->getMockForAbstractClass(Type\UuidInterface::class);

        $this->currency = $this->getMockForAbstractClass(Type\CurrencyInterface::class);

        $this->tranche = $this->getMockForAbstractClass(Entity\TrancheInterface::class);

        $this->start = $this->getMockBuilder(\DateTime::class)->disableOriginalConstructor()->getMock();

        $this->end = $this->getMockBuilder(\DateTime::class)->disableOriginalConstructor()->getMock();
    }

    /**
     * @test
     * @group domain
     */
    public function itHasRequiredProperties()
    {
        $this->assertClassHasAttribute('id', Entity\Loan::class);
        $this->assertClassHasAttribute('currency', Entity\Loan::class);
        $this->assertClassHasAttribute('tranches', Entity\Loan::class);
        $this->assertClassHasAttribute('startDate', Entity\Loan::class);
        $this->assertClassHasAttribute('endDate', Entity\Loan::class);
    }

    /**
     * @test
     * @group domain
     */
    public function itCanBeConstructed()
    {
        $loan = new Entity\Loan($this->id, $this->currency, $this->start, $this->end);

        $this->assertInstanceOf(Entity\LoanInterface::class, $loan);

        /* $this->assertEquals($this->id, $loan->getId());

        $this->assertEquals($this->currency, $loan->getCurrency());

        $this->assertEquals($this->start, $loan->getStartDate());

        $this->assertEquals($this->end, $loan->getEndDate()); */
    }


    /**
     * @test
     * @group domain
     */
    public function aTrancheCanBeAddedToTheLoan()
    {
        $loan = new Entity\Loan($this->id, $this->currency, $this->start, $this->end);

        $loan->addTranche($this->tranche);
        $this->assertTrue($loan->hasTranches());
        $this->assertEquals(1, count($loan->getTranches()));
    }

    /**
     * @test
     * @group domain
     */
    public function itReturnsTheIntervalBetweenStartingAndEndingDate()
    {
        $start = new \DateTime('2015-10-01');
        $end   = new \DateTime('2015-11-15');

        $loan = new Entity\Loan($this->id, $this->currency, $start, $end);

        $this->assertEquals(45, $loan->getNumberOfDays());
    }
}
