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

namespace LendInvest\Domain\Entity;

use LendInvest\Domain\Entity\Tranche;
use LendInvest\Domain\Type\Uuid;
use LendInvest\Domain\Type\Currency;

/**
 * Interface LoanInterface
 *
 * @package LendInvest
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
interface LoanInterface
{
    /**
     * @return Uuid
     */
    public function getId() : Uuid;

    /**
     * @return Currency
     */
    public function getCurrency() : Currency;

    /**
     * @param Tranche $tranche
     * @return void
     */
    public function addTranche(Tranche $tranche);
}
