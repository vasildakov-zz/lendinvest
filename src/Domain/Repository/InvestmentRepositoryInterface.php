<?php
namespace LendInvest\Domain\Repository;

use LendInvest\Domain\Type\Uuid;
use LendInvest\Domain\Entity\Investment;
use LendInvest\Domain\Entity\Investor;

/**
 * Interface InvestmentRepositoryInterface
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
interface InvestmentRepositoryInterface
{
    /**
     * @param  Uuid $id
     * @return Investment
     */
    public function find($id);


    public function findByInvestor($id);

    public function findByPeriod($start, $end);
}
