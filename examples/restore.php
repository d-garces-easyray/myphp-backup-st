<?php
/**
 * Instantiate Restore_Database and perform backup
 */
use MyphpBackup\RestoreDatabase;

# EXAMPLE OF GLOBAL CONFIG INCLUSION
require_once __DIR__ . '/../config.php';    # EXAMPLE AND NEEDED VARIABLES
require_once __DIR__ . '/vendor/autoload.php';
 
// Report all errors
error_reporting(E_ALL);
// Set script max execution time
set_time_limit(900); // 15 minutes

if (php_sapi_name() != "cli") {
    echo '<div style="font-family: monospace;">';
}

$restoreDatabase = new RestoreDatabase(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, 'utf8', 'myphp-backup-consulenza_pa_db-20240229_142417.sql.gz');
$result = $restoreDatabase->restoreDb() ? 'OK' : 'KO';
$restoreDatabase->obfPrint("Restoration result: ".$result, 1);

if (php_sapi_name() != "cli") {
    echo '</div>';
}
