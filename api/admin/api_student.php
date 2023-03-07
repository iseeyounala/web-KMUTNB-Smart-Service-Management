<?php
require_once '../connect.php';
// require_once './function.php';
date_default_timezone_set("Asia/Bangkok");

$request_data = json_decode(file_get_contents("php://input"));
$action = $request_data->action;

switch ($action) {
    case 'get_list_student':
        $sql = "SELECT a.std_number_id,
                       a.std_gender,
                       a.std_fname,
                       a.std_lname,
                       a.std_email,
                       a.std_username,
                       a.std_created_at,
                       a.std_last_login,
                       b.dpm_name,
                       c.fct_name FROM tb_student AS a 
                                    LEFT JOIN tb_department AS b ON a.dpm_id = b.dpm_id
                                    LEFT JOIN tb_faculty AS c ON a.fct_id = c.fct_id WHERE a.std_del_status = 0 ";
        $result = $conn->query($sql);
        if ($result) {
            while ($row = $result->fetch_object()) {
                $data_[] = $row;
            }
            $data = [
                'status' => true,
                'result' => $data_
            ];
        } else {
            $data = [
                'status' => false,
                'meg' => $conn->error
            ];
        }
        echo json_encode($data);
        break;
    case 'label':
        # code...
        break;
    default:
        # code...
        break;
}
