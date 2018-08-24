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

declare(strict_types=1);

namespace LendInvest\Domain\Entity;

use LendInvest\Domain\Entity\Loan;
use LendInvest\Domain\Entity\Investment;

use LendInvest\Domain\Type\Uuid;
use LendInvest\Domain\Type\Money;
use LendInvest\Domain\Type\DateTime;
use LendInvest\Domain\Type\Interest;

/**
 * Class Tranche
 *
 * @package LendInvest
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class Tranche implements TrancheInterface
{
    /**
     * @var Uuid $id
     */
    private $id;

    /**
     * @var \LendInvest\Domain\Entity\Loan $loan
     */
    private $loan;

    /**
     * @var \LendInvest\Domain\Type\Interest $interest
     */
    private $interest;

    /**
     * @var \LendInvest\Domain\Type\Money $available
     */
    private $available;

    /**
     * @var array $investments
     */
    private $investments = [];

    /**
     * @var \DateTime $createdAt
     */
    private $createdAt;


    /**
     * @param Uuid $id
     */
    public function __construct(Uuid $id, Loan $loan, Money $available, Interest $interest)
    {
        $this->setId($id);
        $this->setLoan($loan);
        $this->setAvailable($available);
        $this->setInterest($interest);

        $this->createdAt = DateTime::fromDateTime(new \DateTime());
    }


    /**
     * @param Uuid $id
     */
    private function setId(Uuid $id)
    {
        $this->id = $id;

        return $this;
    }


    /**
     * @return Uuid $id
     */
    public function getId() : Uuid
    {
        return $this->id;
    }

    /**
     * @param Loan $loan
     */
    private function setLoan($loan)
    {
        $this->loan = $loan;

        return $this;
    }


    /**
     * @return Loan $loan
     */
    public function getLoan() : Loan
    {
        return $this->loan;
    }


    /**
     * @param Interest $interest
     */
    private function setInterest(Interest $interest)
    {
        $this->interest = $interest;

        return $this;
    }


    /**
     * @return Interest $interest
     */
    public function getInterest() : Interest
    {
        return $this->interest;
    }

    /**
     * @param Money $available
     */
    private function setAvailable(Money $available)
    {
        $this->available = $available;

        return $this;
    }


    /**
     * @return Money $available
     */
    public function getAvailable() : Money
    {
        return $this->available;
    }


    public function getDailyInterest()
    {
        $interest = $this->interest->getValue();

        $days = $this->loan->getNumberOfDays();

        return round($interest / $days, 4);
    }


    /**
     * Returns current investments amount
     * @return int $amount
     * @codeCoverageIgnore
     */
    public function getCurrentAmount()
    {
        //
    }


    /**
     * @return array $investments
     * @codeCoverageIgnore
     */
    public function getInvestments()
    {
        return $this->investments;
    }


    /**
     * @param Investment $investment
     * @codeCoverageIgnore
     */
    public function addInvestment(Investment $investment)
    {
        $this->investments[] = $investment;
    }
}
