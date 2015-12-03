<?php
namespace LendInvest\Model;

use LendInvest\Model\Wallet;

/**
 * Investor
 *
 * @package LendInvest
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class Investor extends User implements EntityInterface
{
    /**
     * @var \Lendinvest\Model\Wallet $wallet
     */
    private $wallet;


    public function __construct()
    {
        //
    }

    public function setWallet(Wallet $wallet)
    {
        $this->wallet = $wallet;

        return $this;
    }

    public function getWallet()
    {
        return $this->wallet;
    }


    public function hasWallet()
    {
        return $this->wallet instanceof Wallet;
    }
}
