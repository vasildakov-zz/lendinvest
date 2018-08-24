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

declare(strict_types=1);

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
     * @var Email $email
     */
    private $email;

    /**
     * @var Address $address
     */
    private $address;


    /**
     * @var WalletInterface[] $wallets
     */
    private $wallets;


    /**
     * @var InvestmentInterface[] $investments
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
     * @return Investor
     */
    private function setId(Uuid $id) : Investor
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
     * @param  InvestmentInterface $investment
     * @codeCoverageIgnore
     */
    public function invest(InvestmentInterface $investment)
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
     * @return WalletInterface[]
     */
    public function getWallets()
    {
        return $this->wallets;
    }
}
