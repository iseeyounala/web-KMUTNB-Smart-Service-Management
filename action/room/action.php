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
    case 'get_list_check_point':
        $sql = "SELECT * FROM tb_checkpoint_room";
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
    case 'add_check_point':
        $cpr_name =  $request_data->cpr_name;
        $cpr_lat =  $request_data->cpr_lat;
        $cpr_long =  $request_data->cpr_long;
        $sql = "INSERT INTO tb_checkpoint_room(cpr_name, cpr_lat, cpr_long) VALUES ('" . $cpr_name . "', '" . $cpr_lat . "', '" . $cpr_long . "')";
        $result = $conn->query($sql);
        if ($result) {
            $data = [
                'status' => true,
                'meg' => 'เพิ่มข้อมูลสำเร็จ'
            ];
        } else {
            $data = [
                'status' => false,
                'meg' => $conn->error
            ];
        }
        echo json_encode($data);
        break;
    case 'edit_check_point':
        $cpr_id = $request_data->cpr_id;
        $cpr_name =  $request_data->cpr_name;
        $cpr_lat =  $request_data->cpr_lat;
        $cpr_long =  $request_data->cpr_long;
        $sql = "UPDATE tb_checkpoint_room SET cpr_name = '" . $cpr_name . "',
                                              cpr_lat = '" . $cpr_lat . "',
                                              cpr_long = '" . $cpr_long . "' WHERE cpr_id = '" . $cpr_id . "'";
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
    case 'del_check_point':
        $cpr_id = $request_data->cpr_id;
        $sql = "DELETE FROM tb_checkpoint_room WHERE cpr_id = '" . $cpr_id . "'";
        $result = $conn->query($sql);
        if ($result) {
            $data = [
                'status' => true,
                'meg' => 'ลบช้อมูลสำเร็จ'
            ];
        } else {
            $data = [
                'status' => false,
                'meg' => $conn->error
            ];
        }
        echo json_encode($data);
        break;
    case 'get_list_room':
        $sql = "SELECT a.rtt_id,
                       a.cpr_id,
                       b.cpr_name,
                       a.rtt_name,
                       a.rtt_join_amount FROM tb_room_tutor AS a LEFT JOIN tb_checkpoint_room AS b ON a.cpr_id = b.cpr_id";
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
    case 'add_room':
        $cpr_id = $request_data->cpr_id;
        $rtt_name = $request_data->rtt_name;
        $rtt_join_amount = $request_data->rtt_join_amount;
        $sql = "INSERT INTO tb_room_tutor(cpr_id, rtt_name, rtt_join_amount) VALUES ('" . $cpr_id . "', '" . $rtt_name . "', '" . $rtt_join_amount . "')";
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
    case 'edit_room':
        $rtt_id = $request_data->rtt_id;
        $cpr_id = $request_data->cpr_id;
        $rtt_name = $request_data->rtt_name;
        $rtt_join_amount = $request_data->rtt_join_amount;
        $sql = "UPDATE tb_room_tutor SET cpr_id = '" . $cpr_id . "',
                                         rtt_name = '" . $rtt_name . "',
                                         rtt_join_amount = '" . $rtt_join_amount . "' WHERE rtt_id = '" . $rtt_id . "'";
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
    case 'del_room':
        $rtt_id = $request_data->rtt_id;
        $sql = "DELETE FROM tb_room_tutor WHERE rtt_id = '" . $rtt_id . "'";
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
    case 'get_list_booking':
        $sql = "SELECT a.booking_rtt_id,
                       a.std_id,
                       b.std_number_id,
                       b.std_gender,
                       b.std_fname,
                       b.std_lname,
                       c.rtt_id,
                       c.rtt_name,
                       a.booking_date,
                       a.booking_start_time,
                       a.booking_end_time,
                       a.booking_status FROM tb_booking_room_tutor AS a LEFT JOIN tb_student AS b ON a.std_id = b.std_id 
                                                        LEFT JOIN tb_room_tutor AS c ON a.rtt_id = c.rtt_id WHERE a.booking_status = 0 OR a.booking_status = 1";
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
    case 'del_booking':
        $booking_rtt_id = $request_data->booking_rtt_id;
        $sql = "DELETE FROM tb_booking_room_tutor WHERE booking_rtt_id = '" . $booking_rtt_id . "'";
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
    case 'edit_booking':
        $booking_rtt_id = $request_data->booking_rtt_id;
        $booking_start_time = $request_data->booking_start_time;
        $booking_end_time = $request_data->booking_end_time;
        $sql = "UPDATE tb_booking_room_tutor SET booking_start_time = '" . $booking_start_time . "', 
                                                 booking_end_time = '" . $booking_end_time . "' WHERE booking_rtt_id = '" . $booking_rtt_id . "'";
        $result = $conn->query($sql);
        if ($result) {
            $data = [
                'status' => true,
                'meg' => 'แก้ไขสำเร็จ'
            ];
        } else {
            $data = [
                'status' => false,
                'meg' => $conn->error
            ];
        }
        echo json_encode($data);
        break;
    case 'get_list_detail_room':
        $sql = "SELECT * FROM tb_detail_room AS a LEFT JOIN tb_room_tutor AS b ON a.rtt_id = b.rtt_id";
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
                'result' => $conn->error
            ];
        }
        echo json_encode($data);
        break;
    case 'add_detail_room':
        $rtt_id = $request_data->rtt_id;
        $detail_room_name = $request_data->detail_room_name;
        $sql = "INSERT INTO tb_detail_room(rtt_id, detail_room_name) VALUES ('" . $rtt_id . "', '" . $detail_room_name . "')";
        $result = $conn->query($sql);
        if ($result) {
            $data = [
                'status' => true,
                'meg' => "เพิ่มสำเร็จ"
            ];
        } else {
            $data = [
                'status' => false,
                'meg' => $conn->error
            ];
        }
        echo json_encode($data);
        break;
    case 'edit_detail_room':
        $detail_room_id = $request_data->detail_room_id;
        $detail_room_name = $request_data->detail_room_name;
        $sql = "UPDATE tb_detail_room SET detail_room_name = '" . $detail_room_name . "' WHERE detail_room_id = '" . $detail_room_id . "'";
        $result = $conn->query($sql);
        if ($result) {
            $data = [
                'status' => true,
                'meg' => "แก้ไขสำเร็จ"
            ];
        } else {
            $data = [
                'status' => false,
                'meg' => $conn->error
            ];
        }
        echo json_encode($data);
        break;
    case 'del_detail_room':
        $detail_room_id = $request_data->detail_room_id;
        $sql = "DELETE FROM tb_detail_room WHERE detail_room_id = '" . $detail_room_id . "'";
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
