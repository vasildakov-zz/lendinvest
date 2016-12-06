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
    /**
     * @var \Lendinvest\Model\Wallet $wallet
     */
    private $wallets;


    public function __construct()
    {
        $this->wallets = [];
    }


    public function addWallet(Wallet $wallet)
    {
        $this->wallets[] = $wallet;

        return $this;
    }


    public function hasWallet()
    {
        return !empty($this->wallets);
    }
}
