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
    protected $id;
    protected $investor;
    protected $tranche;
    protected $amount;

    protected function setUp()
    {
        $this->id = $this->getMockBuilder(Type\Uuid::class)->disableOriginalConstructor()->getMock();

        $this->investor = $this->getMockBuilder(Entity\Investor::class)->disableOriginalConstructor()->getMock();

        $this->tranche = $this->getMockBuilder(Entity\Tranche::class)->disableOriginalConstructor()->getMock();

        $this->amount = $this->getMockBuilder(Type\Money::class)->disableOriginalConstructor()->getMock();
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

        $this->assertClassHasAttribute('createdAt', Entity\Investment::class);
    }
}
