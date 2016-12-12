<?php
namespace LendInvest\ApplicationTest\Interest;

use LendInvest\Application\Interest\CalculateInterestInterface;
use LendInvest\Application\Interest\CalculateInterest;
use LendInvest\Application\Interest\CalculateInterestRequest;

use LendInvest\Domain\Entity;
use LendInvest\Domain\Type;
use LendInvest\Domain\Repository;

/**
 * InvestmentTest
 *
 * @package LendInvest
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class InvestmentTest extends \PHPUnit_Framework_TestCase
{
    private $id;

    private $loans;

    private $request;

    private $loan;

    protected function setUp()
    {
        $this->investments  = $this->getMockBuilder(Repository\InvestmentRepositoryInterface::class)
                               ->disableOriginalConstructor()
                               ->getMock()
        ;


        $this->request  = $this->getMockBuilder(CalculateInterestRequest::class)
                               ->disableOriginalConstructor()
                               ->getMock()
        ;

        $this->id       = $this->getMockBuilder(Type\Uuid::class)
                               ->disableOriginalConstructor()
                               ->getMock()
        ;

        $this->loan     = $this->getMockBuilder(Entity\Loan::class)
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
        $start = '2015-10-01';

        $end   = '2015-10-31';

        $this->request
             ->expects($this->once())
             ->method('getStartDate')
             ->willReturn($start)
        ;

        $this->request
             ->expects($this->once())
             ->method('getEndDate')
             ->willReturn($end)
        ;

        $this->investments
             ->expects($this->once())
             ->method('findByPeriod')
             ->with($start, $end)
             ->willReturn($this->getInvestments())
        ;

        $service = new CalculateInterest($this->investments);

        $service($this->request);
    }


    private function getInvestments()
    {
        return [];
    }
}
