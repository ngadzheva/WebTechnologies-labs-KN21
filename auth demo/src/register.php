<?php
    require_once 'user.php';
    require_once 'testInputUtility.php';

    $errors = [];
    $response = [];

    header('Content-Type: application/json');

    if($_POST) {
        $data = json_decode($_POST["data"], true);

        $userName = isset($data['userName']) ? testInput($data['userName']) : '';
        $password = isset($data['password']) ? testInput($data['password']) : '';
        $confirmPassword = isset($data['confirmPassword']) ? testInput($data['confirmPassword']) : '';
        $email = isset($data['email']) ? testInput($data['email']) : '';

        if (!$userName) {
            $errors[] = 'Username is required.';
        }

        if (!$password) {
            $errors[] = 'Password is required.';
        }

        if (!$confirmPassword) {
            $errors[] = 'Confirm password is required.';
        }

        if ($userName && $password && $confirmPassword) {
            if ($password === $confirmPassword) {
                $user = new User($userName, $password);

                $userExists = $user->userExists();

                if ($userExists['success']) {
                    if ($userExists['exists']) {
                        $errors[] = 'User already exists.';
                    } else {
                        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                        $user->createUser($passwordHash, $email);
                    }
                } else {
                    $errors[] = $userExists['error'];
                }
            } else {
                $errors[] = 'Confirm password must match password.';
            }
        }
    } else {
        http_response_code(400);
        $errors[] = 'Invalid request';
    }

    if ($errors) {
        $response = ['success' => false, 'errors' => $errors];
    } else {
        $response = ['success' => true];
    }

    echo json_encode($response);
?>