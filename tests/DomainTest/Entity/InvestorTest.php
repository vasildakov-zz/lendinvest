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
class InvestorTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \PHPUnit_Framework_MockObject_MockObject|Type\UuidInterface
     */
    protected $id;

    /**
     * @var \PHPUnit_Framework_MockObject_MockObject|Entity\WalletInterface
     */
    protected $wallet;


    protected function setUp()
    {
        /** @var \PHPUnit_Framework_MockObject_MockObject|Type\Uuid $id */
        $this->id = $this->getMockForAbstractClass(Type\UuidInterface::class);

        /** @var \PHPUnit_Framework_MockObject_MockObject|Entity\Wallet $wallet */
        $this->wallet = $this->getMockForAbstractClass(Entity\WalletInterface::class);
    }


    /**
     * @test
     * @group domain
     */
    public function itCanBeConstructed()
    {
        $investor = new Entity\Investor($this->id, 'Investor 1');

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
        $investor = new Entity\Investor($this->id, 'Investor 1');
        $investor->addWallet($this->wallet);
        $this->assertEquals(1, count($investor->getWallets()));
    }
}
