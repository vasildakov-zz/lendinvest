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

namespace LendInvest\Application\Interest;

use LendInvest\Domain\Type\Money;
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
     * @return array
     * @throws \Exception
     */
    public function __invoke(CalculateInterestRequest $request)
    {
        $results = [];

        $start = $request->getStartDate();
        $end   = $request->getEndDate();

        $investments = $this->investments->findByPeriod($start, $end);

        foreach ($investments as $investment) {
            $daterange = new \DatePeriod(
                $investment->getMadeAt()->setTime(00, 00, 00),
                (new \DateInterval('P1D')),
                (new \DateTime('2015-10-31'))->setTime(23, 59, 59)
            );

            $investor = $investment->getInvestor()->getName();

            $interest = $investment->getTranche()->getInterest()->getValue();

            $daily = $interest / 31; // 0.096774193548387

            $period = iterator_count($daterange); // 29

            $percentage = ($daily * $period);

            $amount = $investment->getAmount()->getValue();

            $earn =  $amount * $percentage / 100;

            $results[] = new Result($investor, $earn);
        }
        return $results;
    }
}
