<?php
namespace LendInvest\Application\Loan;

use LendInvest\Domain\Repository\LoanRepositoryInterface;
use LendInvest\Domain\Repository\TranchesRepositoryInterface;

/**
 * Class MakeInvestment
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
final class CalculateInterest implements CalculateInterestInterface
{
    /**
     * @var LoanRepositoryInterface $loans
     */
    private $loans;

    /**
     * @var TranchesRepositoryInterface $tranches
     */
    private $tranches;

    /**
     * @param LoanRepositoryInterface $loans
     * @param TranchesRepositoryInterface $tranches
     */
    public function __construct(
        LoanRepositoryInterface $loans,
        TranchesRepositoryInterface $tranches
    ) {
        $this->loans = $loans;
        $this->tranches = $tranches;
    }

    /**
     * @param  MakeInvetmentRequest $request
     * @return void
     */
    public function __invoke(CalculateInterestRequest $request)
    {
        $loan = $this->loans->find($request->getLoan());

        $tranches = $this->tranches->findByLoan($loan);

        var_dump($tranches);
    }
}
