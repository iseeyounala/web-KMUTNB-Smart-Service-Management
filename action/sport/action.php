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
    case 'get_list_sport':
        $sql = "SELECT eq_id,
                       eq_sport_name,
                       eq_sport_amount FROM tb_sports_equipment";
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
    case 'add_sport':
        $eq_sport_name = $request_data->eq_sport_name;
        $eq_sport_amount = $request_data->eq_sport_amount;
        $sql = "INSERT INTO tb_sports_equipment(eq_sport_name, eq_sport_amount) VALUES ('" . $eq_sport_name . "', '" . $eq_sport_amount . "')";
        $result = $conn->query($sql);
        if ($result) {
            $data = [
                'status' => true,
                'meg' => 'เพิ่มช้อมูลสำเร็จ'
            ];
        } else {
            $data = [
                'status' => false,
                'meg' => $conn->error
            ];
        }
        echo json_encode($data);
        break;
    case 'edit_sport':
        $eq_id = $request_data->eq_id;
        $eq_sport_name = $request_data->eq_sport_name;
        $eq_sport_amount = $request_data->eq_sport_amount;
        $sql = "UPDATE tb_sports_equipment SET eq_sport_name = '" . $eq_sport_name . "',
                                         eq_sport_amount = '" . $eq_sport_amount . "' WHERE eq_id = '" . $eq_id . "'";
        $result = $conn->query($sql);
        if ($result) {
            $data = [
                'status' => true,
                'meg' => 'แก้ไขข้อมูลสำเร็จ'
            ];
        } else {
            $data = [
                'status' => false,
                'meg' => $conn->error
            ];
        }
        echo json_encode($data);
        break;
    case 'del_sport':
        $eq_id = $request_data->eq_id;
        $sql = "DELETE FROM tb_sports_equipment WHERE eq_id = '" . $eq_id . "'";
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
    case 'get_list_borrowing':
        $sql = "SELECT * FROM tb_borrow_equipment AS a LEFT JOIN tb_student AS b ON a.std_id = b.std_id";
        $result = $conn->query($sql);
        if ($result) {
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_object()) {
                    $data_[] = $row;
                }
            } else {
                $data_ = [];
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
    case 'del_borrowing':
        $eq_br_id = $request_data->eq_br_id;
        $sql = "DELETE FROM tb_borrow_equipment WHERE eq_br_id = '" . $eq_br_id . "'";
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
    case 'list_br_table':
        $eq_br_id = $request_data->eq_br_id;
        $sql = "SELECT * FROM tb_borrow_list AS a LEFT JOIN tb_sports_equipment AS b ON a.eq_id = b.eq_id WHERE a.eq_br_id = '".$eq_br_id."'";
        $result = $conn->query($sql);
        if ($result) {
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_object()) {
                    $data_[] = $row;
                }
            } else {
                $data_ = [];
            }

            $data = [
                'status' => true,
                'result' => $data_,
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
