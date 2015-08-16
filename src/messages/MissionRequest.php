<?php namespace Oblogic7\Tlog\Messages;

use Oblogic7\Tlog\Message;

/**
 * Class MissionRequest
 * @package Oblogic7\Tlog\Messages
 */
class MissionRequest extends Message
{
    /**
     * @var array
     */
    public $seq;
    /**
     * @var array
     */
    public $target_system;
    /**
     * @var array
     */
    public $target_component;

    /**
     * MissionRequest constructor.
     * @param $entry
     */
    public function __construct($entry)
    {
        parent::__construct($entry);
        $this->seq              = $this->uint16_t(0, 1);
        $this->target_system    = $this->uint8_t(2);
        $this->target_component = $this->uint8_t(3);
    }
}