<?php namespace Oblogic7\Tlog;

class Header
{
    public $magic;
    public $length;
    public $sequence;
    public $system;
    public $component;
    public $id;

    /**
     * Header constructor.
     * @param $rawHeader
     */
    public function __construct($rawHeader)
    {
        $this->magic     = unpack('C', $rawHeader[0])[1];
        $this->length    = unpack('C', $rawHeader[1])[1];
        $this->sequence  = unpack('C', $rawHeader[2])[1];
        $this->system    = unpack('C', $rawHeader[3])[1];
        $this->component = unpack('C', $rawHeader[4])[1];
        $this->id        = unpack('C', $rawHeader[5])[1];
    }


}