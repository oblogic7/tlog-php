<?php namespace Oblogic7\Tlog\Messages;

use Oblogic7\Tlog\Message;

class StatusText extends Message
{

    /**
     * StatusText constructor.
     * @param $entry
     */
    public function __construct($entry)
    {
        parent::__construct($entry);
        $this->severity = $this->uint8_t(0);
        $this->text     = $this->uint8_t(1, 50);
    }
}