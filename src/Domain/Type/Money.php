<?php
/**
 * This file is part of the vasildakov/lendinvest project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @copyright Copyright (c) Vasil Dakov <vasildakov@gmail.com>
 * @license http://opensource.org/licenses/MIT MIT
 * @link https://github.com/vasildakov/lendinvest GitHub
 */

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
    private $value;

    /**
     * @var Currency
     */
    private $currency;

    /**
     * Money constructor.
     * @param $value
     * @param $currency
     */
    public function __construct($value, $currency)
    {
        if (!is_int($value)) {
            throw new \InvalidArgumentException('$amount must be an integer');
        }
        $this->value   = $value;
        $this->currency = $this->handleCurrencyArgument($currency);
    }


    public function getValue()
    {
        return $this->value;
    }


    public function getCurrency()
    {
        return $this->currency;
    }


    public function add(MoneyInterface $other)
    {
        $this->assertSameCurrency($this, $other);
        $value = $this->value + $other->getValue();
        $this->assertIsInteger($value);
        return $this->newMoney($value);
    }


    public function subtract(MoneyInterface $other)
    {
        $this->assertSameCurrency($this, $other);
        $value = $this->value - $other->getValue();
        $this->assertIsInteger($value);
        return $this->newMoney($value);
    }


    private function newMoney($value)
    {
        return new static($value, $this->currency);
    }

    /**
     * @param MoneyInterface $a
     * @param MoneyInterface $b
     */
    private function assertSameCurrency(MoneyInterface $a, MoneyInterface $b)
    {
        if ($a->getCurrency() != $b->getCurrency()) {
            throw new CurrencyMismatchException;
        }
    }

    /**
     * @param $value
     */
    private function assertIsInteger($value)
    {
        if (!is_int($value)) {
            throw new OverflowException;
        }
    }

    /**
     * @codeCoverageIgnore
     */
    private static function handleCurrencyArgument($currency)
    {
        if (!$currency instanceof CurrencyInterface && !is_string($currency)) {
            throw new \InvalidArgumentException('$currency must be an object of type Currency or a string');
        }
        if (is_string($currency)) {
            $currency = new Currency($currency);
        }
        return $currency;
    }
}
