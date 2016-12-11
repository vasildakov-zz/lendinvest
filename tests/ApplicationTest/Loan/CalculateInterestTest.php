<?php
namespace LendInvest\ApplicationTest\Loan;

use LendInvest\Application\Loan\CalculateInterestInterface;
use LendInvest\Application\Loan\CalculateInterest;
use LendInvest\Application\Loan\CalculateInterestRequest;

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
        $this->loans    = $this->getMockBuilder(Repository\LoanRepositoryInterface::class)
                               ->disableOriginalConstructor()
                               ->getMock()
        ;

        $this->tranches = $this->getMockBuilder(Repository\TranchesRepositoryInterface::class)
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
        $service = new CalculateInterest($this->loans, $this->tranches);

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
             ->willReturn($this->id)
        ;

        $this->loans
             ->expects($this->once())
             ->method('find')
             ->with($this->id)
             ->willReturn($this->loan)
        ;

        $this->tranches
             ->expects($this->once())
             ->method('findByLoan')
             ->with($this->loan)
             ->willReturn($this->getTranches())
        ;

        $service = new CalculateInterest($this->loans, $this->tranches);

        $service($this->request);
    }


    private function getTranches()
    {
        return [
            new Entity\Tranche()
        ];
    }
}
