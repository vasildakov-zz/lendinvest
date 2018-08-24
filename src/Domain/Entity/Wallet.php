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

declare(strict_types=1);

namespace LendInvest\Domain\Entity;

use LendInvest\Domain\Entity\Investor;
use LendInvest\Domain\Type\Currency;
use LendInvest\Domain\Type\CurrencyInterface;
use LendInvest\Domain\Type\Money;
use LendInvest\Domain\Type\Uuid;

/**
 * Wallet
 *
 * @package LendInvest
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class Wallet implements WalletInterface
{
    /**
     * @var Uuid $id
     */
    private $id;

    /**
     * @var Investor $investor
     */
    private $investor;

    /**
     * @var Currency $currency
     */
    private $currency;

    /**
     * @var Money $balance
     */
    private $balance;


    /**
     * @param Uuid     $id
     * @param InvestorInterface $investor
     * @param CurrencyInterface $currency
     */
    public function __construct(Uuid $id, InvestorInterface $investor, CurrencyInterface $currency)
    {
        $this->setId($id);
        $this->setInvestor($investor);
        $this->setCurrency($currency);
        $this->setBalance(new Money(0, $currency));
    }

    /**
     * @param Uuid $id
     * @return Wallet
     */
    private function setId(Uuid $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return Uuid $id
     */
    public function getId() : Uuid
    {
        return $this->id;
    }

    /**
     * @param Investor $investor
     * @return Wallet
     */
    private function setInvestor(Investor $investor)
    {
        $this->investor = $investor;

        return $this;
    }

    /**
     * @return Investor $investor
     */
    public function getInvestor() : Investor
    {
        return $this->investor;
    }

    /**
     * @param Currency $currency
     * @return Wallet
     */
    private function setCurrency(Currency $currency)
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * @return Currency $currency
     */
    public function getCurrency() : Currency
    {
        return $this->currency;
    }

    /**
     * @param Money $money
     */
    public function deposit(Money $money)
    {
        $this->balance = $this->balance->add($money);
    }


    /**
     * @param Money $money
     */
    public function withdraw(Money $money)
    {
        $this->balance = $this->balance->subtract($money);
    }

    /**
     * @param Money $balance
     */
    private function setBalance(Money $balance)
    {
        $this->balance = $balance;
    }

    /**
     * @return Money
     */
    public function getBalance() : Money
    {
        return $this->balance;
    }
}
