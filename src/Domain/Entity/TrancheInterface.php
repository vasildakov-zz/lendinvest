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

use LendInvest\Domain\Type\InterestInterface;
use LendInvest\Domain\Type\Uuid;
use LendInvest\Domain\Type\Interest;
use LendInvest\Domain\Entity\Investment;
use LendInvest\Domain\Entity\Loan;
use LendInvest\Domain\Type\UuidInterface;

/**
 * Interface TrancheInterface
 *
 * @package LendInvest
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
interface TrancheInterface
{
    /**
     * @return Uuid
     */
    public function getId(): UuidInterface;

    /**
     * @return Loan
     */
    public function getLoan(): LoanInterface;

    /**
     * @return Interest
     */
    public function getInterest(): InterestInterface;

    /**
     * @return
     */
    public function getDailyInterest();

    /**
     * @param InvestmentInterface
     */
    public function addInvestment(InvestmentInterface $investment);

    /**
     * @return InvestmentInterface[]
     */
    public function getInvestments();
}
