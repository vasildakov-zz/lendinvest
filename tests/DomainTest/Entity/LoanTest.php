<?php
namespace LendInvest\DomainTest\Entity;

use LendInvest\Domain\Entity\Loan;
use LendInvest\Domain\Entity\Tranche;

use LendInvest\Domain\Type\Uuid;
use LendInvest\Domain\Type\DateTime;

/**
 * LoanTest
 *
 * @package LendInvest
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class LoanTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @group domain
     */
    public function itHasRequiredProperties()
    {
        $this->assertClassHasAttribute('id', Loan::class);
        $this->assertClassHasAttribute('tranches', Loan::class);
        $this->assertClassHasAttribute('startDate', Loan::class);
        $this->assertClassHasAttribute('endDate', Loan::class);
    }

    /**
     * @test
     * @group domain
     */
    public function itCanBeConstructed()
    {
        $loan = new Loan(
            Uuid::uuid4(),
            new DateTime('2015', '10', '01'),
            new DateTime('2015', '10', '11')
        );

        $this->assertInstanceOf(Loan::class, $loan);
    }


    /**
     * @test
     * @group domain
     */
    public function aTrancheCanBeAddedToTheLoan()
    {
        $loan = new Loan(
            Uuid::uuid4(),
            new DateTime('2015', '10', '01'),
            new DateTime('2015', '10', '11')
        );

        $loan->addTranche(
            new Tranche(
                Uuid::uuid4()
            )
        );

        $loan->addTranche(
            new Tranche(
                Uuid::uuid4()
            )
        );

        $this->assertTrue($loan->hasTranches());
        $this->assertEquals(2, count($loan->getTranches()));
    }
}
