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


    public function __construct()
    {
        $this->createdAt = new \DateTime("now");
    }

    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }


    public function getAmount()
    {
        return $this->amount;
    }


    public function setInvestor(Investor $investor)
    {
        $this->investor = $investor;

        return $this;
    }
}
