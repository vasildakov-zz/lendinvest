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

declare(strict_types=1);

namespace LendInvest\Domain\Entity;

use LendInvest\Domain\Type\Currency;
use LendInvest\Domain\Type\CurrencyInterface;
use LendInvest\Domain\Type\Uuid;
use LendInvest\Domain\Type\UuidInterface;

/**
 * Loan
 *
 * @package LendInvest
 * @author Vasil Dakov <vasildakov@gmail.com>
 * @todo update docblock
 */
class Loan implements LoanInterface
{
    /**
     * @var Uuid $id
     */
    private $id;

    /**
     * @var Currency $currency
     */
    private $currency;

    /**
     * @var array $tranches
     */
    private $tranches;

    /**
     * @var DateTime $startDate
     */
    private $startDate;

    /**
     * @var DateTime $endDate
     */
    private $endDate;


    /**
     * Loan constructor.
     * @param UuidInterface $id
     * @param CurrencyInterface $currency
     * @param \DateTime $startDate
     * @param \DateTime $endDate
     */
    public function __construct(
        UuidInterface $id,
        CurrencyInterface $currency,
        \DateTime $startDate,
        \DateTime $endDate
    ) {
        $this->setId($id);
        $this->setCurrency($currency);
        $this->setStartDate($startDate);
        $this->setEndDate($endDate);

        $this->tranches = [];
    }

    /**
     * @param UuidInterface $id
     * @return Loan
     */
    private function setId(UuidInterface $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return UuidInterface $id
     */
    public function getId() : UuidInterface
    {
        return $this->id;
    }

    /**
     * @param CurrencyInterface $currency
     * @return Loan
     */
    private function setCurrency(CurrencyInterface $currency)
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * @return Currency $currency
     */
    public function getCurrency() : CurrencyInterface
    {
        return $this->currency;
    }

    /**
     * @param TrancheInterface $tranche
     */
    public function addTranche(TrancheInterface $tranche)
    {
        $this->tranches[] = $tranche;
    }

    /**
     * @return TrancheInterface[]
     */
    public function getTranches() : array
    {
        return $this->tranches;
    }

    /**
     * @return boolean  Return false if Loan does not have tranches
     */
    public function hasTranches() : bool
    {
        return !empty($this->tranches);
    }

    /**
     * @param \DateTime $startDate
     * @return Loan
     */
    private function setStartDate(\DateTime $startDate)
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
     * @return Loan
     */
    private function setEndDate(\DateTime $endDate)
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * @return \DateTime $endDate
     */
    public function getEndDate() : \DateTime
    {
        return $this->endDate;
    }

    /**
     * Returns the number of days
     * @return int
     */
    public function getNumberOfDays() : int
    {
        return $this->getStartDate()->diff($this->getEndDate())->days;
    }
}
