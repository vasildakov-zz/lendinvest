<?php
namespace LendInvest\Application;

/**
 * Interface MakeInvestmentInterface
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
interface MakeInvestmentInterface
{
    /**
     * @param  MakeInvestmentRequest $request
     */
    public function __invoke(MakeInvestmentRequest $request);
}
