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

use Lendinvest\Domain\Type\Uuid;
use Lendinvest\Domain\Type\Money;
use Lendinvest\Domain\Type\Currency;
use Lendinvest\Domain\Entity\Investor;

/**
 * Interface WalletInterface
 *
 * @package LendInvest
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
interface WalletInterface
{
    /**
     * @return Uuid
     */
    public function getId() : Uuid;

    /**
     * @return Investor
     */
    public function getInvestor() : Investor;

    /**
     * @return Currency
     */
    public function getCurrency() : Currency;

    /**
     * @param Money
     */
    public function deposit(Money $amount);

    /**
     * @param Money
     */
    public function withdraw(Money $amount);

    /**
     * @return Money
     */
    public function getBalance() : Money;
}
