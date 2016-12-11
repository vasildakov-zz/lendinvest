<?php
namespace LendInvest\Domain\Repository;

use LendInvest\Domain\Type\Uuid;
use LendInvest\Domain\Entity\Loan;

/**
 * Interface LoanRepositoryInterface
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
interface LoanRepositoryInterface
{
    /**
     * @param  Uuid $id The id of the tranche
     * @return Tranche
     */
    public function find($id);
}
