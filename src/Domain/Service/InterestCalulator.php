<?php
namespace LendInvest\Domain\Service;

use LendInvest\Domain\Entity\Tranche;
use LendInvest\Domain\Type\DateTime;
use LendInvest\Domain\Repository\TrancheRepositoryInterface;

/**
 * Class InterestCalulator ???
 */
class InterestCalulator
{
    /**
     * @param TrancheRepositoryInterface $tranches
     */
    public function __construct(TrancheRepositoryInterface $tranches)
    {
        $this->tranches = $tranches;
    }


    /**
     * @param  DateTime $start
     * @param  DateTime $end
     * @return array
     */
    public function __invoke(DateTime $start, DateTime $end)
    {
        $tranches = $this->tranches->findAll();

        foreach ($tranches as $tranche) {
            # code...
        }
    }
}
