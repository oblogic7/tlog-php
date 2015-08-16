<?php namespace Oblogic7\Tlog\Messages;

use Oblogic7\Tlog\TimedMessageMilli;

/**
 * Class Attitude
 * @package Oblogic7\Tlog\Messages
 */
class Attitude extends TimedMessageMilli
{
    /**
     * @var array radians (negative pi - pi)
     */
    public $roll;
    /**
     * @var array radians (negative pi - pi)
     */
    public $pitch;
    /**
     * @var array radians (negative pi - pi)
     */
    public $yaw;
    /**
     * @var array rad/s
     */
    public $rollspeet;
    /**
     * @var array rad/s
     */
    public $pitchspeed;
    /**
     * @var array rad/s
     */
    public $yawspeed;

    /**
     * Attitude constructor.
     * @param $entry
     */
    public function __construct($entry)
    {
        parent::__construct($entry);
        $this->roll       = $this->float(0, 3);
        $this->pitch      = $this->float(4, 7);
        $this->yaw        = $this->float(8, 11);
        $this->rollspeet  = $this->float(12, 15);
        $this->pitchspeed = $this->float(16, 19);
        $this->yawspeed   = $this->float(20, 23);
    }
}