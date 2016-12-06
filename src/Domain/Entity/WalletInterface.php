<?php
namespace LendInvest\Domain\Entity;

use Lendinvest\Domain\Type\Uuid;
use Lendinvest\Domain\Type\Money;
use Lendinvest\Domain\Type\Currency;
use Lendinvest\Domain\Entity\Investor;

/**
 * Interface WalletInterface
 *
 * @package LendInvest
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
interface WalletInterface
{
    /**
     * @return Uuid
     */
    public function getId() : Uuid;

    /**
     * @return Investor
     */
    public function getInvestor() : Investor;

    /**
     * @return Currency
     */
    public function getCurrency() : Currency;

    /**
     * @param Money
     */
    public function deposit(Money $amount);

    /**
     * @param Money
     */
    public function withdraw(Money $amount);

    /**
     * @return Money
     */
    public function getBalance() : Money;
}
