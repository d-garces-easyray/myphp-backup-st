<?php
/**
 * Instantiate Backup_Database and perform backup
 */

use MyphpBackup\BackupDatabase;

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

$backupDatabase = new BackupDatabase(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, CHARSET);

// Option-1: Backup tables already defined above
$result = $backupDatabase->backupTables(TABLES) ? 'OK' : 'KO';

// Option-2: Backup changed tables only - uncomment block below
/*
$since = '1 day';
$changed = $backupDatabase->getChangedTables($since);
if(!$changed){
  $backupDatabase->obfPrint('No tables modified since last ' . $since . '! Quitting..', 1);
  die();
}
$result = $backupDatabase->backupTables($changed) ? 'OK' : 'KO';
*/

$backupDatabase->obfPrint('Backup result: ' . $result, 1);

// Use $output variable for further processing, for example to send it by email
$output = $backupDatabase->getOutput();

BackupDatabase::deleteOldBackups(DELETE_OLDER);

if (php_sapi_name() != "cli") {
    echo '</div>';
}
