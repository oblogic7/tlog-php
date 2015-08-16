<?php namespace Oblogic7\Tlog\Messages;

use Oblogic7\Tlog\Message;

/**
 * Class VfrHud
 * @package Oblogic7\Tlog\Messages
 */
class VfrHud extends Message
{
    /**
     * @var array
     */
    public $airspeed;
    /**
     * @var array
     */
    public $groundspeed;
    /**
     * @var array
     */
    public $heading;
    /**
     * @var array
     */
    public $throttle;
    /**
     * @var array
     */
    public $alt;

    /**
     * VfrHud constructor.
     * @param $entry
     */
    public function __construct($entry)
    {
        parent::__construct($entry);
        $this->airspeed    = $this->float(0, 3);
        $this->groundspeed = $this->float(4, 7);
        $this->heading     = $this->int16_t(8, 9);
        $this->throttle    = $this->uint16_t(10, 11);
        $this->alt         = $this->uint16_t(12, 15);
    }

    /**
     * @param string $unit
     * @return mixed
     */
    public function getAirspeed($unit = 'mps')
    {
        return $this->convert_speed($this->airspeed, $unit);
    }

    /**
     * @param string $unit
     * @return mixed
     */
    public function getGroundspeed($unit = 'mps')
    {
        return $this->convert_speed($this->groundspeed, $unit);
    }

    /**
     * @param $value
     * @param $unit
     * @return mixed
     */
    private function convert_speed($value, $unit)
    {
        switch ($unit) {
            case 'knots':
                return $value * 1.9438444924406;
                break;

            case 'mph':
                return $value * 2.2369362920544025;
                break;

            case 'kph':
                return $value * 3.6;
                break;

            case 'mps':
            default:
                return $value;
                break;
        }
    }
}