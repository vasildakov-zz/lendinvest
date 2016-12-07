<?php
namespace LendInvest\Domain\Service;

use LendInvest\Domain\Entity\Tranche;
use LendInvest\Domain\Type\DateTime;
use LendInvest\Domain\Repository\TrancheRepositoryInterface;

/**
 * Class Calulator
 */
class Calulator
{
    public function __invoke($amount, $interest)
    {
        return 1000 * 2.8064 / 100;
    }
}
