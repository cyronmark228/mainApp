<?php
$secret = 'your-secret-key';
$headers = getallheaders();

if ($headers['X-Hub-Signature-256'] ?? false) {
    $payload = file_get_contents('php://input');
    $sig = 'sha256=' . hash_hmac('sha256', $payload, $secret);
    if (!hash_equals($sig, $headers['X-Hub-Signature-256'])) {
        http_response_code(403);
        exit('Invalid signature');
    }
}

$output = [];
exec('cd /home/zydebnwqs4su/public_html/application.chedro12.com  && git pull 2>&1', $output);
file_put_contents('/home/zydebnwqs4su/public_html/application.chedro12.com/deploy.log', implode("\n", $output), FILE_APPEND);
echo "Deployed.";
?>

