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
                //sanitize
                $_POST = array_map("htmlspecialchars", $_POST);
                $this->postModel->createRow($table, $_POST);
                $this->sendSuccess();
            } else {
                $tableData = $this->postModel->getColumnNames($table);
                $data = [
                    'tableData' => $tableData,
                    'tableName' => $table
                ];
                $this->view('crud/create', $data);
            }
        } catch (Exception $e) {
            $data['error'] = $e->getMessage();
            $this->view('crud/error', $data);
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
            // Handle the exception (e.g., display an error message or redirect to an error page).
            $data['error'] = $e->getMessage();
            $this->view('crud/error', $data);
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


                if ($_SERVER['REQUEST_METHOD'] === 'PUT')
                    $this->sendSuccess();
                else {

                    $data = [
                        'success' => 'Successfully edited ' . $id,
                    ];
                    $this->view('crud/success', $data);
                }

                // Now you can work with the sanitized PUT data
                // For example, access $sanitizedPutData['key'] to get values

            } else {
                $table = $this->postModel->readRow($tableName, $id);

                $data = [
                    'tableName' => $tableName,
                    $tableName => $table
                ];
                $this->view('crud/update', $data);
            }
        } catch (Exception $e) {

            // Handle the exception (e.g., display an error message or redirect to an error page).
            $data['error'] = $e->getMessage();
            $this->view('crud/error', $data);
        }
    }



    public function delete($table, $id)
    {

        try {
            $this->postModel->deleteRow($table, $id);
            $data = [
                'success' => 'deleted successfully id of:' . $id,
            ];
            if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
                $this->sendSuccess();
            } else {
                $this->view('crud/success', $data);
            }
        } catch (Exception $e) {
            $data['error'] = $e->getMessage();
            if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
                $this->sendError($e->getMessage());
            } else {
                $this->view('crud/error', $data);
            }
        }
    }
}
