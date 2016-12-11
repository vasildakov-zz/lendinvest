<?php
namespace LendInvest\Domain\Repository;

use LendInvest\Domain\Type\Uuid;
use LendInvest\Domain\Entity\Loan;

/**
 * Interface TranchesRepositoryInterface
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
interface TranchesRepositoryInterface
{
    /**
     * @param  Uuid $id The id of the tranche
     * @return Tranche
     */
    public function findByLoan($loan);
}
