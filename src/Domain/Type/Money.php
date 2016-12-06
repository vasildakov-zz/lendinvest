<?php
namespace LendInvest\Domain\Type;

/**
 * Class Money
 *
 * @package LendInvest
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class Money implements MoneyInterface
{
    /**
     * @var integer
     */
    private $amount;

    /**
     * @var Currency
     */
    private $currency;


    public function __construct($amount, $currency)
    {
        if (!is_int($amount)) {
            throw new \InvalidArgumentException('$amount must be an integer');
        }
        $this->amount   = $amount;
        $this->currency = $this->handleCurrencyArgument($currency);
    }


    public function getAmount()
    {
        return $this->amount;
    }


    public function getCurrency()
    {
        return $this->currency;
    }


    public function add(MoneyInterface $other)
    {
        $this->assertSameCurrency($this, $other);
        $value = $this->amount + $other->getAmount();
        $this->assertIsInteger($value);
        return $this->newMoney($value);
    }


    public function subtract(MoneyInterface $other)
    {
        $this->assertSameCurrency($this, $other);
        $value = $this->amount - $other->getAmount();
        $this->assertIsInteger($value);
        return $this->newMoney($value);
    }


    private function newMoney($amount)
    {
        return new static($amount, $this->currency);
    }


    private function assertSameCurrency(MoneyInterface $a, MoneyInterface $b)
    {
        if ($a->getCurrency() != $b->getCurrency()) {
            throw new CurrencyMismatchException;
        }
    }


    private function assertIsInteger($amount)
    {
        if (!is_int($amount)) {
            throw new OverflowException;
        }
    }


    private static function handleCurrencyArgument($currency)
    {
        if (!$currency instanceof Currency && !is_string($currency)) {
            throw new \InvalidArgumentException('$currency must be an object of type Currency or a string');
        }
        if (is_string($currency)) {
            $currency = new Currency($currency);
        }
        return $currency;
    }
}
