<?php

return [

    'backup' => [
        'name' => env('APP_NAME', 'laravel-backup'),

        'source' => [
            'files' => [
                'include' => [
                    // Base path se puede incluir si se desea respaldar más archivos
                    // base_path(),
                ],
                'exclude' => [
                    base_path('vendor'),
                    base_path('node_modules'),
                ],
                'follow_links' => false,
                'ignore_unreadable_directories' => false,
                'relative_path' => null,
            ],
            'databases' => ['mysql'],
        ],

        'database_dump_compressor' => null,
        'database_dump_file_extension' => '',

        'destination' => [
            'filesystem' => 'local',
            'path' => 'backups', // Ruta de almacenamiento de los respaldos
        ],

        'temporary_directory' => storage_path('app/backup-temp'),

        'password' => env('BACKUP_ARCHIVE_PASSWORD'),
        'encryption' => 'default',
    ],

    'notifications' => [
        'notifications' => [
            \Spatie\Backup\Notifications\Notifications\BackupHasFailedNotification::class => ['mail'],
            \Spatie\Backup\Notifications\Notifications\UnhealthyBackupWasFoundNotification::class => ['mail'],
            \Spatie\Backup\Notifications\Notifications\CleanupHasFailedNotification::class => ['mail'],
            \Spatie\Backup\Notifications\Notifications\BackupWasSuccessfulNotification::class => ['mail'],
            \Spatie\Backup\Notifications\Notifications\HealthyBackupWasFoundNotification::class => ['mail'],
            \Spatie\Backup\Notifications\Notifications\CleanupWasSuccessfulNotification::class => ['mail'],
        ],

        'notifiable' => \Spatie\Backup\Notifications\Notifiable::class,

        'mail' => [
            'to' => 'dbackup723@gmail.com',
            'from' => [
                'address' => env('MAIL_FROM_ADDRESS', 'dbackup723@gmail.com'),
                'name' => env('MAIL_FROM_NAME', 'DB Backup POS'),
            ],
        ],

        'slack' => [
            'webhook_url' => '',
            'channel' => null,
            'username' => null,
            'icon' => null,
        ],

        'discord' => [
            'webhook_url' => '',
            'username' => '',
            'avatar_url' => '',
        ],
    ],

    'monitor_backups' => [
        [
            'name' => env('APP_NAME', 'laravel-backup'),
            'disks' => ['local'],
            'health_checks' => [
                \Spatie\Backup\Tasks\Monitor\HealthChecks\MaximumAgeInDays::class => 1,
                \Spatie\Backup\Tasks\Monitor\HealthChecks\MaximumStorageInMegabytes::class => 5000,
            ],
        ],
    ],

    'cleanup' => [
        'strategy' => \Spatie\Backup\Tasks\Cleanup\Strategies\DefaultStrategy::class,

        'default_strategy' => [
            'keep_all_backups_for_days' => 7,
            'keep_daily_backups_for_days' => 16,
            'keep_weekly_backups_for_weeks' => 8,
            'keep_monthly_backups_for_months' => 4,
            'keep_yearly_backups_for_years' => 2,
            'delete_oldest_backups_when_using_more_megabytes_than' => 5000,
        ],
    ],
];
