<?php
namespace LendInvest\DomainTest\Entity;

use LendInvest\Domain\Entity;
use LendInvest\Domain\Type;

/**
 * InvestorTest
 *
 * @package LendInvest
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class InvestorTest extends \PHPUnit_Framework_TestCase
{
    protected $id;
    protected $wallet;

    protected function setUp()
    {
        $this->id = $this->getMockBuilder(Type\Uuid::class)->disableOriginalConstructor()->getMock();

        $this->wallet = $this->getMockBuilder(Entity\Wallet::class)->disableOriginalConstructor()->getMock();
    }


    /**
     * @test
     * @group domain
     */
    public function itCanBeConstructed()
    {
        $investor = new Entity\Investor($this->id);

        $this->assertInstanceOf(Entity\Investor::class, $investor);
    }


    /**
     * @test
     * @group domain
     */
    public function itHasRequiredProperties()
    {
        $this->assertClassHasAttribute('name', Entity\Investor::class);

        $this->assertClassHasAttribute('surname', Entity\Investor::class);

        $this->assertClassHasAttribute('email', Entity\Investor::class);

        $this->assertClassHasAttribute('address', Entity\Investor::class);

        $this->assertClassHasAttribute('wallets', Entity\Investor::class);
    }


    /**
     * @test
     * @group domain
     */
    public function itCanAddWalletsWithDifferentCurrencies()
    {
        $investor = new Entity\Investor($this->id);

        $investor->addWallet($this->wallet);

        $this->assertEquals(1, count($investor->getWallets()));
    }
}
