<?php
namespace LendInvest\DomainTest\Entity;

use LendInvest\Domain\Entity;
use LendInvest\Domain\Type;

/**
 * InvestmentTest
 *
 * @package LendInvest
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class InvestmentTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \PHPUnit_Framework_MockObject_MockObject|Type\Uuid
     */
    protected $id;

    /**
     * @var \PHPUnit_Framework_MockObject_MockObject|Entity\Investo
     */
    protected $investor;

    /**
     * @var \PHPUnit_Framework_MockObject_MockObject|Entity\Tranche
     */
    protected $tranche;

    /**
     * @var \PHPUnit_Framework_MockObject_MockObject|Entity\LoanInterface
     */
    protected $loan;

    /**
     * @var \PHPUnit_Framework_MockObject_MockObject|Type\Money
     */
    protected $amount;


    protected function setUp()
    {
        /** @var \PHPUnit_Framework_MockObject_MockObject|Type\UuidInterface $id */
        $this->id = $this->getMockForAbstractClass(Type\UuidInterface::class);

        /** @var \PHPUnit_Framework_MockObject_MockObject|Entity\InvestorInterface $investor */
        $this->investor = $this->getMockForAbstractClass(Entity\InvestorInterface::class);

        /** @var \PHPUnit_Framework_MockObject_MockObject|Entity\TrancheInterface $tranche */
        $this->tranche = $this->getMockForAbstractClass(Entity\TrancheInterface::class);

        /** @var \PHPUnit_Framework_MockObject_MockObject|Type\MoneyInterface $amount */
        $this->amount = $this->getMockForAbstractClass(Type\MoneyInterface::class);

        /** @var \PHPUnit_Framework_MockObject_MockObject|\DateTime $madeAt */
        $this->madeAt = $this->getMockBuilder(\DateTime::class)->getMock();

        /** @var \PHPUnit_Framework_MockObject_MockObject|Type\LoanInterface $loan */
        $this->loan = $this->getMockForAbstractClass(Entity\LoanInterface::class);
    }

    /**
     * @test
     * @group domain
     */
    public function itCanBeConstructed()
    {
        $investment = new Entity\Investment($this->id, $this->investor, $this->tranche, $this->amount);

        $this->assertInstanceOf(Entity\Investment::class, $investment);
        $this->assertEquals($this->id, $investment->getId());
        $this->assertEquals($this->investor, $investment->getInvestor());
        $this->assertEquals($this->tranche, $investment->getTranche());
        $this->assertEquals($this->amount, $investment->getAmount());
        $this->assertInstanceOf(\DateTime::class, $investment->getMadeAt());
    }

    /**
     * @test
     * @group domain
     */
    public function itHasRequiredProperties()
    {
        $this->assertClassHasAttribute('id', Entity\Investment::class);
        $this->assertClassHasAttribute('amount', Entity\Investment::class);
        $this->assertClassHasAttribute('investor', Entity\Investment::class);
        $this->assertClassHasAttribute('amount', Entity\Investment::class);
        $this->assertClassHasAttribute('madeAt', Entity\Investment::class);
    }
}
