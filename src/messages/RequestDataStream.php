<?php namespace Oblogic7\Tlog\Messages;

use Oblogic7\Tlog\Message;

/**
 * Class RequestDataStream
 * @package Oblogic7\Tlog\Messages
 */
class RequestDataStream extends Message
{
    /**
     * @var array
     */
    public $req_message_rate;
    /**
     * @var array
     */
    public $target_system;
    /**
     * @var array
     */
    public $target_component;
    /**
     * @var array
     */
    public $req_stream_id;
    /**
     * @var array
     */
    public $start_stop;

    /**
     * RequestDataStream constructor.
     * @param $entry
     */
    public function __construct($entry)
    {
        parent::__construct($entry);
        $this->req_message_rate = $this->uint16_t(0, 1);
        $this->target_system    = $this->uint8_t(2);
        $this->target_component = $this->uint8_t(3);
        $this->req_stream_id    = $this->uint8_t(4);
        $this->start_stop       = $this->uint8_t(5);
    }
}