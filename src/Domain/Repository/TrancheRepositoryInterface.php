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
     * @param  Uuid $id
     * @return Tranche
     */
    public function find(Uuid $id) : Tranche;


    public function findByLoan(Loan $loan);
}
