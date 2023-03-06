<?php
require_once './connect.php';
// require_once './function.php';
date_default_timezone_set("Asia/Bangkok");

$request_data = json_decode(file_get_contents("php://input"));
$action = $request_data->action;
session_start();

switch ($action) {
    case 'login':
        $admin_username = $request_data->admin_username;
        $admin_password = $request_data->admin_password;
        $sql = "SELECT admin_username, admin_password, admin_id, admin_level FROM tb_admin WHERE admin_username = '" . $admin_username . "' AND admin_password = '" . $admin_password . "'";
        $result = $conn->query($sql);
        if ($result) {
            if ($result->num_rows == 1) {
                $row = $result->fetch_object();
                $_SESSION['admin_id'] = $row->admin_id;
                $_SESSION['admin_level'] = $row->admin_level;
                $sql = "UPDATE tb_admin SET admin_last_login = '" . $dateTime . "' WHERE admin_id = '" . $row->admin_id . "'";
                $result = $conn->query($sql);
                if ($result) {
                    $data = [
                        'status' => true,
                        'meg' => 'เข้าสู่ระบบสำเร็จ',
                        'admin_level' => $row->admin_level
                    ];
                }
            } else {
                $data = [
                    'status' => false,
                    'meg' => 'ไม่พบข้อมูล'
                ];
            }
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
