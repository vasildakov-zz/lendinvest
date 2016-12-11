<?php
namespace LendInvest\Domain\Type;

/**
 * Class Interest
 *
 * @package LendInvest
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class Interest implements InterestInterface
{
    /**
     * @var int $value
     */
    private $value;


    public function __construct($value)
    {
        if (!is_int($value)) {
            throw new \InvalidArgumentException;
        }

        $this->value = $value;
    }


    /**
     * @return int $value
     */
    public function getValue()
    {
        return $this->value;
    }
}
