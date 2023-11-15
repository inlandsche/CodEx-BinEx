<!DOCTYPE html>
<html>
<head>
    <title>Read Local File</title>
</head>
<body>
    <h1>Contents of rules.txt</h1>

    <?php
    // Function to fetch the file contents using cURL
    function fetchFileContent() {
        $url = 'http://127.0.0.1:5000/file/flag.txt'; // Replace with the actual URL
        $ch = curl_init($url);

        // Set cURL options
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);

        return [$statusCode, $response];
    }

    list($statusCode, $fileContents) = fetchFileContent();
    $filePath = 'read-file\flag.txt';

    if ($statusCode === 200) {
        $fileContents = file_get_contents($filePath);
        // Output the file contents
        echo nl2br($fileContents);
        // Display the file contents
        // echo "<pre>$filePath</pre>";
    } else {
        // Display an error message
        echo "File not found or an error occurred (Status Code: $statusCode)";
    }
    ?>
</body>
</html>
