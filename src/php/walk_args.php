<?php
$extensions = [
    'php' => 'PHP',
    '*.py' => 'Python',
    'rb' => 'Ruby',
    '*.js' => 'JavaScript'
];

function print_array(string $item, string $key, bool $add_dot = false): void 
{
    $prefix = '*.';
    if ($add_dot && strpos($key, $prefix) !== 0) {
        $key = $prefix . $key;
    }
    echo "$key: $item" . PHP_EOL;
}

array_walk($extensions, 'print_array', true);

$extensions2 = [
    'langs' => [
        'PHP' => 'php',
        'Python' => 'py',
        'Ruby' => 'rb',
        'JavaScript' => 'js',
    ],
    'databases' => [
        'PostgreSQL' => 'sql',
        'MySQL' => 'sql',
        'SQLite' => 'sql',
        'ClickHouse' => 'sql',
        'MongoDB' => 'js',
        'Redis' => 'own',
    ]
    ];

function print_array2(string $item, string $key): void 
{
    echo "$key: $item" . PHP_EOL;
}

$handler = 'print_array2';
array_walk_recursive($extensions2, $handler);