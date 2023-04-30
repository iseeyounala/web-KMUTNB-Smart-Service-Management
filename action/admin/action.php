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
    case 'get_student':
        $sql = "SELECT * FROM tb_student AS a LEFT JOIN tb_department AS b ON a.dpm_id = b.dpm_id
        LEFT JOIN tb_faculty AS c ON a.fct_id = c.fct_id";
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
    case 'getlist_announcement':
        $sql = "SELECT * FROM tb_announcement";
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
    case 'add_announcement':
        $announcement_name = $request_data->announcement_name;
        $announcement_detail = $request_data->announcement_detail;
        $sql = "INSERT INTO tb_announcement(announcement_name, announcement_detail, announcement_created_at) VALUES ('" . $announcement_name . "', '" . $announcement_detail . "', NOW())";
        $result = $conn->query($sql);
        if ($result) {
            $data = [
                'status' => true,
                'meg' => 'สำเร็จ'
            ];
        } else {
            $data = [
                'status' => false,
                'meg' => $announcement_name
            ];
        }
        echo json_encode($data);
        break;
    case 'edit_announcement':
        $announcement_id = $request_data->announcement_id;
        $announcement_name = $request_data->announcement_name;
        $announcement_detail = $request_data->announcement_detail;
        $sql = "UPDATE tb_announcement SET announcement_name = '" . $announcement_name . "',
                                           announcement_detail = '" . $announcement_detail . "' WHERE announcement_id = '" . $announcement_id . "'";
        $result = $conn->query($sql);
        if ($result) {
            $data = [
                'status' => true,
                'meg' => 'สำเร็จ'
            ];
        } else {
            $data = [
                'status' => false,
                'meg' => $conn->error
            ];
        }
        echo json_encode($data);
        break;
    case 'del_announcement':
        $announcement_id = $request_data->announcement_id;
        $sql = "DELETE FROM tb_announcement WHERE announcement_id = '" . $announcement_id . "'";
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
    case 'get_activity':
        $sql = "SELECT * FROM tb_event WHERE event_del_status = 0";
        $result = $conn->query($sql);
        $dataResult = [];
        if ($result) {
            while ($row = $result->fetch_object()) {
                $sql_count = "SELECT COUNT(ev_join_id) as sum_ FROM tb_event_join WHERE event_id = '" . $row->event_id . "'";
                $result_count = $conn->query($sql_count);
                $fet = $result_count->fetch_object();
                $data_ = [
                    'event_id' => $row->event_id,
                    'event_img' => $row->event_img,
                    'event_name' => $row->event_name,
                    'event_detail' => $row->event_detail,
                    'event_start_date' => $row->event_start_date,
                    'event_end_date' => $row->event_end_date,
                    'amount_join' => $fet->sum_,
                ];
                array_push($dataResult, $data_);
            }
            $data = [
                'status' => true,
                'result' => $dataResult
            ];
        } else {
            $data = [
                'status' => false,
                'meg' => $conn->error
            ];
        }
        echo json_encode($data);
        break;
    case 'get_join_std':
        $event_id = $request_data->event_id;
        $sql = "SELECT * FROM tb_event_join AS a LEFT JOIN tb_student AS b ON a.std_id = b.std_id WHERE a.event_id = '" . $event_id . "'";
        $result = $conn->query($sql);
        $dataResult = [];
        if ($result) {
            while ($row = $result->fetch_object()) {
                $sql_department = "SELECT * FROM tb_department WHERE dpm_id = '" . $row->dpm_id . "'";
                $result_department = $conn->query($sql_department);
                $fet_department = $result_department->fetch_object();
                $result_faculty = $conn->query("SELECT * FROM tb_faculty WHERE fct_id = '" . $row->fct_id . "'");
                $fet_faculty = $result_faculty->fetch_object();
                $data_ = [
                    'std_id' => $row->std_id,
                    'std_number_id' => $row->std_number_id,
                    'std_fname' => $row->std_fname,
                    'std_lname' => $row->std_lname,
                    'fct_name' => $fet_faculty->fct_name,
                    'dpm_name' => $fet_department->dpm_name,
                    'ev_join_id' => $row->ev_join_id,
                ];
                array_push($dataResult, $data_);
            }
            $data = [
                'status' => true,
                'result' => $dataResult
            ];
        } else {
            $data = [
                'status' => false,
                'meg' => $conn->error
            ];
        }
        echo json_encode($data);
        break;
    case 'get_report_std':
        $ev_join_id = $request_data->ev_join_id;
        $sql = "SELECT * FROM tb_report_event WHERE ev_join_id = '" . $ev_join_id . "'";
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
    default:
        # code...
        break;
}
