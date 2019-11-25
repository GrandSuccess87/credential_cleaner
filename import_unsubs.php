<?php
require_once '/mnt/global_settings.php';
require_once '/mnt/exclusive_app.php';
require_once '/mnt/Logger.php';
require_once '/mnt/export_master.php';
require_once '/mnt/all-inbox/common/unsubscribe.php';
require_once '/mnt/all-inbox/TOOLS/allinbox_classes.php';
require_once __DIR__ . "/../../../init.php";

$client_id = "285";
$token = env('IMPORT_UNSUBS_TOKEN');
$campaign_access_key = env('CAMPAIGN_ACCESS_KEY');
$log = new Logger( null, true, $client_id );
$sources = get_client_sources( $client_id );
$threshold = 300;
$out = array();
$count = 0;


$log->Log( "Getting download link for client id: {$client_id}" );

$log->Log( "Getting campaign access key: {$campaign_access_key}");

$txt1 = "Learn PHP";
$txt2 = "W3Schools.com";
$x = 5;
$y = 4;

echo "Campaign Access Key:" . $campaign_access_key . "</br>";
echo "<h2>" . $txt1 . "</h2>";
echo "Study PHP at " . $txt2 . "<br>";
echo $x + $y;
return;

if( ($download_link = get_download_link( $client_id,
$campaign_access_key, $token )) !== FALSE ) {

    $log->Log( "Getting download file from link: {$download_link}" );
    $download_file = get_download_file( $client_id, $download_link );

    foreach( $sources as $source ) {

        $log->Log( "Getting unsubs for {$source} from download file
{$download_file}" );
        if( ($unsub_file = get_unsubs( $source, $download_file ) ) !==
FALSE ) {

            $unsub_count = exec( "cat {$unsub_file} | wc -l" );
            $log->Log( "source: {$source} ClientUnsubscribe\tfile:
{$unsub_file}\tunsub count: {$unsub_count}" );
"import_unsubs.php" 266L, 7089C
1,1           Top

