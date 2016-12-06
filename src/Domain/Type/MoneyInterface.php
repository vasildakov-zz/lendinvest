<?php
namespace LendInvest\Domain\Type;

interface MoneyInterface
{
    public function getAmount();

    public function getCurrency();

    public function subtract(MoneyInterface $money);

    public function add(MoneyInterface $money);
}