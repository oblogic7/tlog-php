<?php namespace Oblogic7\Tlog\Messages;

use Oblogic7\Tlog\Message;

/**
 * Class ParamRequestList
 * @package Oblogic7\Tlog\Messages
 */
class ParamRequestList extends Message
{
    /**
     * @var array
     */
    public $target_system;
    /**
     * @var array
     */
    public $target_component;

    /**
     * ParamRequestList constructor.
     * @param $entry
     */
    public function __construct($entry)
    {
        parent::__construct($entry);
        $this->target_system = $this->uint8_t(0);
        $this->target_component = $this->uint8_t(1);
    }
}