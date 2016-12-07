<?php
namespace LendInvest\DomainTest\Entity;

use LendInvest\Domain\Entity;
use LendInvest\Domain\Type;

/**
 * TrancheTest
 *
 * @package LendInvest
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class TrancheTest extends \PHPUnit_Framework_TestCase
{
    protected $id;
    protected $loan;
    protected $amount;
    protected $interest;


    protected function setUp()
    {
        $this->id = $this->getMockBuilder(Type\Uuid::class)->disableOriginalConstructor()->getMock();

        $this->loan = $this->getMockBuilder(Entity\Loan::class)->disableOriginalConstructor()->getMock();

        $this->available = $this->getMockBuilder(Type\Money::class)->disableOriginalConstructor()->getMock();

        $this->interest = $this->getMockBuilder(Type\Interest::class)->disableOriginalConstructor()->getMock();
    }


    /**
     * @test
     * @group domain
     */
    public function itCanBeConstructed()
    {
        $tranche = new Entity\Tranche($this->id, $this->loan, $this->available, $this->interest);

        $this->assertInstanceOf(Entity\Tranche::class, $tranche);

        $this->assertEquals($this->id, $tranche->getId());

        $this->assertEquals($this->loan, $tranche->getLoan());

        $this->assertEquals($this->available, $tranche->getAvailable());

        $this->assertEquals($this->interest, $tranche->getInterest());
    }

    /**
     * @test
     * @group domain
     */
    public function itHasRequiredProperties()
    {
        $this->assertClassHasAttribute('id', Entity\Tranche::class);

        $this->assertClassHasAttribute('loan', Entity\Tranche::class);

        $this->assertClassHasAttribute('interest', Entity\Tranche::class);

        $this->assertClassHasAttribute('available', Entity\Tranche::class);

        $this->assertClassHasAttribute('investments', Entity\Tranche::class);

        $this->assertClassHasAttribute('createdAt', Entity\Tranche::class);
    }

    /**
     * @test
     * @group domain
     */
    public function itCanReturnDailyInterest()
    {

        $this->loan
             ->expects($this->once())
             ->method('getNumberOfDays')
             ->willReturn(32)
        ;

        $this->interest
             ->expects($this->once())
             ->method('getValue')
             ->willReturn(6)
        ;

        $tranche = new Entity\Tranche($this->id, $this->loan, $this->available, $this->interest);

        self::assertEquals(0.1875, $tranche->getDailyInterest());
    }
}
