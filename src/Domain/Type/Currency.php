<?php
namespace LendInvest\Domain\Type;

/**
 * Class Currency
 *
 * @package LendInvest
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class Currency
{
    private $value; // currency code

    public function __construct($value)
    {
        $this->value = $value;
    }
}
