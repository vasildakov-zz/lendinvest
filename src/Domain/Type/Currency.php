<?php
namespace LendInvest\Domain\Type;

/**
 * Class Currency
 *
 * @package LendInvest
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class Currency implements CurrencyInterface
{
    private $code; // currency code

    public function __construct($code)
    {
        $this->code = $code;
    }

    public function getCode()
    {
        return $this->code;
    }
}
