<?php namespace Oblogic7\Tlog;

use Oblogic7\Tlog\Messages\MessageFactory;

class File
{
    private $entries = [];

    private $messages = [];
    private $startTime;
    private $endTime;

    /**
     * File constructor.
     * @param $uri String File path or URL
     * @throws \ErrorException
     * @throws \Exception
     */
    public function __construct($uri)
    {
        try {

            $this->messageFactory = new MessageFactory();

            $file = new \SplFileObject($uri, 'rb');

            while ($file->valid()) {
                $raw_time = $file->fread(8);

                if (!$raw_time) {
                    break;
                }

                $header = new Header($file->fread(6));

                if ($header->magic !== 0xFE) {
                    throw new \ErrorException("Unexpected magic number ($header->magic)");
                }

                $payload = $file->fread($header->length);
                $raw_crc = $file->fread(2);

                $entry            = new Entry($raw_time, $header, $payload, $raw_crc);
                $this->entries[]  = $entry;
                $this->messages[] = $this->messageFactory->build($entry);

            }

            if (!$this->hasEntries()) {
                throw new \ErrorException('No entries found in file.');
            }

            $this->startTime = $this->entries[0]->time;
            $this->endTime   = end($this->entries)->time;
        } catch (\Exception $ex) {
//            echo $ex->getMessage() . ' ' . $ex->getFile() . ':' . $ex->getLine();
            die;
        }

    }

    public function getDuration()
    {
        return $this->endTime - $this->startTime;
    }

    public function getStartTime()
    {
        return $this->startTime;
    }

    public function getEndTime()
    {
        return $this->endTime;
    }

    public function getEntries()
    {
        return $this->entries;
    }

    public function getMessages()
    {
        return $this->messages;
    }

    private function hasEntries()
    {
        return count($this->entries) !== 0;
    }


}