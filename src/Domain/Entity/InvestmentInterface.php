<?php
namespace LendInvest\Domain\Entity;

use LendInvest\Domain\Entity\Investor;
use LendInvest\Domain\Entity\Tranche;
use LendInvest\Domain\Type\Money;

interface InvestmentInterface
{
    public function getInvestor() : Investor;

    public function getTranche() : Tranche;

    public function getAmount() : Money;
}
