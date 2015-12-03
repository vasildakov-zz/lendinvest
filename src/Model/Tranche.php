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
}
