<?php
namespace LendInvest\DomainTest\Entity;

use LendInvest\Domain\Entity\Wallet;

/**
 * WalletTest
 *
 * @package LendInvest
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class WalletTest extends \PHPUnit_Framework_TestCase
{
    public function testWalletInstance()
    {
        $this->assertInstanceOf('LendInvest\Model\Wallet', new Wallet);
    }

    public function testWalletProperties()
    {
        $this->assertClassHasAttribute('balance', 'LendInvest\Model\Wallet');
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
