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

/**
 * Interface InvestorInterface
 *
 * @package LendInvest
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
interface InvestorInterface
{
    /**
     * @return Uuid
     */
    public function getId() : Uuid;

    /**
     * @return void
     */
    public function addWallet(Wallet $wallet);

    /**
     * @return Wallet[]
     */
    public function getWallets();

    /**
     * @param InvestmentInterface $investment
     * @return mixed
     */
    public function invest(InvestmentInterface $investment);
}
