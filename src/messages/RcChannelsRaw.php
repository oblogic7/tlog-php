<?php namespace Oblogic7\Tlog\Messages;

use Oblogic7\Tlog\TimedMessageMilli;

/**
 * Class RcChannelsRaw
 * @package Oblogic7\Tlog\Messages
 */
class RcChannelsRaw extends TimedMessageMilli
{
    /**
     * @var array
     */
    public $chan1_raw;
    /**
     * @var array
     */
    public $chan2_raw;
    /**
     * @var array
     */
    public $chan3_raw;
    /**
     * @var array
     */
    public $chan4_raw;
    /**
     * @var array
     */
    public $chan5_raw;
    /**
     * @var array
     */
    public $chan6_raw;
    /**
     * @var array
     */
    public $chan7_raw;
    /**
     * @var array
     */
    public $chan8_raw;
    /**
     * @var array
     */
    public $port;
    /**
     * @var array
     */
    public $rssi;

    /**
     * RcChannelsRaw constructor.
     * @param $entry
     */
    public function __construct($entry)
    {
        parent::__construct($entry);
        $this->chan1_raw = $this->uint16_t(4, 5);
        $this->chan2_raw = $this->uint16_t(6, 7);
        $this->chan3_raw = $this->uint16_t(8, 9);
        $this->chan4_raw = $this->uint16_t(10, 11);
        $this->chan5_raw = $this->uint16_t(12, 13);
        $this->chan6_raw = $this->uint16_t(14, 15);
        $this->chan7_raw = $this->uint16_t(16, 17);
        $this->chan8_raw = $this->uint16_t(18, 19);
        $this->port      = $this->uint8_t(20);
        $this->rssi      = $this->uint8_t(21);
    }
}