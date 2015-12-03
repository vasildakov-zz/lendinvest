<?php
namespace LendInvest\ModelTest;

use LendInvest\Model\Loan;

/**
 * LoanTest
 *
 * @package LendInvest
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class LoanTest extends \PHPUnit_Framework_TestCase
{
    public function testTrancheInstance()
    {
        $this->assertInstanceOf('LendInvest\Model\Loan', new Loan);
    }

    public function testTrancheProperties()
    {
        $this->assertClassHasAttribute('tranches', 'LendInvest\Model\Loan');
        $this->assertClassHasAttribute('startDate', 'LendInvest\Model\Loan');
        $this->assertClassHasAttribute('endDate', 'LendInvest\Model\Loan');
    }
}
