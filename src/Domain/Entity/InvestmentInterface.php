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

use LendInvest\Domain\Type\MoneyInterface;
use LendInvest\Domain\Type\UuidInterface;

/**
 * Interface InvestmentInterface
 *
 * @package LendInvest
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
interface InvestmentInterface
{
    /**
     * @return UuidInterface
     */
    public function getId() : UuidInterface;

    /**
     * @return InvestorInterface
     */
    public function getInvestor() : InvestorInterface;

    /**
     * @return TrancheInterface
     */
    public function getTranche() : TrancheInterface;

    /**
     * @return MoneyInterface
     */
    public function getAmount() : MoneyInterface;

    /**
     * @return \DateTime
     */
    public function getMadeAt() : \DateTime;
}
