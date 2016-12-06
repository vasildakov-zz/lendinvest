<?php
namespace LendInvest\DomainTest\Entity;

use LendInvest\Domain\Type\Uuid;
use LendInvest\Domain\Type\Currency;

use LendInvest\Domain\Entity\Investor;
use LendInvest\Domain\Entity\Wallet;

/**
 * WalletTest
 *
 * @package LendInvest
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class WalletTest extends \PHPUnit_Framework_TestCase
{
    protected $id;
    protected $investor;
    protected $currency;

    protected function setUp()
    {
        $this->id = Uuid::uuid4();
        $this->investor = new Investor(Uuid::uuid4());
        $this->currency = new Currency('GBP');
    }

    /**
     * @test
     * @group domain
     */
    public function itCanBeConstructed()
    {
        $wallet = new Wallet($this->id, $this->investor, $this->currency);

        $this->assertInstanceOf(Wallet::class, $wallet);
    }

    /**
     * @test
     * @group domain
     */
    public function itHasRequiredProperties()
    {
        $this->assertClassHasAttribute('id', Wallet::class);
        $this->assertClassHasAttribute('investor', Wallet::class);
        $this->assertClassHasAttribute('balance', Wallet::class);
    }



    public function testInitialWalletBalanceIsZero()
    {
        $wallet = new Wallet;
        $this->assertEquals(0, $wallet->getBalance());
    }


    public function testCanDepositMoney()
    {
        $amount = 1000;

        $wallet = new Wallet;
        $wallet->depositMoney($amount);
        $this->assertEquals($amount, $wallet->getBalance());
    }


    public function testCanWithdrawMoney()
    {
        $amount = 1000;

        $wallet = new Wallet;
        $wallet->depositMoney($amount);
        $this->assertEquals($amount, $wallet->getBalance());

        $wallet->withdrawMoney(300);
        $this->assertEquals(700, $wallet->getBalance());
    }

    /**
     * @expectedException RuntimeException
     */
    public function testWithdrawMoneyThrowsAnExpeptionOnNegativeBalance()
    {
        $amount = 300;

        $wallet = new Wallet;
        $wallet->depositMoney($amount);
        $this->assertEquals($amount, $wallet->getBalance());

        $wallet->withdrawMoney(500);
    }
}
