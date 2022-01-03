<?php
    require_once 'user.php';
    require_once 'testInputUtility.php';

    $errors = [];
    $response = [];

    session_start();

    header('Content-Type: application/json');

    if (isset($_POST)) {
        $data = json_decode($_POST['data'], true);

        $userName = isset($data['userName']) ? testInput($data['userName']) : '';
        $password = isset($data['password']) ? testInput($data['password']) : '';

        if(!$userName) {
            $errors[] = 'Please enter user name';
        }

        if(!$password) {
            $errors[] = 'Please enter password';
        }

        if($userName && $password) {
            $user = new User($userName, $password);
            $isUserValid = $user->isValid();

            if ($isUserValid["success"]) {
                $_SESSION['username'] = $user->getUsername();
                $_SESSION['userId'] = $user->getUserId();

                if ($data['remember']) {
                    $tokenUtility = new TokenUtility();
                    $token = bin2hex(random_bytes(8));
                    $expires = time() + 30 * 24 * 60 * 60;

                    setcookie('token', $token, $expires, '/');
                    $tokenUtility->createToken($token, $_SESSION['userId'], $expires);
                }
            } else {
                http_status_code(401);
                $errors[] = $isUserValid["error"];
            }
        }
    } else {
        http_status_code(400);
        $errors[] = 'Invalid request';
    }

    if($errors) {
        $response = ['success' => false, 'data' => $errors];
    } else {
        $response = ['success' => true];
    }

    echo json_encode($response);
?>