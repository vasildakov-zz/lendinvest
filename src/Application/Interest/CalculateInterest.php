<?php
namespace LendInvest\Application\Interest;

use LendInvest\Domain\Repository\TrancheRepositoryInterface;

/**
 * Class MakeInvestment
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
final class CalculateInterest implements CalculateInterestInterface
{
    /**
     * @var TrancheRepositoryInterface $tranches
     */
    private $tranches;

    /**
     * @param TrancheRepositoryInterface $tranches
     */
    public function __construct(TrancheRepositoryInterface $tranches)
    {
        $this->tranches = $tranches;
    }

    /**
     * @param  MakeInvetmentRequest $request
     * @return void
     */
    public function __invoke(CalculateInterestRequest $request)
    {
        $tranches = $this->tranches->findByLoan($request->getLoan());
    }
}
