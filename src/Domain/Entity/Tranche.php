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

use LendInvest\Domain\Type\InterestInterface;
use LendInvest\Domain\Type\MoneyInterface;
use LendInvest\Domain\Type\Uuid;
use LendInvest\Domain\Type\Money;
use LendInvest\Domain\Type\DateTime;
use LendInvest\Domain\Type\Interest;
use LendInvest\Domain\Type\UuidInterface;

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
     * @var Loan $loan
     */
    private $loan;

    /**
     * @var Interest $interest
     */
    private $interest;

    /**
     * @var Money $available
     */
    private $available;

    /**
     * @var array $investments
     */
    private $investments = [];

    /**
     * @var DateTime $createdAt
     */
    private $createdAt;

    /**
     * Tranche constructor.
     * @param UuidInterface $id
     * @param LoanInterface $loan
     * @param MoneyInterface $available
     * @param InterestInterface $interest
     */
    public function __construct(
        UuidInterface $id,
        LoanInterface $loan,
        MoneyInterface $available,
        InterestInterface $interest
    ) {
        $this->setId($id);
        $this->setLoan($loan);
        $this->setAvailable($available);
        $this->setInterest($interest);

        $this->createdAt = DateTime::fromDateTime(new \DateTime());
    }


    /**
     * @param Uuid $id
     * @return Tranche
     */
    private function setId(UuidInterface $id)
    {
        $this->id = $id;

        return $this;
    }


    /**
     * @return Uuid $id
     */
    public function getId() : UuidInterface
    {
        return $this->id;
    }

    /**
     * @param LoanInterface $loan
     * @return Tranche
     */
    private function setLoan(LoanInterface $loan)
    {
        $this->loan = $loan;

        return $this;
    }


    /**
     * @return LoanInterface $loan
     */
    public function getLoan() : LoanInterface
    {
        return $this->loan;
    }


    /**
     * @param InterestInterface $interest
     * @return Tranche
     */
    private function setInterest(InterestInterface $interest)
    {
        $this->interest = $interest;

        return $this;
    }


    /**
     * @return Interest $interest
     */
    public function getInterest() : InterestInterface
    {
        return $this->interest;
    }

    /**
     * @param MoneyInterface $available
     * @return Tranche
     */
    private function setAvailable(MoneyInterface $available)
    {
        $this->available = $available;

        return $this;
    }


    /**
     * @return Money $available
     */
    public function getAvailable() : MoneyInterface
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
     */
    public function getCurrentAmount()
    {
        $amount = 0;
        foreach ($this->getInvestments() as $investment) {
            $amount += $investment->getAmount();
        }
        return $amount;
    }


    /**
     * @return InvestmentInterface[] $investments
     */
    public function getInvestments() : array
    {
        return $this->investments;
    }


    /**
     * @param InvestmentInterface $investment
     */
    public function addInvestment(InvestmentInterface $investment)
    {
        $this->investments[] = $investment;
    }
}
