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

declare(strict_types=1);

namespace LendInvest\Application\Investment;

use LendInvest\Domain\Entity\InvestorInterface;
use LendInvest\Domain\Entity\TrancheInterface;
use LendInvest\Domain\Type\Uuid;
use LendInvest\Domain\Type\Money;
use LendInvest\Domain\Entity\InvestorI;
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
     * MakeInvestment constructor.
     * @param InvestorRepositoryInterface $investors
     * @param TrancheRepositoryInterface $tranches
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
     * @throws \Exception
     */
    public function __invoke(MakeInvestmentRequest $request)
    {
        $investor = $this->investors->find($request->investor());
        if (!$investor instanceof InvestorInterface) {
            throw new \Exception("Investor does not exist");
        }

        $tranche = $this->tranches->find($request->tranche());
        if (!$tranche instanceof TrancheInterface) {
            throw new \Exception("Tranche does not exist");
        }

        $id = Uuid::uuid4();
        $amount = new Money($request->amount(), 'GBP');

        $investor->invest(
            new Investment($id, $investor, $tranche, $amount)
        );
    }
}
