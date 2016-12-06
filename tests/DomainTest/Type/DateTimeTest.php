<?php
namespace LendInvest\DomainTest\Type;

use LendInvest\Domain\Type\DateTime;

/**
 * DateTimeTest
 *
 * @package LendInvest
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class DateTimeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @group domain
     */
    public function itCanBeConstructed()
    {
        $datetime = new DateTime('2016', '12', '06');

        $this->assertInstanceOf(DateTime::class, $datetime);
    }

    /**
     * @test
     * @group domain
     */
    public function itCanCreateFromPhpDatetime()
    {
        $datetime = DateTime::fromDateTime(new \DateTime);

        $this->assertInstanceOf(DateTime::class, $datetime);
    }

    /**
     * @test
     * @group domain
     */
    public function itCanBeStringified()
    {
        $datetime = new DateTime('2016', '12', '06');

        $this->assertInternalType('string', (string) $datetime);
    }

    /**
     * @test
     * @group domain
     */
    public function itCanBeSerialized()
    {
        $datetime = new DateTime('2016', '12', '06');

        $this->assertInternalType('string', json_encode($datetime));
    }
}
