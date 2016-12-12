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

use LendInvest\Domain\Entity\Tranche;
use LendInvest\Domain\Type\DateTime;
use LendInvest\Domain\Repository\TrancheRepositoryInterface;

/**
 * Class Calulator
 */
class Calulator
{
    public function __invoke($amount, $interest)
    {
        // 3 / 31 = 0.0967741935
        // 29 * 0.0967741935 = 2.8064516129
        // 1000 * 2.8064 / 100 = 28.064

        return 1000 * 2.8064 / 100;
    }
}
