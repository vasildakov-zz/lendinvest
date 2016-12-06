<?php
namespace LendInvest\Domain\Entity;

use LendInvest\Domain\Entity\Tranche;
use LendInvest\Domain\Type\DateTime;

/**
 * Loan
 *
 * @package Lendinvest
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
final class Loan implements LoanInterface
{
    /**
     * @var array $tranches
     */
    private $tranches;

    /**
     * @var \Lendinvest\Domain\Type\DateTime $startDate
     */
    private $startDate;

    /**
     * @var \Lendinvest\Domain\Type\DateTime $endDate
     */
    private $endDate;


    /**
     * @param DateTime $startDate The starting date of the Loan
     * @param DateTime $endDate   The ending date of the loan
     */
    public function __construct(DateTime $startDate, DateTime $endDate)
    {
        $this->setStartDate($startDate);
        $this->setEndDate($endDate);

        $this->tranches = [];
    }

    /**
     * @param \LendInvest\Domain\Entity\Tranche $tranche
     */
    public function addTranche(Tranche $tranche)
    {
        $this->tranches[] = $tranche;
    }


    /**
     * @return array $tranches
     */
    public function getTranches()
    {
        return $this->tranches;
    }


    /**
     * @return boolean  Return false if Loan does not have tranches
     */
    public function hasTranches()
    {
        return !empty($this->tranches);
    }


    /**
     * @param \DateTime $startDate
     */
    private function setStartDate(DateTime $startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }


    /**
     * @return \DateTime $startDate
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @param \DateTime $endDate
     */
    private function setEndDate(DateTime $endDate)
    {
        $this->endDate = $endDate;

        return $this;
    }


    /**
     * @return \DateTime $endDate
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * Returns the number of days
     * @return int  $days
     */
    public function getNumberOfDays()
    {
        $date = $this->getStartDate();

        $month = $date->format('m');
        $year   =  $date->format('Y');

        $days = cal_days_in_month(CAL_GREGORIAN, $month, $year);

        return $days;
    }
}
