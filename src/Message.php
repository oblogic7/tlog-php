<?php namespace Oblogic7\Tlog;

/**
 * Class Message
 * @package Oblogic7\Tlog
 */
class Message
{
    /**
     * @var Entry
     */
    private $entry;

    /**
     * @param Entry $entry
     */
    public function __construct(Entry $entry)
    {
        $this->entry = $entry;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->entry->header->id;
    }

    /**
     * @return mixed
     */
    public function getCRC()
    {
        return $this->entry->crc;
    }

    /**
     * @param $from
     * @param $to
     * @return array
     */
    protected function float($from, $to = null)
    {
        return $this->unpack('f', $from, $to);
    }

    /**
     * @param $from
     * @param $to
     * @return array
     */
    protected function int8_t($from, $to = null)
    {
        return $this->unpack('c', $from, $to);
    }

    /**
     * @param $from
     * @param $to
     * @return array
     */
    protected function uint8_t($from, $to = null)
    {
        return $this->unpack('C', $from, $to);
    }

    /**
     * @param $from
     * @param $to
     * @return array
     */
    protected function int16_t($from, $to = null)
    {
        return $this->unpack('s', $from, $to);
    }

    /**
     * @param $from
     * @param $to
     * @return array
     */
    protected function uint16_t($from, $to = null)
    {
        return $this->unpack('v', $from, $to);
    }

    /**
     * @param $from
     * @param $to
     * @return array
     */
    protected function int32_t($from, $to = null)
    {
        return $this->unpack('l', $from, $to);
    }

    /**
     * @param $from
     * @param $to
     * @return array
     */
    protected function uint32_t($from, $to = null)
    {
        return $this->unpack('V', $from, $to);
    }

    /**
     * @param $from
     * @param $to
     * @return array
     */
    protected function uint64_t($from, $to = null)
    {
        return $this->unpack('P', $from, $to);
    }

    /**
     * @param $from
     * @param $to
     * @return array
     */
    protected function string($from, $to = null)
    {
        return $this->unpack('a', $from, $to);
    }

    /**
     * @param $format
     * @param $from
     * @param int $to
     * @param int $index
     * @return array
     */
    private function unpack($format, $from, $to = null, $index = 1)
    {

        $payload = $this->entry->payload;

        echo "Byte(s): $from $to" . PHP_EOL;

        if ($to !== null && is_numeric($to)) {
            $to -= $from;
            $to++;
        } else {
            $to = $from + 1;
        }
        $range = substr($payload, $from, $to);
        return unpack($format, $range)[$index];
    }
}

/**
 * Class TimedMessageMilli
 * @package Oblogic7\Tlog
 */
class TimedMessageMilli extends Message
{
    /**
     * @var
     */
    public $time_boot_ms;

    /**
     * @param $time_boot_ms
     */
    public function __construct($entry)
    {
        parent::__construct($entry);
        $this->time_boot_ms = $this->uint64_t(0, 7);
    }
}

/**
 * Class TimedMessageMicro
 * @package Oblogic7\Tlog
 */
class TimedMessageMicro extends Message
{
    /**
     * @var
     */
    public $time_usec;

    /**
     * @param $time_usec
     */
    public function __construct($entry)
    {
        parent::__construct($entry);
        $this->time_usec = $this->uint64_t(0, 7);
    }


}