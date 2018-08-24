<?php
namespace LendInvest\DomainTest\Type;

use LendInvest\Domain\Type\Interest;

/**
 * InterestTest
 *
 * @package LendInvest
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class InterestTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @test
     * @group domain
     */
    public function itCanBeConstructed()
    {
        $interest = new Interest(6);

        $this->assertInstanceOf(Interest::class, $interest);
        $this->assertEquals(6, $interest->getValue());
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
