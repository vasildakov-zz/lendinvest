<?php
namespace LendInvest\Domain\Entity;

use LendInvest\Domain\Entity\Investor;
use LendInvest\Domain\Entity\Tranche;
use LendInvest\Domain\Type\Money;
use LendInvest\Domain\Type\Uuid;

/**
 * Interface InvestmentInterface
 *
 * @package LendInvest
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
interface InvestmentInterface
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
     * @return Tranche
     */
    public function getTranche() : Tranche;

    /**
     * @return Money
     */
    public function getAmount() : Money;
}
