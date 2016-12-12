<?php
namespace LendInvest\Domain\Entity;

use LendInvest\Domain\Entity\Tranche;
use LendInvest\Domain\Type\Uuid;
use LendInvest\Domain\Type\Currency;

/**
 * Interface LoanInterface
 *
 * @package LendInvest
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
interface LoanInterface
{
    /**
     * @return Uuid
     */
    public function getId() : Uuid;

    /**
     * @return Currency
     */
    public function getCurrency() : Currency;

    /**
     * @param Tranche $tranche
     * @return void
     */
    public function addTranche(Tranche $tranche);
}
