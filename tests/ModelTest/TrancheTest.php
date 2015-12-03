<?php
namespace LendInvest\ModelTest;

use LendInvest\Model\Tranche;

/**
 * TrancheTest
 *
 * @package LendInvest
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class TrancheTest extends \PHPUnit_Framework_TestCase
{
    public function testTrancheInstance()
    {
        $this->assertInstanceOf('LendInvest\Model\Tranche', new Tranche);
    }

    public function testTrancheProperties()
    {
        $this->assertClassHasAttribute('loan', 'LendInvest\Model\Tranche');
        $this->assertClassHasAttribute('maxAmount', 'LendInvest\Model\Tranche');
        $this->assertClassHasAttribute('investments', 'LendInvest\Model\Tranche');
        $this->assertClassHasAttribute('createdAt', 'LendInvest\Model\Tranche');
    }
}
