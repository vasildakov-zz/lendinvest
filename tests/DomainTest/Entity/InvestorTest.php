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
    /**
     * @var \PHPUnit_Framework_MockObject_MockObject|Type\Uuid
     */
    protected $id;

    /**
     * @var \PHPUnit_Framework_MockObject_MockObject|Entity\Wallet
     */
    protected $wallet;


    protected function setUp()
    {
        /** @var \PHPUnit_Framework_MockObject_MockObject|Type\Uuid $id */
        $this->id = $this->getMockBuilder(Type\Uuid::class)
            ->disableOriginalConstructor()
            ->getMock()
        ;

        /** @var \PHPUnit_Framework_MockObject_MockObject|Entity\Wallet $wallet */
        $this->wallet = $this->getMockBuilder(Entity\Wallet::class)
            ->disableOriginalConstructor()
            ->getMock()
        ;
    }


    /**
     * @test
     * @group domain
     */
    public function itCanBeConstructed()
    {
        $investor = new Entity\Investor($this->id);

        $this->assertInstanceOf(Entity\Investor::class, $investor);

        $this->assertEquals($this->id, $investor->getId());
    }


    /**
     * @test
     * @group domain
     */
    public function itHasRequiredProperties()
    {
        $this->assertClassHasAttribute('id', Entity\Investor::class);

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
