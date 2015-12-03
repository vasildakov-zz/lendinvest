<?php
namespace Lendinvest\Model;

use Lendinvest\Tranche;

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

    public function setStartDate(\DateTime $startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getStartDate()
    {
        return $this->startDate;
    }


    public function setEndDate(\DateTime $endDate)
    {
        $this->endDate = $endDate;
        
        return $this;
    }

    public function getEndDate()
    {
        return $this->endDate;
    }
}
