<?php
header('Content-Type: application/json');

$input = json_decode(file_get_contents('php://input'), true);
$prompt = $input['prompt'] ?? '';

if (!$prompt) {
    echo json_encode(['reply' => 'No input provided.']);
    exit;
}

$api_key = "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";
$url = "https://api.groq.com/openai/v1/chat/completions";

$data = [
    "model" => "llama3-70b-8192",
    "messages" => [
        ["role" => "system", "content" => "You are a helpful and polite AI doctor assistant. Answer medical and general questions clearly."],
        ["role" => "user", "content" => $prompt]
    ]
];

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: Bearer $api_key",
    "Content-Type: application/json"
]);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

$response = curl_exec($ch);
curl_close($ch);

$result = json_decode($response, true);
$reply = $result['choices'][0]['message']['content'] ?? 'Sorry, I couldn’t generate a reply.';

echo json_encode(['reply' => $reply]);
