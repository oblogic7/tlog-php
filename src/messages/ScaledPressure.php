<?php namespace Oblogic7\Tlog\Messages;

use Oblogic7\Tlog\TimedMessageMilli;

/**
 * Class ScaledPressure
 * @package Oblogic7\Tlog\Messages
 */
class ScaledPressure extends TimedMessageMilli
{
    /**
     * @var array absolute pressure (hectopascal)
     */
    public $press_abs;
    /**
     * @var array differential pressure (hectopascal)
     */
    public $press_diff;
    /**
     * @var float temperature (C)
     */
    public $temperature;

    /**
     * ScaledPressure constructor.
     * @param $entry
     */
    public function __construct($entry)
    {
        parent::__construct($entry);
        $this->press_abs = $this->float(4, 7);
        $this->press_diff = $this->float(8, 11);
        $this->temperature = $this->int16_t(12, 13) / 100;
    }

    /**
     * @param string $unit
     * @return float
     */
    public function getTemperature($unit = 'C') {
        switch ($unit) {
            case 'F':
                return ($this->temperature * (9/5)) + 32;
            case 'C':
            default:
                return $this->temperature;
        }
    }
}