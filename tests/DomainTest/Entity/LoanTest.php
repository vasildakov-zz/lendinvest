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
class LoanTest extends \PHPUnit_Framework_TestCase
{
    protected $id;
    protected $tranche;
    protected $start;
    protected $end;

    protected function setUp()
    {
        $this->id = $this->getMockWithoutInvokingTheOriginalConstructor(Type\Uuid::class);

        $this->tranche = $this->getMockWithoutInvokingTheOriginalConstructor(Entity\Tranche::class);

        $this->start = $this->getMockWithoutInvokingTheOriginalConstructor(Type\DateTime::class);

        $this->end = $this->getMockWithoutInvokingTheOriginalConstructor(Type\DateTime::class);
    }

    /**
     * @test
     * @group domain
     */
    public function itHasRequiredProperties()
    {
        $this->assertClassHasAttribute('id', Entity\Loan::class);
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
        $loan = new Entity\Loan($this->id, $this->start, $this->end);

        $this->assertInstanceOf(Entity\Loan::class, $loan);
    }


    /**
     * @test
     * @group domain
     */
    public function aTrancheCanBeAddedToTheLoan()
    {
        $loan = new Entity\Loan($this->id, $this->start, $this->end);

        $loan->addTranche($this->tranche);

        $this->assertTrue($loan->hasTranches());
        $this->assertEquals(1, count($loan->getTranches()));
    }
}
