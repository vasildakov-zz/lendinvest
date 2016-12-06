<?php
namespace LendInvest\Domain\Repository;

use LendInvest\Domain\Type\Uuid;

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
}
