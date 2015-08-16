<?php namespace Oblogic7\Tlog\Messages;

use Oblogic7\Tlog\TimedMessageMicro;

/**
 * Class ServoOutputRaw
 * @package Oblogic7\Tlog\Messages
 */
class ServoOutputRaw extends TimedMessageMicro
{
    /**
     * @var array
     */
    public $servo1_raw;
    /**
     * @var array
     */
    public $servo2_raw;
    /**
     * @var array
     */
    public $servo3_raw;
    /**
     * @var array
     */
    public $servo4_raw;
    /**
     * @var array
     */
    public $servo5_raw;
    /**
     * @var array
     */
    public $servo6_raw;
    /**
     * @var array
     */
    public $servo7_raw;
    /**
     * @var array
     */
    public $servo8_raw;
    /**
     * @var array
     */
    public $port;

    /**
     * ServoOutputRaw constructor.
     * @param $entry
     */
    public function __construct($entry)
    {
        parent::__construct($entry);
        $this->servo1_raw = $this->uint16_t(4, 5);
        $this->servo2_raw = $this->uint16_t(6, 7);
        $this->servo3_raw = $this->uint16_t(8, 9);
        $this->servo4_raw = $this->uint16_t(10, 11);
        $this->servo5_raw = $this->uint16_t(12, 13);
        $this->servo6_raw = $this->uint16_t(14, 15);
        $this->servo7_raw = $this->uint16_t(16, 17);
        $this->servo8_raw = $this->uint16_t(18, 19);
        $this->port       = $this->uint8_t(20);
    }
}