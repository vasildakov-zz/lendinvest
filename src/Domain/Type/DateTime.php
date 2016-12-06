<?php
namespace LendInvest\Domain\Type;

/**
 * Class Money
 *
 * @package LendInvest
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class DateTime implements \JsonSerializable
{
    private $year;

    private $month;

    private $day;

    /**
     * @param [type] $year
     * @param [type] $month
     * @param [type] $day
     */
    public function __construct($year, $month, $day)
    {
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
        return new static(
            $datetime->format('Y'),
            $datetime->format('m'),
            $datetime->format('d')
        );
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
