<?php

class FileTestCest
{
    public function _before()
    {
    }

    public function _after()
    {
    }

    // tests
    public function canBeInstantiated()
    {
        $file = new \Oblogic7\Tlog\File('tests/_data/2013-10-13 16-58-51.tlog');

        PHPUnit_Framework_Assert::assertAttributeCount(16187, 'messages', $file);
        PHPUnit_Framework_Assert::assertAttributeCount(16187, 'entries', $file);
    }
}
