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
class CalculateInterestTest extends \PHPUnit_Framework_TestCase
{
    private $id;

    private $investments;

    private $loan;

    protected function setUp()
    {
        $this->investments = $this->getMockBuilder(Repository\InvestmentRepositoryInterface::class)
                                  ->disableOriginalConstructor()
                                  ->getMock()
        ;


        $this->id = $this->getMockBuilder(Type\Uuid::class)
                         ->disableOriginalConstructor()
                         ->getMock()
        ;

        $this->loan = $this->getMockBuilder(Entity\Loan::class)
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
        return [];
    }
}
