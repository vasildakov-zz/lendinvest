<?php
namespace LendInvest\Model;

/**
 * User
 *
 * @package LendInvest
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class User implements EntityInterface
{
    /**
     * @var string $name
     */
    protected $name;

    /**
     * @var string $surname
     */
    protected $surname;

    /**
     * @var string $email
     */
    protected $email;

    /**
     * @var string $city
     */
    protected $city;

    /**
     * @var string $address
     */
    protected $address;
}
