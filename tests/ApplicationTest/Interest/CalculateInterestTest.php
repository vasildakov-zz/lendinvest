<?php
namespace LendInvest\ApplicationTest\Interest;

use LendInvest\Application\Interest\CalculateInterestInterface;
use LendInvest\Application\Interest\CalculateInterest;
use LendInvest\Application\Interest\CalculateInterestRequest;

use LendInvest\Domain\Entity;
use LendInvest\Domain\Type;
use LendInvest\Domain\Repository;

/**
 * CalculateInterestTest
 *
 * @package LendInvest
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class CalculateInterestTest extends \PHPUnit\Framework\TestCase
{
    /** @var \PHPUnit_Framework_MockObject_MockObject|Type\UuidInterface $id */
    private $id;

    /** @var \PHPUnit_Framework_MockObject_MockObject|Repository\InvestmentRepositoryInterface $investments */
    private $investments;

    /** @var \PHPUnit_Framework_MockObject_MockObject|Entity\InvestmentInterface $investment */
    private $investment;

    /** @var \PHPUnit_Framework_MockObject_MockObject|Type\InterestInterface $interest */
    private $interest;

    /** @var \PHPUnit_Framework_MockObject_MockObject|Entity\TrancheInterface $tranche */
    private $tranche;

    /** @var \PHPUnit_Framework_MockObject_MockObject|Type\Money $amount */
    private $amount;

    protected function setUp()
    {
        /** @var \PHPUnit_Framework_MockObject_MockObject|Type\UuidInterface $id */
        $this->id = $this->getMockForAbstractClass(Type\UuidInterface::class);

        /** @var \PHPUnit_Framework_MockObject_MockObject|Repository\InvestmentRepositoryInterface $investments */
        $this->investments = $this->getMockForAbstractClass(Repository\InvestmentRepositoryInterface::class);

        /** @var \PHPUnit_Framework_MockObject_MockObject|Entity\InvestmentInterface $investment */
        $this->investment = $this->getMockForAbstractClass(Entity\InvestmentInterface::class);

        /** @var \PHPUnit_Framework_MockObject_MockObject|Type\InterestInterface $interest */
        $this->interest = $this->getMockForAbstractClass(Type\InterestInterface::class);

        /** @var \PHPUnit_Framework_MockObject_MockObject|Entity\TrancheInterface $tranche */
        $this->tranche = $this->getMockForAbstractClass(Entity\TrancheInterface::class);

        /** @var \PHPUnit_Framework_MockObject_MockObject|Type\DateTime $madeAt */
        $this->madeAt = $this->getMockBuilder(Type\DateTime::class)
            ->disableOriginalConstructor()
            ->getMock()
        ;

        /** @var \PHPUnit_Framework_MockObject_MockObject|Type\Money $amount */
        $this->amount = $this->getMockBuilder(Type\Money::class)
            ->disableOriginalConstructor()
            ->getMock()
        ;
    }


    /**
     * @test
     * @group application
     */
    public function itCanBeConstructed()
    {
        $service = new CalculateInterest($this->investments);

        $this->assertInstanceOf(CalculateInterestInterface::class, $service);
    }


    /**
     * @group application
     */
    public function itCanCalculateInterest()
    {
        $request = new CalculateInterestRequest('2015-10-01', '2015-10-31');

        $this->madeAt
             ->expects($this->once())
             ->method('toString')
             ->willReturn('2015-10-03')
        ;

        $this->interest
             ->expects($this->once())
             ->method('getValue')
             ->willReturn(3)
        ;

        $this->investment
             ->expects($this->once())
             ->method('getTranche')
             ->willReturn($this->tranche)
        ;

        $this->investment
             ->expects($this->once())
             ->method('getMadeAt')
             ->willReturn($this->madeAt)
        ;

        $this->investment
             ->expects($this->once())
             ->method('getAmount')
             ->willReturn($this->amount)
        ;

        $this->amount
             ->expects($this->once())
             ->method('getAmount')
             ->willReturn(1000)
        ;

        $this->tranche
             ->expects($this->once())
             ->method('getInterest')
             ->willReturn($this->interest)
        ;

        $this->investments
             ->expects($this->once())
             ->method('findByPeriod')
             ->with($request->getStartDate(), $request->getEndDate())
             ->willReturn($this->getInvestments())
        ;

        $service = new CalculateInterest($this->investments);

        $service($request);
    }


    private function getInvestments()
    {
        return [
            $this->investment
        ];
    }
}
