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
use LendInvest\Domain\Type\MoneyInterface;
use LendInvest\Domain\Type\Uuid;
use LendInvest\Domain\Type\UuidInterface;

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
     * @var InvestorInterface $investor
     */
    private $investor;

    /**
     * @var CurrencyInterface $currency
     */
    private $currency;

    /**
     * @var MoneyInterface $balance
     */
    private $balance;


    /**
     * @param UuidInterface     $id
     * @param InvestorInterface $investor
     * @param CurrencyInterface $currency
     */
    public function __construct(
        UuidInterface $id,
        InvestorInterface $investor,
        CurrencyInterface $currency
    ) {
        $this->setId($id);
        $this->setInvestor($investor);
        $this->setCurrency($currency);
        $this->setBalance(new Money(0, $currency));
    }

    /**
     * @param UuidInterface $id
     * @return Wallet
     */
    private function setId(UuidInterface $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return Uuid $id
     */
    public function getId() : UuidInterface
    {
        return $this->id;
    }

    /**
     * @param InvestorInterface $investor
     * @return Wallet
     */
    private function setInvestor(InvestorInterface $investor)
    {
        $this->investor = $investor;

        return $this;
    }

    /**
     * @return InvestorInterface $investor
     */
    public function getInvestor() : InvestorInterface
    {
        return $this->investor;
    }

    /**
     * @param CurrencyInterface $currency
     * @return Wallet
     */
    private function setCurrency(CurrencyInterface $currency)
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * @return CurrencyInterface $currency
     */
    public function getCurrency() : CurrencyInterface
    {
        return $this->currency;
    }

    /**
     * @param MoneyInterface $money
     */
    public function deposit(MoneyInterface $money)
    {
        $this->balance = $this->balance->add($money);
    }


    /**
     * @param MoneyInterface $money
     */
    public function withdraw(MoneyInterface $money)
    {
        $this->balance = $this->balance->subtract($money);
    }

    /**
     * @param MoneyInterface $balance
     */
    private function setBalance(MoneyInterface $balance)
    {
        $this->balance = $balance;
    }

    /**
     * @return MoneyInterface
     */
    public function getBalance() : MoneyInterface
    {
        return $this->balance;
    }
}
