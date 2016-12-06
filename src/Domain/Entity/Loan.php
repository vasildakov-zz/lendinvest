<?php
namespace LendInvest\Domain\Entity;

use LendInvest\Domain\Entity\Tranche;
use LendInvest\Domain\Type\DateTime;
use LendInvest\Domain\Type\Uuid;

/**
 * Loan
 *
 * @package LendInvest
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
final class Loan implements LoanInterface
{
    /**
     * @var Uuid $id
     */
    private $id;

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
     * @param Uuid         $id
     * @param DateTime     $startDate
     * @param DateTime     $endDate
     */
    public function __construct(Uuid $id, DateTime $startDate, DateTime $endDate)
    {
        $this->id = $id;
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
