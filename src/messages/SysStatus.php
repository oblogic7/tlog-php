<?php namespace Oblogic7\Tlog\Messages;

use Oblogic7\Tlog\Message;

class SysStatus extends Message
{
    /**
     * @var array
     */
    public $onboard_control_sensors_present;
    /**
     * @var array
     */
    public $onboard_control_sensors_enabled;
    /**
     * @var array
     */
    public $onboard_control_sensors_health;
    /**
     * @var float Percentage (0-100)
     */
    public $load;
    /**
     * @var float Battery volts
     */
    public $voltage_battery;
    /**
     * @var float Battery current in amps
     */
    public $current_battery;
    /**
     * @var array Percentage (-1 not measured)
     */
    public $battery_remaining;
    /**
     * @var array Percentage (-1 not measured)
     */
    public $drop_rate_comm;
    /**
     * @var array
     */
    public $errors_count1;
    /**
     * @var array
     */
    public $errors_count2;
    /**
     * @var array
     */
    public $errors_count3;
    /**
     * @var array
     */
    public $errors_count4;

    /**
     * SysStatus constructor.
     * @param $entry
     */
    public function __construct($entry)
    {
        parent::__construct($entry);
        $this->onboard_control_sensors_present = $this->uint32_t(0, 3);
        $this->onboard_control_sensors_enabled = $this->uint32_t(4, 7);
        $this->onboard_control_sensors_health  = $this->uint32_t(8, 11);
        $this->load                            = $this->uint16_t(12, 13) / 10;
        $this->voltage_battery                 = $this->uint16_t(14, 15) / 1000;
        $this->current_battery                 = $this->int16_t(16, 17) / 100;
        $this->battery_remaining               = $this->uint8_t(18);
        $this->drop_rate_comm                  = $this->uint16_t(21, 22);
        $this->errors_count1                   = $this->uint16_t(23, 24);
        $this->errors_count2                   = $this->uint16_t(25, 26);
        $this->errors_count3                   = $this->uint16_t(27, 28);
        $this->errors_count4                   = $this->uint16_t(29, 30);

    }
}