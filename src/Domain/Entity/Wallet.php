<?php
namespace LendInvest\Domain\Entity;

use LendInvest\Domain\Entity\Investor;
use LendInvest\Domain\Type\Currency;
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
     * @var \Lendinvest\Domain\Entity\Investor $investor
     */
    private $investor;

    /**
     * @var \LendInvest\Domain\Type\Currency $currency
     */
    private $currency;

    /**
     * @var \LendInvest\Domain\Type\Money $balance
     */
    private $balance;


    /**
     * @param Uuid     $id
     * @param Investor $investor
     * @param Currency $currency
     */
    public function __construct(Uuid $id, Investor $investor, Currency $currency)
    {
        $this->setId($id);
        $this->setInvestor($investor);
        $this->setCurrency($currency);

        $this->setBalance(new Money(0, $currency));
    }

    /**
     * @param Uuid $id
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


    private function setBalance(Money $balance)
    {
        $this->balance = $balance;
    }


    public function getBalance() : Money
    {
        return $this->balance;
    }
}
