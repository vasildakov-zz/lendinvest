<?php
namespace LendInvest\Domain\Entity;

use LendInvest\Domain\Entity\Tranche;

/**
 * Interface LoanInterface
 *
 * @package LendInvest
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
interface LoanInterface
{
    /**
     * @param Tranche $tranche
     * @return void
     */
    public function addTranche(Tranche $tranche);
}
