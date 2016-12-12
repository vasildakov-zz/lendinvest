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

namespace LendInvest\Application\Investment;

/**
 * Interface MakeInvestmentRequest
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class MakeInvestmentRequest
{
    private $investor;

    private $tranche;

    private $amount;

    /**
     * @param [type] $investor [description]
     * @param [type] $tranche  [description]
     * @param [type] $amount   [description]
     */
    public function __construct($investor, $tranche, $amount)
    {
        $this->investor = $investor;
        $this->tranche  = $tranche;
        $this->amount   = $amount;
    }


    /**
     * @return [type] [description]
     */
    public function investor()
    {
        return $this->investor;
    }

    /**
     * @return [type] [description]
     */
    public function tranche()
    {
        return $this->tranche;
    }

    /**
     * @return [type] [description]
     */
    public function amount()
    {
        return $this->amount;
    }
}
