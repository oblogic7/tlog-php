<?php namespace Oblogic7\Tlog\Messages;

class MessageFactory
{
    public function build($entry)
    {
        $message = null;
//        echo 'Header ID: ' . $entry->header->id . PHP_EOL;

        switch ($entry->header->id) {
            case 0:
                $message = new HeartBeat($entry);
                break;
            case 1:
                $message = new SysStatus($entry);
                break;
            case 21:
                $message = new ParamRequestList($entry);
                break;
            case 22:
                $message = new ParamValue($entry);
                break;
            case 24:
                $message = new GpsRawInt($entry);
                break;
            case 27:
                $message = new RawImu($entry);
                break;
            case 29:
                $message = new ScaledPressure($entry);
                break;
            case 30:
                $message = new Attitude($entry);
                break;
            case 33:
                $message = new GlobalPositionInt($entry);
                break;
            case 35:
                $message = new RcChannelsRaw($entry);
                break;
            case 36:
                $message = new ServoOutputRaw($entry);
                break;
            case 39:
                $message = new MissionItem($entry);
                break;
            case 40:
                $message = new MissionRequest($entry);
                break;
            case 42:
                $message = new MissionCurrent($entry);
                break;
            case 62:
                $message = new NavControllerOutput($entry);
                break;
            case 66:
                $message = new RequestDataStream($entry);
                break;
            case 74:
                $message = new VfrHud($entry);
                break;
            case in_array($entry->header->id, range(150, 240), true):
                $message = new Dummy($entry);
                break;
            case 253:
                $message = new StatusText($entry);
                break;
            default:
                $message = new Dummy($entry);
        }
//        echo get_class($message) . PHP_EOL;

        return $message;
    }
}