<?php
$dword = "What do you want? talk to me via mail Jaywoncoded@gmail.com";
function getUserIP() {
    // Check for the 'HTTP_X_FORWARDED_FOR' header to get the IP address when behind a proxy
    if (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && !empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ipList = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
        $userIP = trim($ipList[0]);
    }
    // If 'HTTP_X_FORWARDED_FOR' header is not present, use the 'REMOTE_ADDR' server variable
    else {
        $userIP = $_SERVER['REMOTE_ADDR'];
    }
    return $userIP;
}

// Usage example
$userIP = getUserIP();
echo "My IP: " .$userIP ;

if (isset($_POST['submit'])) {
    $myip = $_POST['myip'];
    if ($myip && filter_var($myip, FILTER_VALIDATE_IP)) {
        $filename = "trapip.txt";
        // Sanitize the file name to prevent directory traversal
        $filename = basename($filename);
        // Define the secure directory path to store the file
        $directory = $_SERVER['DOCUMENT_ROOT'] . "/";
        // Ensure the directory exists and is writable
        if (is_dir($directory) && is_writable($directory)) {
            $filepath = $directory . $filename;
            if (!file_exists($filepath)) {
                // If the file doesn't exist, create it and initialize the numbering system
                $store = file_put_contents($filepath, "1. $myip" . PHP_EOL, LOCK_EX);
            } else {
                // If the file already exists, read its contents and determine the next line number
                $lines = file($filepath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
                $lastLine = end($lines);
                $lastLineParts = explode('. ', $lastLine);
                $lineNumber = intval($lastLineParts[0]);
                // Increment the line number and append the new IP address
                $lineNumber++;
                $store = file_put_contents($filepath, "$lineNumber. $myip" . PHP_EOL, FILE_APPEND | LOCK_EX);
            }
            if ($store !== false) {
                echo $dword;
                
                exit();
            } else {
                // Handle the error when unable to write to the file
                echo "Error: Failed to write to the file.";
            }
        } else {
            // Handle the error when the directory is not writable or does not exist
            echo "Error: The directory is not writable or does not exist.";
        }
    } else {
        // Handle the error when the IP address is invalid
        echo "Error: Invalid IP address.";
    }
}


?>
<html>
<head>
    <title>Update</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        .form {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .form-control {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>
<body>
    <div class="form">
        <form method="POST" action="">
            <h1><p>Shell Updated! Please continue with your ip address</p></h1>
            <div class="form-group">
                <div class="form-control">
                    <input type="text" class="form-control" name="myip" pattern="^((25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$" placeholder="Enter IP address" value="<?php echo $userIP; ?>" required>
                </div>
                <div class="button">
                    <input type="submit" name="submit" class="btn btn-success" value="Continue"/>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
