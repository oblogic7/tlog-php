<?php namespace Oblogic7\Tlog;

class Entry
{
    public $time;
    public $header;
    public $payload;
    public $crc;

    /**
     * Entry constructor.
     * @param $raw_time
     * @param $header
     * @param $payload
     * @param $raw_crc
     */

    public function __construct($raw_time, $header, $payload, $raw_crc)
    {
        $this->time    = $this->to_time($raw_time);
        $this->header  = $header;
        $this->payload = $payload;
        $this->crc = unpack('S', $raw_crc)[1];
    }

    private function to_time($raw)
    {
        $unpacked = unpack('J', $raw)[1];
        if ($unpacked > 32) {
            $time = $unpacked;
        } else {
            $time = unpack('L', substr(4, 4))[1];
        }

        return $time;
    }

}