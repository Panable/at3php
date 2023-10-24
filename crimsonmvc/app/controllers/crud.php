<?php

class crud extends controller
{
    public function __construct()
    {
        $this->postModel = $this->model('crudmodel');
    }

    private function sendError($message)
    {

        // Construct a JSON response for an error
        $errorResponse = [
            'error' => [
                'message' => $message,
            ],
        ];

        // Set the HTTP response status code to indicate an error (e.g., 400 for Bad Request)
        http_response_code(400);

        // Set the Content-Type header to indicate JSON
        header('Content-Type: application/json');

        // Send the JSON response
        echo json_encode($errorResponse);
        exit;
    }

    private function sendSuccess()
    {
        // Construct a JSON response for success
        $successResponse = [
            'data' => [
                'message' => 'SUCCESS!',
                // You can include additional data as needed
            ],
        ];

        // Set the HTTP response status code to indicate success (e.g., 200 for OK)
        http_response_code(200);

        // Set the Content-Type header to indicate JSON
        header('Content-Type: application/json');

        // Send the JSON response
        echo json_encode($successResponse);
    }

    public function index()
    {
        echo "hi";
    }

    public function create($table)
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Sanitize
                $_POST = array_map("htmlspecialchars", $_POST);

                // Attempt to create a new row
                $this->postModel->createRow($table, $_POST);

                if (isset($_SERVER['HTTP_ACCEPT']) && strpos($_SERVER['HTTP_ACCEPT'], 'application/json') !== false) {
                    $this->sendSuccess();
                } else {
                    // Set success session variables and redirect
                    $_SESSION['statusHeader'] = "SUCCESS";
                    $_SESSION['statusMsg'] = "Successfully created $table";
                    redirect('pages/status');
                }
            } else {
                $tableData = $this->postModel->getColumnNames($table);
                $data = [
                    'tableData' => $tableData,
                    'tableName' => $table
                ];
                $this->view('crud/create', $data);
            }
        } catch (Exception $e) {
            if (isset($_SERVER['HTTP_ACCEPT']) && strpos($_SERVER['HTTP_ACCEPT'], 'application/json') !== false) {
                $this->sendError($e->getMessage());
            } else {
                // Set error session variables and redirect
                $_SESSION['statusHeader'] = "ERROR";
                $_SESSION['statusMsg'] = "Error Creating $table: " . $e->getMessage();
                redirect('pages/status');
            }
        }
    }

    public function read($tableName)
    {
        try {
            $table = $this->postModel->readTable($tableName);

            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                if (isset($_SERVER['HTTP_ACCEPT']) && strpos($_SERVER['HTTP_ACCEPT'], 'application/json') !== false) {
                    // Client prefers JSON, so return JSON data.
                    header('Content-Type: application/json');
                    echo json_encode($table);
                    exit;
                }
            }

            $data = [
                'title' => 'Menu: ',
                'tableName' => $tableName,
                $tableName => $table
            ];
            $this->view('crud/read', $data);
        } catch (Exception $e) {
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                if (isset($_SERVER['HTTP_ACCEPT']) && strpos($_SERVER['HTTP_ACCEPT'], 'application/json') !== false) {
                    $this->sendError($e->getMessage());
                }
            }
            // Set error session variables and redirect
            $_SESSION['statusHeader'] = "ERROR";
            $_SESSION['statusMsg'] = $e->getMessage();
            redirect('pages/status');
        }
    }

    public function update($tableName, $id)
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] === 'POST' || $_SERVER['REQUEST_METHOD'] === 'PUT') {
                // Get the raw PUT data from the request
                $putData = file_get_contents("php://input");

                if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
                    // Parse the raw data as JSON
                    $putParams = json_decode($putData, true);
                    if ($putParams === null) {
                        throw new Exception("Failed to parse JSON data");
                    }
                } else {
                    parse_str($putData, $putParams);
                }

                // Sanitize the PUT data (apply htmlspecialchars or other filtering)
                $sanitizedPutData = array_map('htmlspecialchars', $putParams);

                if (!isset($sanitizedPutData['id'])) {
                    $sanitizedPutData['id'] = $id;
                }

                $this->postModel->editRow($tableName, $sanitizedPutData);

                if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
                    $this->sendSuccess();
                } else {
                    // Set success session variables and redirect
                    $_SESSION['statusHeader'] = "SUCCESS";
                    $_SESSION['statusMsg'] = "Successfully edited $id";
                    redirect('pages/status');
                }
            } else {
                $table = $this->postModel->readRow($tableName, $id);

                $data = [
                    'tableName' => $tableName,
                    $tableName => $table
                ];
                $this->view('crud/update', $data);
            }
        } catch (Exception $e) {
            // Set error session variables and redirect
            $_SESSION['statusHeader'] = "ERROR";
            $_SESSION['statusMsg'] = $e->getMessage();
            redirect('pages/status');
        }
    }

    public function delete($table, $id)
    {
        try {
            $this->postModel->deleteRow($table, $id);
            if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
                $this->sendSuccess();
            } else {
                // Set success session variables and redirect
                $_SESSION['statusHeader'] = "SUCCESS";
                $_SESSION['statusMsg'] = "Deleted successfully id of: $id";
                redirect('pages/status');
            }
        } catch (Exception $e) {
            if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
                $this->sendError($e->getMessage());
            } else {
                // Set error session variables and redirect
                $_SESSION['statusHeader'] = "ERROR";
                $_SESSION['statusMsg'] = $e->getMessage();
                redirect('pages/status');
            }
        }
    }
}
