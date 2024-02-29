<?php
/**
 * Define database parameters here
 */

# ADD THE GLOBAL CONFIG FILE PATH TO CENTRALIZE CREDENTIALS
define('CONFIG_FILE_PATH', 'path/to/global/config.php');

if( file_exists(CONFIG_FILE_PATH) ) require_once CONFIG_FILE_PATH;

# MATCH THE VALUES TO THE GLOBAL DEFINED CONSTS OR 
define("DB_HOST", 'localhost');
define("DB_USER", 'consulenza_pa');
define("DB_PASSWORD", '@gn@Vgi[OznZhB[F');
define("DB_NAME", 'consulenza_pa_db');

define("BACKUP_DIR", __DIR__.'/../myphp-backup-files'); // Comment this line to use same script's directory ('.')
define("TABLES", '*'); // Full backup
// define("TABLES", 'table1, table2, table3'); // Partial backup
// define('IGNORE_TABLES',array(
//     'tbl_token_auth',
//     'token_auth'
// )); // Tables to ignore
define("CHARSET", 'utf8');
define("GZIP_BACKUP_FILE", true); // Set to false if you want plain SQL backup files (not gzipped)
define("DISABLE_FOREIGN_KEY_CHECKS", true); // Set to true if you are having foreign key constraint fails
define("BATCH_SIZE", 1000); // Batch size when selecting rows from database in order to not exhaust system memory
                            // Also number of rows per INSERT statement in backup file

# RESTORE
define("BACKUP_FILE", 'myphp-backup-your_db_name-20181022_164459.sql.gz'); // Script will autodetect if backup file is gzipped based on .gz extension

