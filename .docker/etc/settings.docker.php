<?php
/**
 * @file
 * Docker specific configuration.
 */

// Drupal 6 connection string.
$db_url = 'mysql://dbuser:dbpass@dbhost/drupal';
// Drupal 7 db settings.
$databases['default']['default'] = array(
  'driver' => 'mysql',
  'database' => 'drupal',
  'username' => 'dbuser',
  'password' => 'dbpass',
  'host' => 'dbhost',
);
// Legacy Drupal 6 db settings.
$databases['legacy']['default'] = array(
  'driver' => 'mysql',
  'database' => 'legacy_drupal',
  'username' => 'dbuser',
  'password' => 'dbpass',
  'host' => 'legacy_dbhost',
);
// Set the host to the proxied container IP.
// $base_url = 'http://projectname';
// Set file system paths.
$conf['file_private_path'] = '/var/www/files-private';
$conf['file_public_path'] = 'sites/default/files';
$conf['file_temporary_path'] = '/tmp';

// Solr overrides for docker.
$conf['search_api_solr_overrides'] = array(
  'solr' => array(
    'name' => t('Solr Server (Overridden) - Docker Container'),
    'options' => array(
      'scheme' => 'http',
      'host' => 'solr',
      'port' => 8983,
      'path' => '/solr/collection1',
    ),
  ),
);

# Uncomment this for testing local subdomain auth
# $cookie_domain = '.localtest.me';

// Ensure errors, warnings and notices are displayed.
error_reporting(E_ALL & ~E_STRICT);
$conf['error_level'] = 2;
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) &&
  $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
  $_SERVER['HTTPS'] = 'on';
}
