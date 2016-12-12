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
