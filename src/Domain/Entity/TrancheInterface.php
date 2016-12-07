<?php
namespace LendInvest\Domain\Entity;

use LendInvest\Domain\Type\Uuid;
use LendInvest\Domain\Type\Interest;
use LendInvest\Domain\Entity\Investment;
use LendInvest\Domain\Entity\Loan;

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
    public function getId(): Uuid;

    /**
     * @return Loan
     */
    public function getLoan(): Loan;

    /**
     * @return Interest
     */
    public function getInterest(): Interest;

    /**
     * @param Investment
     */
    public function addInvestment(Investment $investment);

    /**
     * @return array
     */
    public function getInvestments();
}
