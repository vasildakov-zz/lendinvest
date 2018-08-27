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

use LendInvest\Domain\Type\MoneyInterface;
use LendInvest\Domain\Type\Uuid;
use LendInvest\Domain\Type\Money;
use LendInvest\Domain\Type\DateTime;
use LendInvest\Domain\Type\UuidInterface;

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
     * @param UuidInterface       $id
     * @param InvestorInterface   $investor
     * @param TrancheInterface    $tranche
     * @param MoneyInterface      $amount
     */
    public function __construct(
        UuidInterface $id,
        InvestorInterface $investor,
        TrancheInterface $tranche,
        MoneyInterface $amount
    ) {
        $this->setId($id);
        $this->setInvestor($investor);
        $this->setTranche($tranche);
        $this->setAmount($amount);
        $this->setMadeAt(new \DateTime('now'));
    }


    /**
     * @param UuidInterface $id
     * @return Investment
     */
    private function setId(UuidInterface $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return Uuid $id
     */
    public function getId() : UuidInterface
    {
        return $this->id;
    }


    /**
     * @param InvestorInterface $investor
     * @return Investment
     */
    private function setInvestor(InvestorInterface $investor)
    {
        $this->investor = $investor;

        return $this;
    }


    /**
     * @return Investor $investor
     */
    public function getInvestor() : InvestorInterface
    {
        return $this->investor;
    }


    /**
     * @param TrancheInterface $tranche
     * @return Investment
     */
    private function setTranche(TrancheInterface $tranche)
    {
        $this->tranche = $tranche;

        return $this;
    }


    /**
     * @return TrancheInterface $tranche
     */
    public function getTranche() : TrancheInterface
    {
        return $this->tranche;
    }


    /**
     * @param MoneyInterface $amount
     * @return Investment
     */
    private function setAmount(MoneyInterface $amount)
    {
        $this->amount = $amount;

        return $this;
    }


    /**
     * @return MoneyInterface $amount
     */
    public function getAmount() : MoneyInterface
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

    /**
     * @param \DateTime $madeAt
     * @return $this
     */
    private function setMadeAt(\DateTime $madeAt)
    {
        $this->madeAt = $madeAt;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getMadeAt() : \DateTime
    {
        return $this->madeAt;
    }
}
