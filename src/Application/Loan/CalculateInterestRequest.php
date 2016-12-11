<?php
namespace LendInvest\Application\Loan;

/**
 * Class CalculateInterestRequest
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class CalculateInterestRequest
{
    private $loan;

    private $startDate;

    private $endDate;

    /**
     * @param string $loan          the loan uuid
     * @param string $startDate     starting date in Y-m-d format
     * @param string $endDate       ending date in Y-m-d format
     */
    public function __construct($loan, $startDate, $endDate)
    {
        $this->loan      = $loan;
        $this->startDate = $startDate;
        $this->endDate   = $endDate;
    }

    /**
     * @return string $loan
     */
    public function getLoan()
    {
        return $this->loan;
    }

    /**
     * @return string $startDate
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @return string $endDate
     */
    public function getEndDate()
    {
        return $this->endDate;
    }
}
