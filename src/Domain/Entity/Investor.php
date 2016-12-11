<?php
namespace LendInvest\Domain\Entity;

use LendInvest\Domain\Type\Uuid;
use LendInvest\Domain\Entity\Wallet;
use LendInvest\Domain\Entity\Investment;

/**
 * Investor
 *
 * @package LendInvest
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class Investor implements InvestorInterface
{

    /**
     * @var \Lendinvest\Domain\Type\Uuid $id
     */
    private $id;

    /**
     * @var string $name
     */
    private $name;


    /**
     * @var string $surname
     */
    private $surname;

    /**
     * @var \Lendinvest\Domain\Type\Email $email
     */
    private $email;

    /**
     * @var \Lendinvest\Domain\Type\Address $address
     */
    private $address;


    /**
     * @var \Lendinvest\Domain\Entit\Wallet[] $wallets
     */
    private $wallets;


    /**
     * @var \Lendinvest\Domain\Entit\Investment[] $investments
     */
    private $investments;


    /**
     * @param Uuid $id
     */
    public function __construct(Uuid $id)
    {
        $this->setId($id);

        $this->investments = [];
        $this->wallets = [];
    }


    /**
     * @param Uuid $id
     */
    private function setId(Uuid $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return Uuid $id
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * @param  Investment $investment
     */
    public function invest(Investment $investment)
    {
        // new Investment($id, $investor, $tranche, $amount)
        $this->investments[] = $investment;
    }



    /**
     * @param Wallet $wallet
     */
    public function addWallet(Wallet $wallet)
    {
        $this->wallets[] = $wallet;

        return $this;
    }

    /**
     * @param Wallets[]
     */
    public function getWallets()
    {
        return $this->wallets;
    }
}
