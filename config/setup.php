<?php

$errorLevel = ($_ENV['ENV'] === 'DEV') ? E_ALL : 5111;
error_reporting($errorLevel);

$displayErrors = ($_ENV['ENV'] === 'DEV') ? 1 : 0;
ini_set('display_errors', $displayErrors);
