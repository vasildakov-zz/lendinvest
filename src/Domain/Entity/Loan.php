<?php
/**
 * This file is part of the vasildakov/lendinvest project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @copyright Copyright (c) Vasil Dakov <vasildakov@gmail.com>
 * @license http://opensource.org/licenses/MIT MIT
 * @link https://github.com/vasildakov/lendinvest GitHub
 */

namespace LendInvest\Domain\Entity;

use LendInvest\Domain\Entity\Tranche;
use LendInvest\Domain\Type\Currency;
use LendInvest\Domain\Type\DateTime;
use LendInvest\Domain\Type\Uuid;

/**
 * Loan
 *
 * @package LendInvest
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class Loan implements LoanInterface
{
    /**
     * @var Uuid $id
     */
    private $id;

    /**
     * @var \LendInvest\Domain\Type\Currency $currency
     */
    private $currency;

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
     * @param Currency     $currency
     * @param DateTime     $startDate
     * @param DateTime     $endDate
     */
    public function __construct(Uuid $id, Currency $currency, DateTime $startDate, DateTime $endDate)
    {
        $this->setId($id);
        $this->setCurrency($currency);
        $this->setStartDate($startDate);
        $this->setEndDate($endDate);

        $this->tranches = [];
    }

    /**
     * @param Uuid $id
     */
    private function setId(Uuid $id)
    {
        $this->id = $id;

        return $this;
    }


    /**
     * @return Uuid $id
     */
    public function getId() : Uuid
    {
        return $this->id;
    }

    /**
     * @param Currency $currency
     */
    private function setCurrency(Currency $currency)
    {
        $this->currency = $currency;

        return $this;
    }


    /**
     * @return Currency $currency
     */
    public function getCurrency() : Currency
    {
        return $this->currency;
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
        $start = (new \DateTime('2015-10-01'));
        $end   = (new \DateTime('2015-11-15'));

        return $start->diff($end)->days;
    }
}
