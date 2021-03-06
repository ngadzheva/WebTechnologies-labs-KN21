<?php
    require_once 'mark.php';
    require_once 'testInputUtility.php';

    header('Content-Type: application/json');

    start_session();

    $errors = [];
    $response = [];

    $requestUrl = $_SERVER['REQUEST_URI'];

    if(preg_match("/students$/", $requestUrl)) {
        if ($_SESSION) {
            if ($_SESSION['username']) {
                $mark = new Mark(0, 0);
                $marks = $mark->getAllMarksWithStudents();

                echo json_encode(["success" => true, "data" => $marks]);
            } else {
                http_response_code(401);

                echo json_encode(["success" => false, "error" => 'Unauthorized.']);
            }
        } else {
            if ($_COOKIE['token']) {
                $tokenUtility = new TokenUtility();
                $isTokenValid = $tokenUtility->checkToken();

                if ($isTokenValid["success"]) {
                    $user = $isTokenValid["user"];

                    $_SESSION['username'] = $user->getUsername();
                    $_SESSION['userId'] = $user->getUserId();

                    $mark = new Mark(0, 0);
                    $marks = $mark->getAllMarksWithStudents();
                } else {
                    http_response_code(401);

                    echo json_encode(["success" => false, "error" => 'Session expired.']);
                }
            }
        }
    } else if (preg_match("/addStudent$/", $requestUrl)) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($_SESSION) {
                if ($_SESSION['username']) {
                    $data = json_decode($_POST['data'], true);
                    
                    $firstName = isset($data['firstName']) ? testInput($data['firstName']) : '';
                    $lastName = isset($data['lastName']) ? testInput($data['lastName']) : '';
                    $fn = isset($data['fn']) ? testInput($data['fn']) : 0;
                    $mark = isset($data['mark']) ? testInput($data['mark']) : 0;

                    validateData($data);

                    if ($errors) {
                        echo json_encode($errors);
                    } else {
                        $studentMark = new Mark($fn, $mark);
                        $studentMark->addMark();

                        echo json_encode(["success" => true, "data" => $data]);
                    }
    
                } else {
                    http_response_code(401);
    
                    echo json_encode(["success" => false, "error" => 'Unauthorized.']);
                }
            } else {
                if ($_COOKIE['token']) {
                    $tokenUtility = new TokenUtility();
                    $isTokenValid = $tokenUtility->checkToken();
    
                    if ($isTokenValid["success"]) {
                        $data = json_decode($_POST['data'], true);
                    
                        $firstName = isset($data['firstName']) ? testInput($data['firstName']) : '';
                        $lastName = isset($data['lastName']) ? testInput($data['lastName']) : '';
                        $fn = isset($data['fn']) ? testInput($data['fn']) : 0;
                        $mark = isset($data['mark']) ? testInput($data['mark']) : 0;

                        validateData($data);

                        if ($errors) {
                            echo json_encode($errors);
                        } else {
                            $studentMark = new Mark($fn, $mark);
                            $studentMark->addMark();

                            echo json_encode(["success" => true, "data" => $data]);
                        }
        
                    } else {
                        http_response_code(401);
    
                        echo json_encode(["success" => false, "error" => 'Session expired.']);
                    }
                }
            }
        } else {
            $errors[] = 'Invalid request';
        }
    } else {
        $errors[] = 'Invalid endpoint';
    }

    if ($errors) {
        http_response_code(400);

        echo json_encode($errors);
    } else {
        // Create DB record
        $studentMark = new Mark($fn, $mark);
        
        // TODO: Validate mark:
        // * If the student already has a mark, do not add second
        // * If there is no student with such names and fn, do not add marks

        // TODO: Handle DB errors

        http_response_code(200);

        echo json_encode($response);
    }

    function validateData($data) {
        if (!$firstName) {
            $errors[] = 'Please enter first name';
        } elseif (mb_strlen($firstName) > 20) {
            $errors[] = 'First Name can not be longer than 20 characters';
        } else {
            $response['firstName'] = $firstName;
        }

        if (!$lastName) {
            $errors[] = 'Please enter last name';
        } elseif (mb_strlen($lastName) > 20) {
            $errors[] = 'Last Name can not be longer than 20 characters';
        } else {
            $response['lastName'] = $lastName;
        }

        if (!$fn) {
            $errors[] = 'Please enter faculty number';
        } elseif (!ctype_digit($fn)) {
            $errors[] = 'Faculty Number must be an integer';
        } elseif (intval($fn) < 62000 || intval($fn) > 62999) {
            $errors[] = 'Faculty Number must be between 62000 and 62999';
        } else {
            $response['fn'] = $fn;
        }

        if (!$mark) {
            $errors[] = 'Please enter mark';
        } elseif (!is_numeric($mark)) {
            $errors[] = 'Mark must be a number';
        } elseif (floatval($mark) < 2.0 || floatval($mark) > 6.0) {
            $errors[] = 'Mark must be between 2.0 and 6.0';
        } else {
            $response['mark'] = $mark;
        }
    }
?>