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
        $this->id = $this->getMockWithoutInvokingTheOriginalConstructor(Type\Uuid::class);

        $this->loan = $this->getMockWithoutInvokingTheOriginalConstructor(Entity\Loan::class);

        $this->amount = $this->getMockWithoutInvokingTheOriginalConstructor(Type\Money::class);

        $this->interest = $this->getMockWithoutInvokingTheOriginalConstructor(Type\Interest::class);
    }


    /**
     * @test
     * @group domain
     */
    public function itCanBeConstructed()
    {
        $tranche = new Entity\Tranche($this->id,  $this->loan, $this->amount, $this->interest);

        $this->assertInstanceOf(Entity\Tranche::class, $tranche);

        $this->assertEquals($this->id, $tranche->getId());

        $this->assertEquals($this->loan, $tranche->getLoan());

        $this->assertEquals($this->amount, $tranche->getAmount());

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

        $this->assertClassHasAttribute('amount', Entity\Tranche::class);

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

        $tranche = new Entity\Tranche($this->id,  $this->loan, $this->amount, $this->interest);

        self::assertEquals(0.1875, $tranche->getDailyInterest());
    }
}
