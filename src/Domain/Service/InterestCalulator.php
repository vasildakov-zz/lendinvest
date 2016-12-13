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

namespace LendInvest\Domain\Service;

use LendInvest\Domain\Type\DateTime;
use LendInvest\Domain\Repository\TrancheRepositoryInterface;

/**
 * Class InterestCalulator ???
 */
class InterestCalulator
{
    /**
     * @param TrancheRepositoryInterface $tranches
     */
    public function __construct(TrancheRepositoryInterface $tranches)
    {
        $this->tranches = $tranches;
    }


    /**
     * @param  DateTime $start
     * @param  DateTime $end
     * @return array
     */
    public function __invoke(DateTime $start, DateTime $end)
    {
        $tranches = $this->tranches->findAll();

        foreach ($tranches as $tranche) {
            # code...
        }
    }
}
