<?php

$variables = [
    'HELLO' => 'WORLD',
    'KEY' => 'VALUE',
    'USE_YOUR_ENV_LIKE' => 'ENV(\'YOUR_ENV_KEY\')',
];

foreach ($variables as $key => $value) {
    putenv("$key=$value");
}
?>