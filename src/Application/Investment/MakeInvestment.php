<?php
/**
 * This file is part of the vasildakov/lendinvest project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @copyright Copyright (c) Vasil Dakov <vasildakov@gmail.com>
 * @license http://opensource.org/licenses/MIT MIT
 * @link https://github.com/vasildakov/lendinvest GitHub
 */

namespace LendInvest\Application\Investment;

use LendInvest\Domain\Type\Uuid;
use LendInvest\Domain\Type\Money;
use LendInvest\Domain\Entity\Investor;
use LendInvest\Domain\Entity\Investment;
use LendInvest\Domain\Entity\Tranche;
use LendInvest\Domain\Repository\InvestorRepositoryInterface;
use LendInvest\Domain\Repository\TrancheRepositoryInterface;

/**
 * Class MakeInvestment
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
final class MakeInvestment implements MakeInvestmentInterface
{
    /**
     * @var InvestorRepositoryInterface $investors
     */
    private $investors;

    /**
     * @var TrancheRepositoryInterface $tranches
     */
    private $tranches;

    /**
     * @param InvestorRepositoryInterface $investors
     * @param TrancheRepositoryInterface  $tranches
     */
    public function __construct(
        InvestorRepositoryInterface $investors,
        TrancheRepositoryInterface $tranches
    ) {
        $this->investors = $investors;
        $this->tranches = $tranches;
    }

    /**
     * @param  MakeInvestmentRequest $request
     * @return void
     */
    public function __invoke(MakeInvestmentRequest $request)
    {
        $investor = $this->investors->find($request->investor());
        if (!$investor instanceof Investor) {
            throw new \Exception("Investor does not exist");
        }

        $tranche = $this->tranches->find($request->tranche());
        if (!$tranche instanceof Tranche) {
            throw new \Exception("Tranche does not exist");
        }

        $id = Uuid::uuid4();
        $amount = new Money($request->amount(), 'GBP');

        $investor->invest(
            new Investment($id, $investor, $tranche, $amount)
        );
    }
}
