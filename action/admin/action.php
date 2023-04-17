<?php
require_once '../connect.php';
// require_once './function.php';
date_default_timezone_set("Asia/Bangkok");

$request_data = json_decode(file_get_contents("php://input"));
$action = $request_data->action;
session_start();

switch ($action) {
    case 'get_info_user':
        $admin_id = $request_data->admin_id;
        $sql = "SELECT * FROM tb_admin WHERE admin_id = '" . $admin_id . "'";
        $result = $conn->query($sql);
        if ($result) {
            $data = [
                'status' => true,
                'result' => $result->fetch_object()
            ];
        } else {
            $data = [
                'status' => false,
                'meg' => $conn->error
            ];
        }
        echo json_encode($data);
        break;
    case 'get_list_admin':
        $sql = "SELECT * FROM tb_admin";
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
    case 'add_admin':
        $admin_gender = $request_data->admin_gender;
        $admin_fname = $request_data->admin_fname;
        $admin_lname = $request_data->admin_lname;
        $admin_username = $request_data->admin_username;
        $admin_password = $request_data->admin_password;
        $admin_level = $request_data->admin_level;
        $sql_check_username = "SELECT admin_id FROM tb_admin WHERE admin_username = '" . $admin_username . "'";
        $result_check_username = $conn->query($sql_check_username);
        if ($result_check_username && $result_check_username->num_rows == 0) {
            $sql = "INSERT INTO tb_admin(admin_gender, admin_fname, admin_lname, admin_username, admin_password, admin_level) VALUES ('" . $admin_gender . "',
                                                                                                                                      '" . $admin_fname . "',
                                                                                                                                      '" . $admin_lname . "',
                                                                                                                                      '" . $admin_username . "',
                                                                                                                                      '" . $admin_password . "',
                                                                                                                                      '" . $admin_level . "')";
            $result = $conn->query($sql);
            if ($result) {
                $data = [
                    'status' => true,
                    'meg' => 'บันทึกข้อมูลสำเร็จ'
                ];
            } else {
                $data = [
                    'status' => false,
                    'meg' => $conn->error
                ];
            }
        } else {
            $data = [
                'status' => false,
                'meg' => 'username นี้มีในระบบอยู่แล้ว'
            ];
        }

        echo json_encode($data);

        break;
    case 'edit_admin':
        $admin_id = $request_data->admin_id;
        $admin_gender = $request_data->admin_gender;
        $admin_fname = $request_data->admin_fname;
        $admin_lname = $request_data->admin_lname;
        $admin_username = $request_data->admin_username;
        $admin_password = $request_data->admin_password;
        $admin_level = $request_data->admin_level;
        $sql = "UPDATE tb_admin SET admin_gender = '" . $admin_gender . "',
                                    admin_fname = '" . $admin_fname . "',
                                    admin_lname = '" . $admin_lname . "',
                                    admin_username = '" . $admin_username . "',
                                    admin_password = '" . $admin_password . "',
                                    admin_level = '" . $admin_level . "' WHERE admin_id = '" . $admin_id . "'";
        $result = $conn->query($sql);
        if ($result) {
            $data = [
                'status' => true,
                'meg' => 'อัพเดทข้อมูลสำเร็จ'
            ];
        } else {
            $data = [
                'status' => false,
                'meg' => $conn->error
            ];
        }
        echo json_encode($data);
        break;
    case 'del_admin':
        $admin_id = $request_data->admin_id;
        $sql = "DELETE FROM tb_admin WHERE admin_id = '" . $admin_id . "'";
        $result = $conn->query($sql);
        if ($result) {
            $data = [
                'status' => true,
                'meg' => 'ลบข้อมูลสำเร็จ'
            ];
        } else {
            $data = [
                'status' => false,
                'meg' => $conn->error
            ];
        }
        echo json_encode($data);
        break;
    default:
        # code...
        break;
}
