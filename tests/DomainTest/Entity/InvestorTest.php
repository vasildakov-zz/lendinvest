<?php
namespace LendInvest\DomainTest\Entity;

use LendInvest\Domain\Entity\Investor;
use LendInvest\Domain\Entity\Wallet;

use LendInvest\Domain\Type\Currency;
use LendInvest\Domain\Type\Uuid;

/**
 * InvestorTest
 *
 * @package LendInvest
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class InvestorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @group domain
     */
    public function itCanBeConstructed()
    {
        $investor = new Investor(
            Uuid::uuid4()
        );

        $this->assertInstanceOf(Investor::class, $investor);
    }


    /**
     * @test
     * @group domain
     */
    public function itHasRequiredProperties()
    {
        $this->assertClassHasAttribute('name', Investor::class);
        $this->assertClassHasAttribute('surname', Investor::class);
        $this->assertClassHasAttribute('email', Investor::class);
        $this->assertClassHasAttribute('address', Investor::class);
        $this->assertClassHasAttribute('wallets', Investor::class);
    }

    /**
     * @test
     * @group domain
     */
    public function itCanAddWalletsWithDifferentCurrencies()
    {
        $investor = new Investor(
            Uuid::uuid4()
        );

        $investor->addWallet(
            new Wallet(
                new Currency('GBP')
            )
        );

        $investor->addWallet(
            new Wallet(
                new Currency('EUR')
            )
        );

        $this->assertEquals(2, count($investor->getWallets()));
    }
}
