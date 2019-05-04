<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Koterov\Symdyanov\Php7\Dumper\Dumper;

$msg = 'I\'m working';

Dumper::dumper($msg);