<?php
$app = require_once __DIR__.'/../bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "Clearing config cache...\n";
Artisan::call('config:clear');
echo Artisan::output();

echo "Clearing application cache...\n";
Artisan::call('cache:clear');
echo Artisan::output();