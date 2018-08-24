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

namespace LendInvest\Application\Investment;

/**
 * Interface MakeInvestmentRequest
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class MakeInvestmentRequest
{
    /**
     * @var string
     */
    private $investor;

    /**
     * @var string
     */
    private $tranche;

    /**
     * @var string
     */
    private $amount;

    /**
     * @param string $investor
     * @param string $tranche
     * @param string $amount
     */
    public function __construct($investor, $tranche, $amount)
    {
        $this->investor = $investor;
        $this->tranche  = $tranche;
        $this->amount   = $amount;
    }

    /**
     * @return string
     */
    public function investor()
    {
        return $this->investor;
    }

    /**
     * @return string
     */
    public function tranche()
    {
        return $this->tranche;
    }

    /**
     * @return string
     */
    public function amount()
    {
        return $this->amount;
    }
}
