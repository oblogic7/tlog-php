<?php namespace Oblogic7\Tlog\Messages;

use Oblogic7\Tlog\Message;

class Dummy extends Message
{
    public function __construct($entry) {
        parent::__construct($entry);
    }
}