<?php
namespace LendInvest\Domain\Repository;

use LendInvest\Domain\Type\Uuid;
use LendInvest\Domain\Entity\Loan;

/**
 * Interface TrancheRepositoryInterface
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
interface TrancheRepositoryInterface
{
    /**
     * @param  Uuid $id The id of the tranche
     * @return Tranche
     */
    public function find($id);

    /**
     * @param  Uuid   $id The id of the loan
     * @return array
     */
    public function findByLoan($id);
}
