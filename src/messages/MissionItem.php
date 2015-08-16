<?php namespace Oblogic7\Tlog\Messages;

use Oblogic7\Tlog\Message;

/**
 * Class MissionItem
 * @package Oblogic7\Tlog\Messages
 */
class MissionItem extends Message
{
    /**
     * @var array
     */
    public $param1;
    /**
     * @var array
     */
    public $param2;
    /**
     * @var array
     */
    public $param3;
    /**
     * @var array
     */
    public $param4;
    /**
     * @var array
     */
    public $x;
    /**
     * @var array
     */
    public $y;
    /**
     * @var array
     */
    public $z;
    /**
     * @var array
     */
    public $seq;
    /**
     * @var array
     */
    public $command;
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
    public $frame;
    /**
     * @var bool
     */
    public $current;
    /**
     * @var bool
     */
    public $autocontinue;

    /**
     * MissionItem constructor.
     * @param $entry
     */
    public function __construct($entry)
    {
        parent::__construct($entry);
        $this->param1           = $this->float(0, 3);
        $this->param2           = $this->float(4, 7);
        $this->param3           = $this->float(8, 11);
        $this->param4           = $this->float(12, 15);
        $this->x                = $this->float(16, 19);
        $this->y                = $this->float(20, 23);
        $this->z                = $this->float(24, 27);
        $this->seq              = $this->uint16_t(28, 29);
        $this->command          = $this->uint16_t(30, 31);
        $this->target_system    = $this->uint8_t(32);
        $this->target_component = $this->uint8_t(33);
        $this->frame            = $this->uint8_t(34);
        $this->current          = !! $this->uint8_t(35);
        $this->autocontinue     = !! $this->uint8_t(36);
    }
}