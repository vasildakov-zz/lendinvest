<?php
namespace LendInvest\ApplicationTest\Interest;

use LendInvest\Application\Interest\CalculateInterestInterface;
use LendInvest\Application\Interest\CalculateInterest;
use LendInvest\Application\Interest\CalculateInterestRequest;

use LendInvest\Domain\Type\Uuid;
use LendInvest\Domain\Repository\TrancheRepositoryInterface;

/**
 * InvestmentTest
 *
 * @package LendInvest
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class InvestmentTest extends \PHPUnit_Framework_TestCase
{
    private $tranches;

    private $request;

    private $loan;

    protected function setUp()
    {
        $this->tranches = $this->getMockBuilder(TrancheRepositoryInterface::class)
                               ->disableOriginalConstructor()
                               ->getMock()
        ;

        $this->request  = $this->getMockBuilder(CalculateInterestRequest::class)
                               ->disableOriginalConstructor()
                               ->getMock()
        ;

        $this->loan     = $this->getMockBuilder(Uuid::class)
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
        $service = new CalculateInterest($this->tranches);

        self::assertInstanceOf(CalculateInterestInterface::class, $service);
    }


    /**
     * @test
     * @group application
     */
    public function itCanCalculateInterest()
    {

        $this->request
             ->expects($this->once())
             ->method('getLoan')
             ->willReturn($this->loan)
        ;

        $this->tranches
             ->expects($this->once())
             ->method('findByLoan')
             ->with($this->loan)
        ;

        $service = new CalculateInterest($this->tranches);

        $service($this->request);
    }
}
