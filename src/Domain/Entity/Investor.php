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
use LendInvest\Domain\Type\UuidInterface;

/**
 * Investor
 *
 * @package LendInvest
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class Investor implements InvestorInterface
{
    /**
     * @var UuidInterface $id
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
     * Investor constructor.
     * @param UuidInterface $id
     * @param string $name
     */
    public function __construct(UuidInterface $id, string $name)
    {
        $this->setId($id);
        $this->setName($name);

        $this->investments = [];
        $this->wallets     = [];
    }

    /**
     * @param UuidInterface $id
     * @return InvestorInterface
     */
    private function setId(UuidInterface $id) : InvestorInterface
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return Uuid $id
     */
    public function getId() : UuidInterface
    {
        return $this->id;
    }


    private function setName(string $name)
    {
        $this->name = $name;
    }


    public function getName() : string
    {
        return $this->name;
    }

    /**
     * @param  InvestmentInterface $investment
     */
    public function invest(InvestmentInterface $investment)
    {
        $this->investments[] = $investment;
    }

    /**
     * @param WalletInterface $wallet
     */
    public function addWallet(WalletInterface $wallet)
    {
        $this->wallets[] = $wallet;
    }

    /**
     * @return WalletInterface[]
     */
    public function getWallets() : array
    {
        return $this->wallets;
    }
}
