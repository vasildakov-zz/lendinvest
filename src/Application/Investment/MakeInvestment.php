<?php
namespace LendInvest\Application\Investment;

/**
 * Class MakeInvestment
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
final class MakeInvestment implements MakeInvestmentInterface
{
    /**
     * @var TrancheRepository $tranches
     */
    private $tranches;

    /**
     * @param TrancheRepository $tranches
     */
    public function __construct(TrancheRepository $tranches)
    {
        $this->tranches = $tranches;
    }

    /**
     * @param  MakeInvetmentRequest $request
     * @return void
     */
    public function __invoke(MakeInvetmentRequest $request)
    {
        $tranche = $this->tranches->find($request->tranche());
    }
}
