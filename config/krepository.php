<?php
return [
    'path' => 'Repositories',
    'files' => [
        'model' => '{name}',
        'interface' => '{name}Repository',
        'data_mapper' => 'Db{name}Repository'
    ],
    'parent' => [
        // data mapper parent class configs
        'data_mapper' => [
            'config' => true,
            'class_name' => 'BaseRepository',
            'namespace' => 'App\Repositories'
        ],
        'model' => [
            'config' => true,
            'class_name' => 'Entity',
            'namespace' => 'App\Repositories'
        ]
    ]
];
