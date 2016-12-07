<?php
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
     * @var \LendInvest\Domain\Type\Money $amount
     */
    private $amount;

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
    public function __construct(Uuid $id, Loan $loan, Money $amount, Interest $interest)
    {
        $this->setId($id);
        $this->setLoan($loan);
        $this->setAmount($amount);
        $this->setInterest($interest);

        $this->createdAt = DateTime::fromDateTime(new \DateTime());
    }

    private function setId(Uuid $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return Uuid $id
     */
    public function getId()
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
     * @param float $maxAmount
     */
    private function setAmount(Money $amount)
    {
        $this->amount = $amount;

        return $this;
    }


    /**
     * @return float $amount
     */
    public function getAmount() : Money
    {
        return $this->amount;
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
        $this->investments[] = $investment;
    }
}
