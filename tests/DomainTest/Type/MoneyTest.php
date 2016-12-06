<?php
namespace LendInvest\DomainTest\Type;

use LendInvest\Domain\Type\Money;
use LendInvest\Domain\Type\Currency;

/**
 * MoneyTest
 *
 * @package LendInvest
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class MoneyTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @group domain
     */
    public function itCanBeConstructedWithCurrencyCode()
    {
        $money = new Money(100, 'GBP');

        $this->assertInstanceOf(Money::class, $money);

        $this->assertEquals(100, $money->getAmount());

        $this->assertEquals('GBP', $money->getCurrency()->getCode());
    }

    /**
     * @test
     * @group domain
     */
    public function itCanBeConstructedWithCurrencyObject()
    {
        $money = new Money(100, new Currency('GBP'));

        $this->assertInstanceOf(Money::class, $money);
    }

    /**
     * @test
     * @group domain
     * @expectedException \InvalidArgumentException
     */
    public function itCanThrowAnException()
    {
        $money = new Money('100', new Currency('GBP'));
    }


    /**
     * @test
     * @group domain
     */
    public function itCanAddMoneyWithSameCurrency()
    {
        $money = new Money(100, new Currency('GBP'));

        $money = $money->add(new Money(20, new Currency('GBP')));

        $this->assertEquals(120, $money->getAmount());
    }

    /**
     * @test
     * @group domain
     */
    public function itCanSubstractMoneyWithSameCurrency()
    {
        $money = new Money(150, new Currency('GBP'));

        $money = $money->subtract(new Money(40, new Currency('GBP')));

        $this->assertEquals(110, $money->getAmount());
    }
}
