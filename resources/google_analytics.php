<?php

// Load the Google API PHP Client Library.
require_once __DIR__ . DIRECTORY_SEPARATOR . '../vendor/autoload.php';


$analytics = initializeAnalytics();
$profile = getFirstProfileId($analytics);


function initializeAnalytics()
{
  // Creates and returns the Analytics Reporting service object.

  // Use the developers console and download your service account
  // credentials in JSON format. Place them in this directory or
  // change the key file location if necessary.
  $KEY_FILE_LOCATION = __DIR__ . '/ga-ibtikarcom-291416-f74d4a6e4497.json';

  // Create and configure a new client object.
  $client = new Google_Client();
  $client->setApplicationName("Hello Analytics Reporting");
  $client->setAuthConfig($KEY_FILE_LOCATION);
  $client->setScopes(['https://www.googleapis.com/auth/analytics.readonly']);
  $analytics = new Google_Service_Analytics($client);

  return $analytics;
}

function getFirstProfileId($analytics) {
  // Get the user's first view (profile) ID.

  // Get the list of accounts for the authorized user.
  $accounts = $analytics->management_accounts->listManagementAccounts();

  if (count($accounts->getItems()) > 0) {
    $items = $accounts->getItems();
    $firstAccountId = $items[0]->getId();

    // Get the list of properties for the authorized user.
    $properties = $analytics->management_webproperties
        ->listManagementWebproperties($firstAccountId);

    if (count($properties->getItems()) > 0) {
      $items = $properties->getItems();
      $firstPropertyId = $items[0]->getId();

      // Get the list of views (profiles) for the authorized user.
      $profiles = $analytics->management_profiles
          ->listManagementProfiles($firstAccountId, $firstPropertyId);

      if (count($profiles->getItems()) > 0) {
        $items = $profiles->getItems();

        // Return the first view (profile) ID.
        return $items[0]->getId();

      } else {
        throw new Exception('No views (profiles) found for this user.');
      }
    } else {
      throw new Exception('No properties found for this user.');
    }
  } else {
    throw new Exception('No accounts found for this user.');
  }
}


function getResults($analytics, $profileId, $start_date, $end_date, $metrcisParams,$optParams = array()) {
  // Calls the Core Reporting API and queries for the number of sessions
  // for the last seven days.

   return $analytics->data_ga->get(
       'ga:' . $profileId,
       $start_date,
       $end_date,
       $metrcisParams,
       $optParams
      );
}


function dashboard_first_metrics() {
  global $analytics, $profile;
  $metrcisParams = array(
    'metrics' =>   'ga:bounceRate,ga:pageviewsPerSession,ga:avgTimeOnPage,ga:pageviews'
  );
  $results = getResults($analytics, $profile, '28daysAgo', 'today', $metrcisParams);
  if (count($results->getRows()) > 0) {


    // Get the entry for the first entry in the first row.
    $rows = $results->getRows();
    // return rows.
    return $rows;

  } else {
    print "No results found.\n";
  }
}

function visitor_type_persentage(){
  global $analytics, $profile;
  $results = getResults($analytics, $profile, '28daysAgo', 'today', 'ga:users', array('dimensions'=>'ga:userType'));
  if (count($results->getRows()) > 0) {

    // Get the entry for the first entry in the first row.
    $rows = $results->getRows();
    // return rows.
    return $rows;

  } else {
    print "No results found.\n";
  }
}

function most_viewed_pages(){
  global $analytics, $profile;
  $results = getResults($analytics, $profile, '28daysAgo', 'today', array('ga:uniquePageviews', ), array('dimensions'=>'ga:pagePathLevel1,ga:pageTitle','sort'=>'-ga:uniquePageviews'));
  if (count($results->getRows()) > 0) {

    // Get the entry for the first entry in the first row.
    $rows = $results->getRows();
  
    return $rows;

  } else {
    print "No results found.\n";
  }
}
// most_viewed_pages();

function pageviews_month() {
  global $analytics, $profile;
  $optParams = array(
    'dimensions' =>   'ga:day'
  );
  $results = getResults($analytics, $profile, '28daysAgo', 'today', 'ga:pageviews', $optParams);
  if (count($results->getRows()) > 0) {


    // Get the entry for the first entry in the first row.
    $rows = $results->getRows();
    // return rows.
    var_dump($rows);

  } else {
    print "No results found.\n";
  }
}
// pageviews_month();