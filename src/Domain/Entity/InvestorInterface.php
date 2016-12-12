<?php
namespace LendInvest\Domain\Entity;

use LendInvest\Domain\Type\Uuid;
use LendInvest\Domain\Entity\Wallet;

/**
 * Interface InvestorInterface
 *
 * @package LendInvest
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
interface InvestorInterface
{
    /**
     * @return Uuid
     */
    public function getId() : Uuid;

    /**
     * @return Wallet
     */
    public function addWallet(Wallet $wallet);

    /**
     * @return Wallet[]
     */
    public function getWallets();
}
