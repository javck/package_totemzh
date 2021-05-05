<?php

return [
    'frequencies'  => [
        [
            'label'             => '每分鐘',
            'interval'          => 'everyMinute',
            'parameters'        => false,
        ],
        [
            'label'             => '每5分鐘',
            'interval'          => 'everyFiveMinutes',
            'parameters'        => false,
        ],
        [
            'label'             => '每10分鐘',
            'interval'          => 'everyTenMinutes',
            'parameters'        => false,
        ],
        [
            'label'             => '每30分鐘',
            'interval'          => 'everyThirtyMinutes',
            'parameters'        => false,
        ],
        [
            'label'             => '每小時',
            'interval'          => 'hourly',
            'parameters'        => false,
        ],
        [
            'label'             => '於某時',
            'interval'          => 'hourlyAt',
            'parameters'        => [
                [
                    'label'         => 'at',
                    'name'          => 'at',
                    'type'          => 'number',
                    'min'           => '0',
                    'max'           => '59',
                ],
            ],
        ],
        [
            'label'             => '每日',
            'interval'          => 'daily',
            'parameters'        => false,
        ],
        [
            'label'             => '於某日',
            'interval'          => 'dailyAt',
            'parameters'        => [
                [
                    'label'         => 'at',
                    'name'          => 'at',
                    'type'          => 'time',
                ],
            ],
        ],
        [
            'label'             => '於某兩日',
            'interval'          => 'twiceDaily',
            'parameters'        => [
                [
                    'label'         => '日子一',
                    'name'          => 'at',
                    'type'          => 'time',
                ],
                [
                    'label'         => '日子二',
                    'name'          => 'second_at',
                    'type'          => 'time',
                ],
            ],
        ],
        [
            'label'             => '每週',
            'interval'          => 'weekly',
            'parameters'        => false,
        ],
        [
            'label'             => '於某一週',
            'interval'          => 'weeklyOn',
            'parameters'        => [
                [
                    'label'         => 'On',
                    'name'          => 'on',
                    'type'          => 'number',
                    'min'           => '1',
                    'max'           => '31',
                ],
                [
                    'label'         => 'At',
                    'name'          => 'at',
                    'type'          => 'time',
                ],
            ],
        ],
        [
            'label'             => '每個月',
            'interval'          => 'monthly',
            'parameters'        => false,
        ],
        [
            'label'             => '某個月',
            'interval'          => 'monthlyOn',
            'parameters'        => [
                [
                    'label'         => 'On',
                    'name'          => 'on',
                    'type'          => 'number',
                    'max'           => '',
                ],
                [
                    'label'         => 'At',
                    'name'          => 'at',
                    'type'          => 'time',
                ],
            ],
        ],
        [
            'label'             => '某兩個月',
            'interval'          => 'twiceMonthly',
            'parameters'        => [
                [
                    'label'         => '月份一',
                    'name'          => 'on',
                    'type'          => 'number',
                ],
                [
                    'label'         => '月份二',
                    'name'          => 'second_at',
                    'type'          => 'text',
                ],
            ],
        ],
        [
            'label'             => '每季',
            'interval'          => 'quarterly',
            'parameters'        => false,
        ],
        [
            'label'             => '每年',
            'interval'          => 'yearly',
            'parameters'        => false,
        ],
        [
            'label'             => '平日',
            'interval'          => 'weekdays',
            'parameters'        => false,
        ],
        [
            'label'             => '每周日',
            'interval'          => 'sundays',
            'parameters'        => false,
        ],
        [
            'label'             => '每週一',
            'interval'          => 'mondays',
            'parameters'        => false,
        ],
        [
            'label'             => '每週二',
            'interval'          => 'tuesdays',
            'parameters'        => false,
        ],
        [
            'label'             => '每週三',
            'interval'          => 'wednesdays',
            'parameters'        => false,
        ],
        [
            'label'             => '每週四',
            'interval'          => 'thursdays',
            'parameters'        => false,
        ],
        [
            'label'             => '每週五',
            'interval'          => 'fridays',
            'parameters'        => false,
        ],
        [
            'label'             => '每週六',
            'interval'          => 'saturdays',
            'parameters'        => false,
        ],
        [
            'label'             => '介於',
            'interval'          => 'between',
            'parameters'        => [
                [
                    'label'         => 'Start',
                    'name'          => 'start',
                    'type'          => 'time',
                ],
                [
                    'label'         => 'End',
                    'name'          => 'end',
                    'type'          => 'time',
                ],
            ],
        ],
        [
            'label'             => '除了介於',
            'interval'          => 'unlessBetween',
            'parameters'        => [
                [
                    'label'         => 'Start',
                    'name'          => 'start',
                    'type'          => 'time',
                ],
                [
                    'label'         => 'End',
                    'name'          => 'end',
                    'type'          => 'time',
                ],
            ],
        ],
    ],
    'web' => [
        'middleware' => env('TOTEM_WEB_MIDDLEWARE', 'web'),
        'route_prefix' => env('TOTEM_WEB_ROUTE_PREFIX', 'totem'),
    ],
    'api' => [
        'middleware' => env('TOTEM_API_MIDDLEWARE', 'api'),
    ],
    'table_prefix' => env('TOTEM_TABLE_PREFIX', ''),
    'artisan' => [
        'command_filter' => [],
        'whitelist' => true,
    ],
    'database_connection' => env('TOTEM_DATABASE_CONNECTION'),

    'broadcasting' => [
        'enabled' => env('TOTEM_BROADCASTING_ENABLED', true),
        'channel' => env('TOTEM_BROADCASTING_CHANNEL', 'task.events'),
    ],

    'log_folder' => env('TOTEM_LOG_FOLDER', 'totem'),
];
