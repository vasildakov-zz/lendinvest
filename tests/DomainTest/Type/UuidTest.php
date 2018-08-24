<?php
namespace LendInvest\DomainTest\Type;

use LendInvest\Domain\Type\Uuid;

/**
 * UuidTest
 *
 * @package LendInvest
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class UuidTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @test
     * @group domain
     */
    public function itCanBeConstructedWithString()
    {
        $uuid = new Uuid('6d57cce1-28d8-4399-8f0e-24557cc6e5be');

        $this->assertInstanceOf(Uuid::class, $uuid);
    }

    /**
     * @test
     * @group domain
     */
    public function itCanGenerateVersion4()
    {
        $uuid = Uuid::uuid4();

        $this->assertInstanceOf(Uuid::class, $uuid);
    }

    /**
     * @test
     * @group domain
     */
    public function itCanBeConvertedToString()
    {
        $uuid = Uuid::uuid4();

        $this->assertInternalType('string', (string) $uuid);
    }

    /**
     * @test
     * @group domain
     * @expectedException \InvalidArgumentException
     */
    public function itCanThrowAnException()
    {
        new Uuid('some-invalid-uuid-string');
    }
}
