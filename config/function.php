<?php
session_start();

require_once("dbcon.php");

function validate($inputData)
{
    global $conn;
    $validateData = mysqli_real_escape_string($conn, $inputData);
    return trim($validateData);
}


function redirect($url, $status)
{
    $_SESSION['status'] = $status;
    header("Location:" . $url);
    exit(0);
}

function  alertMessage()
{
    if (isset($_SESSION['status'])) {
        echo '<div class="alert alert-success">
                <h6>' . $_SESSION['status'] . '</h6>
        </div>';
        unset($_SESSION['status']);
    }
}


function getAll($tableName)
{
    global $conn;

    $table = validate($tableName);

    $query = "SELECT * FROM $table";
    $result = mysqli_query($conn, $query);
    return $result;
}


function  checkParamId($paramType)
{
    if (isset($_GET[$paramType])) {

        if ($_GET[$paramType] != null) {
            return $_GET[$paramType];
        } else {
            return "No Id Found";
        }
    } else {
        return "No Id Given :-/";
    }
}

function getById($table, $id)
{
    global $conn;
    $table = validate($table);
    $id = validate($id);

    $query = "SELECT * FROM $table WHERE id = '$id' LIMIT 1";
    $result = mysqli_query($conn, $query);

    if ($result) {


        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $response = [
                'status' => 200,
                'message' => 'Fected data',
                'data' => $row
            ];
            return $response;
        } else {
            $response = [
                'status' => 404,
                'message' => 'No Data Record'
            ];
            return $response;
        }
    } else {
        $response = [
            'status' => 500,
            'message' => 'Something Went Wrong'
        ];

        return $response;
    }
}


// Delete User
function deleteQuery($tableName, $id)
{
    $table = validate($tableName);
    $id =  validate($id);

    global $conn;

    $query = "DELETE FROM $table WHERE id =  '$id' LIMIT 1";
    $result = mysqli_query($conn, $query);
    return $result;
}


function logoutSession()
{
    unset($_SESSION['auth']);
    unset($_SESSION['loggedInUserRole']);
    unset($_SESSION['loggedInUser']);
}


// Settings Web
function webSetting($columnName)
{
    $setting =  getById('settings', 2);
    if ($setting['status'] == 200) {
        return $setting['data'][$columnName];
    }
}


function getCount($tableName)
{
    global  $conn;
    $table = validate($tableName);
    $query = "SELECT * FROM $tableName";
    $result = mysqli_query($conn, $query);
    $totalCount = mysqli_num_rows($result);
    return $totalCount;
}


function insert($tableName, $data)
{
    global $conn;

    $table = validate($tableName);

    $columns = array_keys($data);
    $values = array_values($data);

    $finalColumns = implode(',', $columns);
    $finalValues = "'" . implode("','", $values) . "'";

    // return $finalValues;  // za test

    $query = "INSERT INTO $table($finalColumns) VALUES ($finalValues)";
    $result = mysqli_query($conn, $query);
    return $result;
}


function update($tableName, $id, $data)
{

    global $conn;

    $table = validate($tableName);
    $id = validate($id);

    $updateColumnValuesData = "";
    foreach ($data as $columns => $values) {
        $updateColumnValuesData .= $columns . '=' . "'$values',";
    }

    //return substr(trim($updateColumnValuesData), 0, -1);  // test

    $finalUpdateData = substr(trim($updateColumnValuesData), 0, -1);

    $query = "UPDATE $table SET $finalUpdateData WHERE id='$id' LIMIT 1";
    $result = mysqli_query($conn, $query);
    return $result;
}
