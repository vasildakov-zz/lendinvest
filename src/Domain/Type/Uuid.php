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
 * Class Uuid
 *
 * Generates pseudo-random uuid
 */
class Uuid implements UuidInterface
{
    /**
     * Matches Uuid's versions 1 to 5.
     */
    const REGEX_UUID = '/^[0-9A-Fa-f]{8}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{12}$/';

    /**
     * @var string $value
     */
    private $value;

    /**
     * @param string $value A valid uuid string
     */
    public function __construct($value)
    {
        if (!\preg_match(self::REGEX_UUID, $value)) {
            throw new \InvalidArgumentException;
        }

        $value = $this->value;
    }

    /**
     * Generates pseudo-random uuid version 4
     *
     * @return static
     */
    public static function uuid4()
    {
        $uuid = sprintf(
            '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0x0fff) | 0x4000,
            mt_rand(0, 0x3fff) | 0x8000,
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff)
        );

        return new static($uuid);
    }

    public function __toString()
    {
        return \strval($this->value);
    }
}
