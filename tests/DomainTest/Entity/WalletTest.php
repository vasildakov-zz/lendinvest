<?php
namespace LendInvest\DomainTest\Entity;

use LendInvest\Domain\Type;
use LendInvest\Domain\Entity;

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
    protected $money;

    protected function setUp()
    {
        $this->id = $this->getMockWithoutInvokingTheOriginalConstructor(Type\Uuid::class);

        $this->investor = $this->getMockWithoutInvokingTheOriginalConstructor(Entity\Investor::class);

        $this->currency = $this->getMockWithoutInvokingTheOriginalConstructor(Type\Currency::class);

        $this->money = $this->getMockWithoutInvokingTheOriginalConstructor(Type\Money::class);
    }

    /**
     * @test
     * @group domain
     */
    public function itCanBeConstructed()
    {
        $wallet = new Entity\Wallet($this->id, $this->investor, $this->currency);

        $this->assertInstanceOf(Entity\Wallet::class, $wallet);

        $this->assertEquals($this->id, $wallet->getId());

        $this->assertEquals($this->investor, $wallet->getInvestor());

        $this->assertEquals($this->currency, $wallet->getCurrency());
    }

    /**
     * @test
     * @group domain
     */
    public function itHasRequiredProperties()
    {
        $this->assertClassHasAttribute('id', Entity\Wallet::class);

        $this->assertClassHasAttribute('investor', Entity\Wallet::class);

        $this->assertClassHasAttribute('balance', Entity\Wallet::class);
    }

    /**
     * @test
     * @group domain
     */
    public function itCanDepositMoney()
    {
        $wallet = new Entity\Wallet($this->id, $this->investor, new Type\Currency('GBP'));

        $money = new Type\Money(120, 'GBP');

        $wallet->deposit($money);

        self::assertEquals(120, $wallet->getBalance()->getAmount());

        self::assertEquals('GBP', $wallet->getBalance()->getCurrency()->getCode());
    }

    /**
     * @test
     * @group domain
     */
    public function itCanWithdrawMoney()
    {
        $wallet = new Entity\Wallet($this->id, $this->investor, new Type\Currency('GBP'));

        $wallet->deposit(new Type\Money(100, 'GBP'));

        $wallet->withdraw(new Type\Money(70, 'GBP'));

        self::assertEquals(30, $wallet->getBalance()->getAmount());

        self::assertEquals('GBP', $wallet->getBalance()->getCurrency()->getCode());
    }
}
