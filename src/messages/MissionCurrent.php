<?php namespace Oblogic7\Tlog\Messages;

use Oblogic7\Tlog\Message;

/**
 * Class MissionCurrent
 * @package Oblogic7\Tlog\Messages
 */
class MissionCurrent extends Message
{
    /**
     * @var array
     */
    public $seq;

    /**
     * MissionCurrent constructor.
     * @param $entry
     */
    public function __construct($entry)
    {
        parent::__construct($entry);
        $this->seq = $this->uint16_t(0, 1);
    }
}