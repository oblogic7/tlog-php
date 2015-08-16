<?php namespace Oblogic7\Tlog\Messages;

use Oblogic7\Tlog\Message;

/**
 * Class ParamValue
 * @package Oblogic7\Tlog\Messages
 */
class ParamValue extends Message
{
    /**
     * @var array
     */
    public $param_value;
    /**
     * @var array
     */
    public $param_count;
    /**
     * @var array
     */
    public $param_index;
    /**
     * @var array
     */
    public $param_id;
    /**
     * @var array
     */
    public $param_type;

    /**
     * ParamValue constructor.
     * @param $entry
     */
    public function __construct($entry)
    {
        parent::__construct($entry);
        $this->param_value = $this->float(0, 3);
        $this->param_count = $this->uint16_t(4, 5);
        $this->param_index = $this->uint16_t(6, 7);
        $this->param_id    = $this->string(8, 23);
        $this->param_type  = $this->uint8_t(24);
    }
}