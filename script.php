<?php
$EXM = getenv('EXM');
$NXM = getenv('NXM');
// Array of URLs to retrieve data from
$urls = [
    'https://dca.sytes.net/$Tokeni/$LO/all.txt?name=dca.sytes.net-unknown&asn=unknown&mode=new',
    'https://dca.sytes.net/$Tokeni/$LO/all.txt?name=new_link_dca.sytes.net-unknown-new&asn=unknown&mode=new&base64=True',
    'https://dca.sytes.net/$Tokeni/$LO/clash/all.yml?name=new_normal_dca.sytes.net-unknown-new&asn=unknown&mode=new',
    'https://dca.sytes.net/$Tokeni/$LO/sub/?asn=unknown'
];

// Function to retrieve data from URL and save to file
function fetchDataAndSaveToFile($url, $filename) {
    $data = file_get_contents($url); // Retrieve data from URL
    if ($data === false) {
        echo "Failed to retrieve data from $url\n";
        return;
    }

    // Save data to file
    if (file_put_contents($filename, $data) !== false) {
        echo "Data from $url saved to $filename successfully\n";
    } else {
        echo "Failed to save data from $url to $filename\n";
    }
}

// Loop through each URL and fetch data
foreach ($urls as $index => $url) {
    $filename = "output_$index.txt"; // Generate filename
    fetchDataAndSaveToFile($url, $filename); // Fetch data and save to file
}
?>
