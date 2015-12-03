<?php
namespace LendInvest\Model;

use LendInvest\Model\Loan;
use LendInvest\Model\Investment;

/**
 * Tranche
 *
 * @package Lendinvest
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class Tranche implements EntityInterface
{
    /**
     * @var \Lendinvest\Model\Loan $loan
     */
    private $loan;

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


    public function hasInvestments()
    {
        return !empty($this->investments);
    }


    public function getInvestments()
    {
        return $this->investments;
    }


    public function addInvestment(Investment $investment)
    {
        $this->investments[] = $investment;
    }
}
