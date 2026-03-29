<?php

header('Content-Type: application/json');

$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'POST') {
    
    $input = file_get_contents('php://input');
    $data = json_decode($input, true);

    if (json_last_error() === JSON_ERROR_NONE && isset($data['image'])) {
        
        $imageContent = base64_decode($data['image']);
        $imageName = 'image_' . time() . '.jpg';
        $filePath = __DIR__ . '/static/' . $imageName;
        
        if ($imageContent !== false) {
            if (file_put_contents($filePath, $imageContent)) {
                $response = [
                    'success' => true,
                    'message' => 'Image saved',
                ];
            } else {
                $response = [
                    'success' => false,
                    'message' => 'Failed to save file',
                ];
            }
        } else {
            $response = [
                'success' => false,
                'message' => 'Invalid image data',
            ];
        }
    } else {
        $response = [
            'success' => false,
            'message' => 'Invalid JSON or missing image field',
        ];
    }
} else {
    $response = [
        'success' => false,
        'message' => 'Method not allowed',
    ];
}

echo json_encode($response, JSON_UNESCAPED_UNICODE);

?>