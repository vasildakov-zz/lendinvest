<?php
namespace LendInvest\Domain\Entity;

/**
 * Wallet
 *
 * @package Lendinvest
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
final class Wallet implements WalletInterface
{
    /**
     * @var integer $balance
     */
    private $balance = 0;


    public function __construct()
    {
        //
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
