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

use LendInvest\Domain\Entity\Investment;
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
        $investor = $request->investor();
        $tranche  = $request->tranche();
        $amount   = $request->amount();

        $tranche = $this->tranches->find($tranche);

        // $tranche->addInvestment(new Investment());
    }
}
