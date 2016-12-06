<?php
namespace LendInvest\DomainTest;

use LendInvest\Domain\Entity\Investment;
use LendInvest\Domain\Entity\Investor;
use LendInvest\Domain\Entity\Tranche;

use LendInvest\Domain\Type\Money;

/**
 * InvestmentTest
 *
 * @package LendInvest
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class InvestmentTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @group domain
     */
    public function itCanBeConstructed()
    {
        $investment = new Investment(
            new Investor(),
            new Tranche(),
            new Money(100)
        );

        $this->assertInstanceOf(Investment::class, $investment);
    }

    public function testTrancheProperties()
    {
        $this->assertClassHasAttribute('amount', 'LendInvest\Model\Investment');
        $this->assertClassHasAttribute('investor', 'LendInvest\Model\Investment');
        $this->assertClassHasAttribute('createdAt', 'LendInvest\Model\Investment');
    }
}
