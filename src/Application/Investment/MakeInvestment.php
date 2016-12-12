<?php
namespace LendInvest\Application\Investment;

use LendInvest\Domain\Repository\TrancheRepositoryInterface;

/**
 * Class MakeInvestment
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
final class MakeInvestment implements MakeInvestmentInterface
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
     * @param  MakeInvestmentRequest $request
     * @return void
     */
    public function __invoke(MakeInvestmentRequest $request)
    {
        $tranche = $this->tranches->find($request->tranche());
    }
}
