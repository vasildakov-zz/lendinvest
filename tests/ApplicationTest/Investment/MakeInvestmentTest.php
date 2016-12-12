<?php
namespace LendInvest\ApplicationTest\Interest;

use LendInvest\Application\Investment\MakeInvestmentInterface;
use LendInvest\Application\Investment\MakeInvestment;
use LendInvest\Application\Investment\MakeInvestmentRequest;

use LendInvest\Domain\Entity;
use LendInvest\Domain\Type;
use LendInvest\Domain\Repository;

/**
 * MakeInvestmentTest
 *
 * @package LendInvest
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class MakeInvestmentTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \PHPUnit_Framework_MockObject_MockObject|Type\Uuid
     */
    private $id;

    /**
     * @var \PHPUnit_Framework_MockObject_MockObject|Repository\TrancheRepositoryInterface $tranches
     */
    private $tranches;

    /**
     * @var \PHPUnit_Framework_MockObject_MockObject|Entity\Loan $loan
     */
    private $loan;


    protected function setUp()
    {
        /** @var \PHPUnit_Framework_MockObject_MockObject|Repository\TrancheRepositoryInterface $tranches */
        $this->tranches  = $this->getMockBuilder(Repository\TrancheRepositoryInterface::class)
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
        $service = new MakeInvestment($this->tranches);

        self::assertInstanceOf(MakeInvestmentInterface::class, $service);
    }


    /**
     * @test
     * @group application
     */
    public function itCanBeInvoked()
    {
        $request = new MakeInvestmentRequest('investor', 'tranche', 'amount');

        $service = new MakeInvestment($this->tranches);

        $service($request);
    }
}
