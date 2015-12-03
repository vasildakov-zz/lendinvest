<?php
namespace LendInvest\ModelTest;

use LendInvest\Model\Loan;
use LendInvest\Model\Tranche;

/**
 * LoanTest
 *
 * @package LendInvest
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class LoanTest extends \PHPUnit_Framework_TestCase
{
    public function testLoanInstance()
    {
        $this->assertInstanceOf('LendInvest\Model\Loan', new Loan);
    }

    public function testLoanProperties()
    {
        $this->assertClassHasAttribute('tranches', 'LendInvest\Model\Loan');
        $this->assertClassHasAttribute('startDate', 'LendInvest\Model\Loan');
        $this->assertClassHasAttribute('endDate', 'LendInvest\Model\Loan');
    }

    public function testTranchesCanBeAddedToLoan()
    {
        $loan = new Loan();

        $this->assertFalse($loan->hasTranches());

        $loan->addTranche(new Tranche());
        $loan->addTranche(new Tranche());
        $loan->addTranche(new Tranche());

        $this->assertTrue($loan->hasTranches());
        $this->assertEquals(3, count($loan->getTranches()));
    }
}
