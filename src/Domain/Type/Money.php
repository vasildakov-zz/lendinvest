<?php
namespace LendInvest\Domain\Type;

/**
 * Class Money
 *
 * @package LendInvest
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class Money
{
    private $value; // amount

    public function __construct($value)
    {
        $this->value = $value;
    }
}
