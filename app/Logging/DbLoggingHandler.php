<?php

namespace App\Logging;

use Monolog\Logger;
use Monolog\Handler\AbstractProcessingHandler;
use Illuminate\Support\Facades\DB;

class DbLoggingHandler extends AbstractProcessingHandler
{
    public function __construct($level = Logger::DEBUG, $bubble = true)
    {
        parent::__construct($level, $bubble);
    }

    protected function write(array $record) : void
    {
        $data = array(
            'message'       => $record['message'],
            'context'       => json_encode($record['context']),
            'level'         => $record['level'],
            'level_name'    => $record['level_name'],
            'channel'       => $record['channel'],
            'record_datetime' => $record['datetime']->format('Y-m-d H:i:s'),
            'extra'         => json_encode($record['extra']),
            'formatted'     => $record['formatted'],
            'remote_addr'   => $_SERVER['REMOTE_ADDR'] ?? null,
            'user_agent'    => $_SERVER['HTTP_USER_AGENT'] ?? null,
            'created_at'    => date("Y-m-d H:i:s"),
        );

        DB::connection()->table('user_action_logs')->insert($data);
    }
}
