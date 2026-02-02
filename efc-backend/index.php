<?php
// Paste your API key here BEFORE deploying
$simbrief_api_key = '5sP7yo8S05R9T7do6XghOwuAgaO5dUJh';  // from SimBrief contact[file:3][file:2]

// ===== API ENDPOINTS FOR simbrief.apiv1.js =====[file:1][file:3]
if (isset($_GET['js_url_check'])) {
    header('Content-Type: application/javascript');
    $var_name = isset($_GET['var']) ? $_GET['var'] : '';
    $js_url_check = $_GET['js_url_check'];
    $url = 'http://www.simbrief.com/ofp/flightplans/xml/' . $js_url_check . '.xml';
    $fh = @get_headers($url);
    $resp = ($fh[0] != 'HTTP/1.1 200 OK') ? false : true;
    print $var_name . ' = ' . ($resp ? 'true' : 'false') . ';';
    die;
}

if (isset($_GET['api_req'])) {
    header('Content-Type: application/javascript');
    print 'var apicode = "' . md5($simbrief_api_key . $_GET['api_req']) . '";';
    die;
}

// ===== OFP OUTPUT (called after generation) =====[file:3]
class SimBrief {
    // Copy the ENTIRE class from your simbrief.apiv1.php here[file:3]
    // ... (file_exists, fetchofp, __construct, etc.)
}

// Load OFP if ofp_id present
$ofp_id = isset($_GET['ofp_id']) ? $_GET['ofp_id'] : false;
$simbrief = new SimBrief($ofp_id);

// Return JSON for your Base44 app (or render HTML if you prefer)
header('Content-Type: application/json');
if (!$simbrief->ofp_avail) {
    http_response_code(404);
    echo json_encode(['error' => 'OFP not ready']);
} else {
    echo $simbrief->ofp_json;  // full parsed OFP as JSON[file:3]
}
?>
