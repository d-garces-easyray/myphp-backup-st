<?php
/**
 * Instantiate Restore_Database and perform backup
 */
use MyphpBackup\RestoreDatabase;

 require_once __DIR__ . '/../config.php';

 require_once __DIR__ . '/../vendor/autoload.php';
 
// Report all errors
error_reporting(E_ALL);
// Set script max execution time
set_time_limit(900); // 15 minutes

if (php_sapi_name() != "cli") {
    echo '<div style="font-family: monospace;">';
}

$restoreDatabase = new RestoreDatabase(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$result = $restoreDatabase->restoreDb(BACKUP_DIR, BACKUP_FILE) ? 'OK' : 'KO';
$restoreDatabase->obfPrint("Restoration result: ".$result, 1);

if (php_sapi_name() != "cli") {
    echo '</div>';
}
