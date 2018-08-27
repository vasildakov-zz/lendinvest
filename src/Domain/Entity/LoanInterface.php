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
use LendInvest\Domain\Type\CurrencyInterface;
use LendInvest\Domain\Type\Uuid;
use LendInvest\Domain\Type\Currency;
use LendInvest\Domain\Type\UuidInterface;

/**
 * Interface LoanInterface
 *
 * @package LendInvest
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
interface LoanInterface
{
    /**
     * @return UuidInterface
     */
    public function getId() : UuidInterface;

    /**
     * @return CurrencyInterface
     */
    public function getCurrency() : CurrencyInterface;

    /**
     * @param TrancheInterface $tranche
     * @return void
     */
    public function addTranche(TrancheInterface $tranche);

    /**
     * @return TrancheInterface[]
     */
    public function getTranches() : array;

    /**
     * @return int
     */
    public function getNumberOfDays() : int;
}
