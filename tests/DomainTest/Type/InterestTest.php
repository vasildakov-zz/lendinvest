<?php
namespace LendInvest\DomainTest\Type;

use LendInvest\Domain\Type\Interest;

/**
 * InterestTest
 *
 * @package LendInvest
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class InterestTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @group domain
     */
    public function itCanBeConstructed()
    {
        $this->assertInstanceOf(Interest::class, new Interest(6));
    }

    /**
     * @test
     * @group domain
     */
    public function itHasRequiredProperties()
    {
        $this->assertClassHasAttribute('value', Interest::class);
    }

    /**
     * @test
     * @group domain
     * @expectedException \InvalidArgumentException
     */
    public function itCanThrowAnException()
    {
        new Interest(null);
    }
}
