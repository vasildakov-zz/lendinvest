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

use LendInvest\Domain\Entity\Investment;
use LendInvest\Domain\Entity\Tranche;
use LendInvest\Domain\Entity\Investor;

use LendInvest\Domain\Type\Uuid;
use LendInvest\Domain\Type\Money;
use LendInvest\Domain\Type\DateTime;

/**
 * Class LendInvest
 *
 * @package Lendinvest
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class Investment implements InvestmentInterface
{
    /**
     * @var \LendInvest\Domain\Type\Uuid $id
     */
    private $id;

    /**
     * @var \LendInvest\Domain\Entity\Investor $investor
     */
    private $investor;

    /**
     * @var \LendInvest\Domain\Entity\Tranche $tranche
     */
    private $tranche;

    /**
     * @var \LendInvest\Domain\Type\Money $amount
     */
    private $amount;

    /**
     * @var \LendInvest\Domain\Type\DateTime $madeAt
     */
    private $madeAt;


    /**
     * @param Uuid       $id
     * @param Investor   $investor
     * @param Tranche    $tranche
     * @param Money      $amount
     */
    public function __construct(Uuid $id, Investor $investor, Tranche $tranche, Money $amount)
    {
        $this->setId($id);
        $this->setInvestor($investor);
        $this->setTranche($tranche);
        $this->setAmount($amount);
        $this->setMadeAt(DateTime::fromDateTime(new \DateTime()));
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
     * @param Investor $investor
     */
    private function setInvestor(Investor $investor)
    {
        $this->investor = $investor;

        return $this;
    }


    /**
     * @return Investor $investor
     */
    public function getInvestor() : Investor
    {
        return $this->investor;
    }


    /**
     * @param Tranche $tranche
     */
    private function setTranche(Tranche $tranche)
    {
        $this->tranche = $tranche;

        return $this;
    }


    /**
     * @return Tranche $tranche
     */
    public function getTranche() : Tranche
    {
        return $this->tranche;
    }


    /**
     * @param Money $amount
     */
    private function setAmount(Money $amount)
    {
        $this->amount = $amount;

        return $this;
    }


    /**
     * @return Money $amount
     */
    public function getAmount() : Money
    {
        return $this->amount;
    }


    /**
     * Guard
     *
     * @param  Money  $money
     * @return boolean
     * @codeCoverageIgnore
     */
    private function assertSameCurrency(Money $money)
    {
        $currency = $money->getCurrency();

        if ($this->amount->getCurrency()->equals($currency)) {
            return true;
        }

        return false;
    }

    private function setMadeAt(DateTime $madeAt)
    {
        $this->madeAt = $madeAt;

        return $this;
    }


    public function getMadeAt()
    {
        return $this->madeAt;
    }


    /**
     * Return Investment earn ????
     */
    /* public function getEarn()
    {
        $tranche = $this->getTranche();
        $rate = $tranche->getDailyInterestRate();
        $loan = $tranche->getLoan();

        $earn = ($this->amount * $rate / 100) * $days;

        return $earn;
    }*/
}
