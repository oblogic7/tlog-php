<?php namespace Oblogic7\Tlog\Messages;

use Oblogic7\Tlog\TimedMessageMicro;

class RawImu extends TimedMessageMicro
{
    public $xacc;
    public $yacc;
    public $zacc;
    public $xgyro;
    public $ygyro;
    public $zgyro;
    public $xmag;
    public $ymag;
    public $zmag;

    /**
     * RawImu constructor.
     * @param $entry
     */
    public function __construct($entry)
    {
        parent::__construct($entry);
        $this->xacc  = $this->int16_t(8, 9);
        $this->yacc  = $this->int16_t(10, 11);
        $this->zacc  = $this->int16_t(12, 13);
        $this->xgyro = $this->int16_t(14, 15);
        $this->ygyro = $this->int16_t(16, 17);
        $this->zgyro = $this->int16_t(18, 19);
        $this->xmag  = $this->int16_t(20, 21);
        $this->ymag  = $this->int16_t(22, 23);
        $this->zmag  = $this->int16_t(24, 25);
    }
}