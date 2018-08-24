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
    /** @var \PHPUnit_Framework_MockObject_MockObject|Type\Uuid $id */
    private $id;

    /** @var \PHPUnit_Framework_MockObject_MockObject|Repository\InvestmentRepositoryInterface $investments */
    private $investments;

    /** @var \PHPUnit_Framework_MockObject_MockObject|Entity\Investment $investment */
    private $investment;

    /** @var \PHPUnit_Framework_MockObject_MockObject|Type\Interest $interest */
    private $interest;

    /** @var \PHPUnit_Framework_MockObject_MockObject|Entity\Tranche $tranche */
    private $tranche;

    /** @var \PHPUnit_Framework_MockObject_MockObject|Type\Money $amount */
    private $amount;

    protected function setUp()
    {
        /** @var \PHPUnit_Framework_MockObject_MockObject|Entity\Tranche $tranche */
        $this->id = $this->getMockBuilder(Type\Uuid::class)
            ->disableOriginalConstructor()
            ->getMock()
        ;

        /** @var \PHPUnit_Framework_MockObject_MockObject|Repository\InvestmentRepositoryInterface $investments */
        $this->investments = $this->getMockBuilder(Repository\InvestmentRepositoryInterface::class)
            ->disableOriginalConstructor()
            ->getMock()
        ;

        /** @var \PHPUnit_Framework_MockObject_MockObject|Entity\Investment $investment */
        $this->investment = $this->getMockBuilder(Entity\Investment::class)
            ->disableOriginalConstructor()
            ->getMock()
        ;

        /** @var \PHPUnit_Framework_MockObject_MockObject|Type\Interest $interest */
        $this->interest = $this->getMockBuilder(Type\Interest::class)
            ->disableOriginalConstructor()
            ->getMock()
        ;

        /** @var \PHPUnit_Framework_MockObject_MockObject|Entity\Tranche $tranche */
        $this->tranche = $this->getMockBuilder(Entity\Tranche::class)
            ->disableOriginalConstructor()
            ->getMock()
        ;

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

        self::assertInstanceOf(CalculateInterestInterface::class, $service);
    }


    /**
     * @test
     * @group application
     */
    public function itCanCalculateInterest()
    {
        $request = new CalculateInterestRequest('1', '2015-10-01', '2015-10-31');

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
