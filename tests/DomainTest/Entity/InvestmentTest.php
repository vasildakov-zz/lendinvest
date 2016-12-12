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
class InvestmentTest extends \PHPUnit_Framework_TestCase
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
     * @var \PHPUnit_Framework_MockObject_MockObject|Type\Money
     */
    protected $amount;


    protected function setUp()
    {
        /** @var \PHPUnit_Framework_MockObject_MockObject|Type\Uuid $id */
        $this->id = $this->getMockBuilder(Type\Uuid::class)
            ->disableOriginalConstructor()
            ->getMock()
        ;

        /** @var \PHPUnit_Framework_MockObject_MockObject|Entity\Investor $investor */
        $this->investor = $this->getMockBuilder(Entity\Investor::class)
            ->disableOriginalConstructor()
            ->getMock()
        ;

        /** @var \PHPUnit_Framework_MockObject_MockObject|Entity\Tranche $tranche */
        $this->tranche = $this->getMockBuilder(Entity\Tranche::class)
            ->disableOriginalConstructor()
            ->getMock()
        ;

        /** @var \PHPUnit_Framework_MockObject_MockObject|Type\Money $amount */
        $this->amount = $this->getMockBuilder(Type\Money::class)
            ->disableOriginalConstructor()
            ->getMock()
        ;

        /** @var \PHPUnit_Framework_MockObject_MockObject|Type\DateTime $madeAt */
        $this->madeAt = $this->getMockBuilder(Type\DateTime::class)
            ->disableOriginalConstructor()
            ->getMock()
        ;
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

        $this->assertInstanceOf(Type\DateTime::class, $investment->getMadeAt());
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
