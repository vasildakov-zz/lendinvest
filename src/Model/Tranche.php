<?php
namespace LendInvest\Model;

use LendInvest\Model\Loan;
use LendInvest\Model\Investment;
use LendInvest\Model\Interest;

/**
 * Tranche
 *
 * @package LendInvest
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class Tranche implements EntityInterface
{
    /**
     * @var \LendInvest\Model\Loan $loan
     */
    private $loan;

    /**
     * @var \LendInvest\Model\Interest $interest
     */
    private $interest;

    /**
     * @var float $maxAmount
     */
    private $maxAmount;

    /**
     * @var array $investments
     */
    private $investments = [];

    /**
     * @var \DateTime $createdAt
     */
    private $createdAt;



    public function __construct()
    {
        $this->createdAt = new \DateTime('now');
    }

    /**
     * @param float $maxAmount
     */
    public function setMaxAmount($maxAmount)
    {
        $this->maxAmount = $maxAmount;

        return $this;
    }


    /**
     * @return float $maxAmount
     */
    public function getMaxAmount()
    {
        return $this->maxAmount;
    }


    /**
     * Returns current investments amount
     * @return int $amount
     */
    public function getCurrentAmount()
    {
        $amount = 0;

        if (!empty($this->investments)) {
            foreach ($this->investments as $investment) {
                $amount += $investment->getAmount();
            }
        }
        return $amount;
    }


    /**
     * @return boolean  Returns false if Tranche does not have Investments
     */
    public function hasInvestments()
    {
        return !empty($this->investments);
    }


    /**
     * @return array $investments
     */
    public function getInvestments()
    {
        return $this->investments;
    }


    /**
     * @param Investment $investment
     */
    public function addInvestment(Investment $investment)
    {
        $currentAmount = $this->getCurrentAmount();
        $investmentAmount = $investment->getAmount();
        if ($currentAmount + $investmentAmount > $this->getMaxAmount()) {
            throw new \RuntimeException;
        }

        $this->investments[] = $investment;
    }


    /**
     * @param \LendInvest\Model\Loan $loan
     */
    public function setLoan($loan)
    {
        $this->loan = $loan;

        return $this;
    }


    /**
     * @return \LendInvest\Model\Loan $loan
     */
    public function getLoan()
    {
        return $this->loan;
    }


    /**
     * @param \LendInvest\Model\Interest $interest
     */
    public function setInterest($interest)
    {
        $this->interest = $interest;

        return $this;
    }


    /**
     * @return \LendInvest\Model\Interest $interest
     */
    public function getInterest()
    {
        return $this->interest;
    }


    /**
     * @return float  Returns daily interest rate
     */
    public function getDailyInterestRate()
    {
        $loan = $this->getLoan();
        $interest = $this->getInterest();

        $percentage = $interest->getPercentage();
        $days = $loan->getNumberOfDays();

        return round($percentage / $days, 2);
    }
}
