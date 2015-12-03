<?php
namespace Lendinvest\Model;

use Lendinvest\Model\Tranche;

/**
 * Loan
 *
 * @package Lendinvest
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class Loan implements EntityInterface
{
    /**
     * @var array $tranches
     */
    private $tranches;

    /**
     * @var \DateTime $startDate
     */
    private $startDate;

    /**
     * @var \DateTime $endDate
     */
    private $endDate;


    public function __construct()
    {
        $this->tranches = [];
    }

    /**
     * @param Tranche $tranche
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
    public function setStartDate(\DateTime $startDate)
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
    public function setEndDate(\DateTime $endDate)
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
