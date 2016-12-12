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

namespace LendInvest\Domain\Type;

/**
 * Class Interest
 *
 * @package LendInvest
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class Interest implements InterestInterface
{
    /**
     * @var int $value
     */
    private $value;


    public function __construct($value)
    {
        if (!is_int($value)) {
            throw new \InvalidArgumentException;
        }

        $this->value = $value;
    }


    /**
     * @return int $value
     */
    public function getValue()
    {
        return $this->value;
    }
}
