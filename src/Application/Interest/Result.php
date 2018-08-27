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

namespace LendInvest\Application\Interest;

class Result implements \JsonSerializable
{
    private $investor;

    private $earn;

    public function __construct(string $investor, float $earn)
    {
        $this->investor = $investor;
        $this->earn = $earn;
    }

    public function toArray() : array
    {
        return [
            'investor' => $this->investor,
            'earn' => $this->earn,
        ];
    }

    public function jsonSerialize()
    {
        return $this->toArray();
    }
}
