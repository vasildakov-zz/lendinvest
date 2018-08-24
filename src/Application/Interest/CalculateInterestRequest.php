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

namespace LendInvest\Application\Interest;

/**
 * Class CalculateInterestRequest
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class CalculateInterestRequest
{
    private $startDate;

    private $endDate;

    /**
     * @param string $loan          the loan uuid
     * @param string $startDate     starting date in Y-m-d format
     * @param string $endDate       ending date in Y-m-d format
     */
    public function __construct($startDate, $endDate)
    {
        $this->startDate = $startDate;
        $this->endDate   = $endDate;
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
