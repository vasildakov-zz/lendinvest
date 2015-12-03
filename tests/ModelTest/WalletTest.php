<?php
namespace LendInvest\ModelTest;

use LendInvest\Model\Wallet;

/**
 * WalletTest
 *
 * @package LendInvest
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class WalletTest extends \PHPUnit_Framework_TestCase
{
    public function testInvestorInstance()
    {
        $this->assertInstanceOf('LendInvest\Model\Wallet', new Wallet);
    }

    public function testInvestorProperties()
    {
        $this->assertClassHasAttribute('balance', 'LendInvest\Model\Wallet');
    }
}
