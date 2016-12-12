<?php
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
