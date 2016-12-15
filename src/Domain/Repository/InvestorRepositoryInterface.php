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

namespace LendInvest\Domain\Repository;

use LendInvest\Domain\Type\Uuid;
use LendInvest\Domain\Entity\Investment;
use LendInvest\Domain\Entity\Investor;

/**
 * Interface InvestorRepositoryInterface
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
interface InvestorRepositoryInterface
{
    /**
     * @param  Uuid $id
     * @return Investor
     */
    public function find($id);
}
