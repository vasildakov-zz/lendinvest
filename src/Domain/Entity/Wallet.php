<?php
namespace LendInvest\Domain\Entity;

use LendInvest\Domain\Entity\Investor;
use LendInvest\Domain\Type\Currency;
use LendInvest\Domain\Type\Uuid;

/**
 * Wallet
 *
 * @package LendInvest
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
final class Wallet implements WalletInterface
{
    private $id;

    private $investor;

    private $currency;

    /**
     * @var integer $balance
     */
    private $balance = 0;


    public function __construct(Uuid $id, Investor $investor, Currency $currency)
    {
        $this->id = $id;
        $this->investor = $investor;
        $this->currency = $currency;
    }


    public function depositMoney($amount)
    {
        $this->setBalance($this->getBalance() + $amount);

        return $this->getBalance();
    }


    public function withdrawMoney($amount)
    {
        $this->setBalance($this->getBalance() - $amount);

        return $this->getBalance();
    }


    public function setBalance($balance)
    {
        if ($balance < 0) {
            throw new \RuntimeException;
        }
        $this->balance = $balance;
    }


    public function getBalance()
    {
        return $this->balance;
    }
}
