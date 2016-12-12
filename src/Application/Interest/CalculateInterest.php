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

        foreach ($investments as $investment) {
            $tranche  = $investment->getTranche();
            $interest = $tranche->getInterest();

            // $amount = $investment->getAmount();
        }

        return [];
    }
}
