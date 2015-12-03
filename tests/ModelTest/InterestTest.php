<?php
namespace LendInvest\ModelTest;

use LendInvest\Model\Interest;

/**
 * InterestTest
 *
 * @package LendInvest
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class InterestTest extends \PHPUnit_Framework_TestCase
{
    public function testInterestInstance()
    {
        $this->assertInstanceOf('LendInvest\Model\Interest', new Interest(6));
    }

    public function testInterestProperties()
    {
        $this->assertClassHasAttribute('percentage', 'LendInvest\Model\Interest');
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testExceptionIsRaisedForInvalidConstructorArgument()
    {
        new Interest(null);
    }
}
