<?php
// attendance_process.php
include 'db_connect.php';

$data = json_decode(file_get_contents('php://input'), true);
$action = $data['action'];

if ($action === 'add') {
    $stmt = $conn->prepare("
        INSERT INTO attendance 
        (fullname, date_090125, date_090225, date_090325, date_090425, date_090525, total_absent)
        VALUES (?, ?, ?, ?, ?, ?, ?)
    ");
    $stmt->bind_param("ssssssi",
        $data['fullname'],
        $data['d1'], $data['d2'], $data['d3'],
        $data['d4'], $data['d5'], $data['total']
    );
    $stmt->execute();
    echo json_encode(['status' => 'success', 'message' => 'Added successfully']);

} elseif ($action === 'update') {
    $stmt = $conn->prepare("
        UPDATE attendance SET
        fullname=?, date_090125=?, date_090225=?, date_090325=?, date_090425=?, date_090525=?, total_absent=?
        WHERE attendance_id=?
    ");
    $stmt->bind_param("ssssssii",
        $data['fullname'], $data['d1'], $data['d2'], $data['d3'],
        $data['d4'], $data['d5'], $data['total'], $data['id']
    );
    $stmt->execute();
    echo json_encode(['status' => 'success', 'message' => 'Updated successfully']);

} elseif ($action === 'delete') {
    $stmt = $conn->prepare("DELETE FROM attendance WHERE attendance_id=?");
    $stmt->bind_param("i", $data['id']);
    $stmt->execute();
    echo json_encode(['status' => 'success', 'message' => 'Deleted successfully']);
}

$conn->close();
?>
