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
