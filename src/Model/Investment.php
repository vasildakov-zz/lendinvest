<?php
namespace LendInvest\Model;

use LendInvest\Model\Investment;

/**
 * Investment
 *
 * @package Lendinvest
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class Investment implements EntityInterface
{
    /**
     * @var float $amount
     */
    private $amount;

    /**
     * @var \Lendinvest\Model\Investor $investor
     */
    private $investor;

    /**
     * @var \DateTime $createdAt
     */
    private $createdAt;

    /**
     * @var \Lendinvest\Model\Tranche $tranche
     */
    private $tranche;


    public function __construct()
    {
        $this->createdAt = new \DateTime("now");
    }

    /**
     * @param [type] $amount [description]
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }


    /**
     * @return [type] [description]
     */
    public function getAmount()
    {
        return $this->amount;
    }


    /**
     * @param Investor $investor [description]
     */
    public function setInvestor(Investor $investor)
    {
        $this->investor = $investor;

        return $this;
    }


    /**
     * Return Investment earn
     * @return [type] [description]
     */
    public function getEarn()
    {
        $tranche = $this->getTranche();
        $rate = $tranche->getDailyInterestRate();
        $loan = $tranche->getLoan();

        $earn = ($this->amount * $rate / 100) * $days;

        return $earn;
    }
}
