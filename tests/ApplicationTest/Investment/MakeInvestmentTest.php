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
    private $id;

    private $tranches;

    private $loan;

    protected function setUp()
    {
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