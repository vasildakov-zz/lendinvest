<?php
namespace LendInvest\DomainTest\Entity;

use LendInvest\Domain\Entity\Investment;
use LendInvest\Domain\Entity\Investor;
use LendInvest\Domain\Entity\Tranche;

use LendInvest\Domain\Type\Money;
use LendInvest\Domain\Type\Currency;

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
            new Money(100, new Currency('GBP'))
        );

        $this->assertInstanceOf(Investment::class, $investment);
    }

    /**
     * @test
     * @group domain
     */
    public function itHasRequiredProperties()
    {
        $this->assertClassHasAttribute('amount', Investment::class);
        $this->assertClassHasAttribute('investor', Investment::class);
        $this->assertClassHasAttribute('amount', Investment::class);
        $this->assertClassHasAttribute('createdAt', Investment::class);
    }
}
