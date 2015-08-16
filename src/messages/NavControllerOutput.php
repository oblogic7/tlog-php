<?php namespace Oblogic7\Tlog\Messages;

use Oblogic7\Tlog\Message;

/**
 * Class NavControllerOutput
 * @package Oblogic7\Tlog\Messages
 */
class NavControllerOutput extends Message
{
    /**
     * @var array
     */
    public $nav_roll;
    /**
     * @var array
     */
    public $nav_pitch;
    /**
     * @var array
     */
    public $alt_error;
    /**
     * @var array
     */
    public $aspd_error;
    /**
     * @var array
     */
    public $xtrack_error;
    /**
     * @var array
     */
    public $nav_bearing;
    /**
     * @var array
     */
    public $target_bearing;
    /**
     * @var array
     */
    public $wp_dist;

    /**
     * NavControllerOutput constructor.
     * @param $entry
     */
    public function __construct($entry)
    {
        parent::__construct($entry);
        $this->nav_roll       = $this->float(0, 3);
        $this->nav_pitch      = $this->float(4, 7);
        $this->alt_error      = $this->float(8, 11);
        $this->aspd_error     = $this->float(12, 15);
        $this->xtrack_error   = $this->float(16, 19);
        $this->nav_bearing    = $this->int16_t(20, 21);
        $this->target_bearing = $this->int16_t(22, 23);
        $this->wp_dist        = $this->uint16_t(24, 25);
    }
}