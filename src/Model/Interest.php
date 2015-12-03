<?php
namespace LendInvest\Model;

/**
 * Interest
 *
 * @package LendInvest
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class Interest implements EntityInterface
{

    /**
     * @var int $percentage
     */
    private $percentage;


    public function __construct($percentage)
    {
        if (!is_int($percentage)) {
            throw new \InvalidArgumentException;
        }

        $this->percentage = $percentage;
    }


    /**
     * @return int $percentage
     */
    public function getPercentage()
    {
        return $this->percentage;
    }
}
