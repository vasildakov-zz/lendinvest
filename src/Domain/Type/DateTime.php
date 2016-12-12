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
 * Class DateTime
 *
 * @package LendInvest
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class DateTime implements \JsonSerializable
{
    const DATE_YMD = "/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/";

    private $year;

    private $month;

    private $day;

    /**
     * @param [type] $year
     * @param [type] $month
     * @param [type] $day
     */
    //public function __construct(Year $year, Month $month, Day $day)
    public function __construct($year, $month, $day)
    {
        if (!isset($year) || !isset($month) || !isset($day)) {
            throw new \InvalidArgumentException();
        }

        $this->year  = $year;
        $this->month = $month;
        $this->day   = $day;
    }


    /**
     * @param  \DateTime $datetime
     * @return static
     */
    public static function fromDateTime(\DateTime $datetime)
    {
        list($year, $month, $date) = explode("-", $datetime->format('Y-m-d'));

        return new static($year, $month, $date);
    }


    /**
     * @param  string $datetime in format Y-m-d
     * @return static
     */
    public static function fromString(string $string)
    {
        if (!preg_match(self::DATE_YMD, $string)) {
            throw new \InvalidArgumentException();
        }

        list($year, $month, $date) = explode("-", $string);

        return new static($year, $month, $date);
    }


    public function year()
    {
        return $this->year;
    }

    public function month()
    {
        return $this->month;
    }

    public function day()
    {
        return $this->day;
    }

    /**
     * Returns string in format Y-m-d
     * @return string
     */
    public function __toString()
    {
        return sprintf('%s-%s-%s', $this->year, $this->month, $this->day);
    }

    public function jsonSerialize()
    {
        return [
            'year'  => $this->year(),
            'month' => $this->month(),
            'day'   => $this->day(),
        ];
    }
}
