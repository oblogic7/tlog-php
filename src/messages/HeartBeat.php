<?php namespace Oblogic7\Tlog\Messages;

use Oblogic7\Tlog\Entry;
use Oblogic7\Tlog\Message;

class HeartBeat extends Message
{
    public $type;
    public $autopilot;
    public $base_mode;
    public $custom_mode;
    public $system_status;
    public $mavlink_version;

    /**
     * HeartBeat constructor.
     * @param \Oblogic7\Tlog\Entry $entry
     */
    public function __construct(Entry $entry)
    {
        parent::__construct($entry);
        $this->type            = $this->uint8_t(0);
        $this->autopilot       = $this->uint8_t(1);
        $this->base_mode       = $this->uint8_t(2);
        $this->custom_mode     = $this->uint32_t(3, 6);
        $this->system_status   = $this->uint8_t(7);
        $this->mavlink_version = $this->uint8_t(8);
    }


}