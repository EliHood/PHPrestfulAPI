<?php
return [
    'settings' => [
        'displayErrorDetails' => true, // set to false in production
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header

        // Renderer settings
        'renderer' => [
            'template_path' => __DIR__ . '/../templates/',
        ],

        // Monolog settings
        'logger' => [
            'name' => 'slim-app',
            'path' => isset($_ENV['docker']) ? 'php://stdout' : __DIR__ . '/../logs/app.log',
            'level' => \Monolog\Logger::DEBUG,
        ],

        // Database connection settings
        // "db" => [
        //     'host'     => '127.0.0.1',
        //     'port'     => '8889',
        //     'dbname' => 'eliapi2',
        //     'user' => 'root',
        //     'pass' => 'root',
        //     'driver'   => 'mysql'
        // ]



            'db' => [
 
               'driver' => 'mysql',
 
               'host' => '127.0.0.1',
               
               'port'     => '8889',
 
               'database' => 'eliapi2',
 
               'username' => 'root',
 
               'password' => 'root',
 
               'charset' => 'utf8',
 
               'collation' => 'utf8_unicode_ci',
       ]
    ],
];
