<?php namespace Oblogic7\Tlog\Messages;

use Oblogic7\Tlog\TimedMessageMilli;

/**
 * Class GlobalPositionInt
 * @package Oblogic7\Tlog\Messages
 */
class GlobalPositionInt extends TimedMessageMilli
{
    /**
     * @var float dec. degrees
     */
    public $lat;
    /**
     * @var float dec. degrees
     */
    public $lon;
    /**
     * @var float meters
     */
    public $alt;
    /**
     * @var float meters
     */
    public $relative_alt;
    /**
     * @var float m/s
     */
    public $vx;
    /**
     * @var float m/s
     */
    public $vy;
    /**
     * @var float m/s
     */
    public $vz;
    /**
     * @var float degrees (0.0 - 359.99) (0xFFFF if unknown)
     */
    public $hdg;

    /**
     * GlobalPositionInt constructor.
     * @param $entry
     */
    public function __construct($entry)
    {
        parent::__construct($entry);
        $this->lat          = $this->int32_t(4, 7) / 10000000;
        $this->lon          = $this->int32_t(8, 11) / 10000000;
        $this->alt          = $this->int32_t(12, 15) / 1000;
        $this->relative_alt = $this->int32_t(16, 19) / 1000;
        $this->vx           = $this->int16_t(20, 21) / 100;
        $this->vy           = $this->int16_t(22, 23) / 100;
        $this->vz           = $this->int16_t(24, 25) / 100;
        $this->hdg          = $this->uint16_t(26, 27) / 100;
    }
}