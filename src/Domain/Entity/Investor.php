<?php
/**
 * This file is part of the vasildakov/lendinvest project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @copyright Copyright (c) Vasil Dakov <vasildakov@gmail.com>
 * @license http://opensource.org/licenses/MIT MIT
 * @link https://github.com/vasildakov/lendinvest GitHub
 */

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
        $this->wallets     = [];
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
    public function getId() : Uuid
    {
        return $this->id;
    }


    /**
     * @param  Investment $investment
     * @codeCoverageIgnore
     */
    public function invest(Investment $investment)
    {
        $this->investments[] = $investment;
    }


    /**
     * @param Wallet $wallet
     */
    public function addWallet(Wallet $wallet)
    {
        $this->wallets[] = $wallet;
    }


    /**
     * @return Wallet[]
     */
    public function getWallets()
    {
        return $this->wallets;
    }
}
