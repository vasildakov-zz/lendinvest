<?php
namespace LendInvest\Domain\Entity;

use LendInvest\Domain\Entity\Wallet;

/**
 * Investor
 *
 * @package LendInvest
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
final class Investor implements InvestorInterface
{
    private $name;

    private $surname;

    private $email;

    private $address;

    /**
     * @var \Lendinvest\Model\Wallet $wallet
     */
    private $wallets;


    public function __construct()
    {
        $this->wallets = [];
    }


    /**
     * @param Wallet $wallet
     */
    public function addWallet(Wallet $wallet)
    {
        $this->wallets[] = $wallet;

        return $this;
    }

    /**
     * @param Wallets[]
     */
    public function getWallets()
    {
        return $this->wallets;
    }
}
