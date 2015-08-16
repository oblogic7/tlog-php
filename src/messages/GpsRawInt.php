<?php namespace Oblogic7\Tlog\Messages;

use Oblogic7\Tlog\TimedMessageMicro;

/**
 * Class GpsRawInt
 * @package Oblogic7\Tlog\Messages
 */
class GpsRawInt extends TimedMessageMicro
{
    /**
     * @var float WGS84 dec. degrees
     */
    public $lat;
    /**
     * @var float WGS84 dec. degrees
     */
    public $lon;
    /**
     * @var float Altitude in meters
     */
    public $alt;
    /**
     * @var float meters
     */
    public $eph;
    /**
     * @var float meters
     */
    public $evp;
    /**
     * @var float mps
     */
    public $vel;
    /**
     * @var float degrees 0..359.99
     */
    public $cog;
    /**
     * @var array
     *
     * 0-1: no fix
     *   2: 2D fix
     *   3: 3D fix
     */
    public $fix_type;
    /**
     * @var array
     */
    public $satellites_visible;

    /**
     * GpsRawInt constructor.
     * @param $entry
     */
    public function __construct($entry)
    {
        parent::__construct($entry);
        $this->lat                = $this->int32_t(8, 11) / 10000000;
        $this->lon                = $this->int32_t(12, 15) / 10000000;
        $this->alt                = $this->int32_t(16, 19) / 1000;
        $this->eph                = $this->uint16_t(20, 21) / 100;
        $this->evp                = $this->uint16_t(22, 23) / 100;
        $this->vel                = $this->uint16_t(24, 25) / 100;
        $this->cog                = $this->uint16_t(26, 27) / 100;
        $this->fix_type           = $this->uint8_t(28);
        $this->satellites_visible = $this->uint8_t(29);
    }

    /**
     * @param $unit
     * @return mixed
     */
    public function getVelocity($unit)
    {
        return $this->convertSpeed($this->vel, $unit);
    }

    /**
     * @param $value
     * @param string $unit
     * @return mixed
     */
    private function convertSpeed($value, $unit = 'mps')
    {
        switch ($unit) {
            case 'knots':
                return $value * 1.9438444924406;
            case 'mph':
                return $value * 2.2369362920544025;
            case 'kph':
                return $value * 3.6;
            default:
                return $value;
        }
    }
}