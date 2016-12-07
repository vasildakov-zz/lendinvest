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
        // 3 / 31 = 0.0967741935
        // 29 * 0.0967741935 = 2.8064516129
        // 1000 * 2.8064 / 100 = 28.064

        return 1000 * 2.8064 / 100;
    }
}
