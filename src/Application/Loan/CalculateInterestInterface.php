<?php
namespace LendInvest\Application\Loan;

/**
 * Interface CalculateInterestInterface
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
interface CalculateInterestInterface
{
    /**
     * @param  CalculateInterestRequest $request
     */
    public function __invoke(CalculateInterestRequest $request);
}
