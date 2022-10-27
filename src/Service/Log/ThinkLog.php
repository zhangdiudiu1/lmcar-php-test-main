<?php

namespace App\Service\Log;
use think\facade\Log;
class ThinkLog implements LogInterface
{
    public function __construct()
    {
        $config = [
            'default'	=>	'file',
            'channels'	=>	[
                'file'	=>	[
                    'type'	=>	'file',
                    'path'	=>	'./logs/',
                ],
            ],
        ];
        Log::init($config);
    }

    public function info($message = '')
    {
        Log::info($message);
        Log::save();
    }

    public function debug($message = '')
    {
        Log::debug($message);
        Log::save();
    }

    public function error($message = '')
    {
        Log::error($message);
        Log::save();
    }
}