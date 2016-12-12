<?php
namespace LendInvest\Application\Interest;

use LendInvest\Domain\Repository\InvestmentRepositoryInterface;

/**
 * Class CalculateInterest
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
final class CalculateInterest implements CalculateInterestInterface
{
    /**
     * @var InvestmentRepositoryInterface $investments
     */
    private $investments;

    /**
     * @param InvestmentRepositoryInterface $investments
     */
    public function __construct(InvestmentRepositoryInterface $investments)
    {
        $this->investments = $investments;
    }

    /**
     * @param  CalculateInterestRequest $request
     * @return void
     */
    public function __invoke(CalculateInterestRequest $request)
    {
        $start = $request->getStartDate();
        $end   = $request->getEndDate();

        $investments = $this->investments->findByPeriod($start, $end);

        //$loan = $this->loans->find($request->getLoan());
        //$tranches = $this->tranches->findByLoan($loan);

        foreach ($investments as $investment) {
            $tranche  = $investment->getTranche();
            $interest = $tranche->getInterest();

            // $amount = $investment->getAmount();
        }

        //var_dump($investments);
        return [];
    }
}
