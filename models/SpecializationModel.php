<?php
require_once 'BaseModel.php';

class SpecializationModel extends BaseModel {
//جلب كل التخصصات الطبية
    public function getAll() {
        $sql = "SELECT * FROM specializations ORDER BY name";
        $result = $this->execute($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
//إضافة تخصص جديد
    public function create($name) {
        $sql = "INSERT INTO specializations (name) VALUES (?)";
        return $this->execute($sql, 's', [$name]);
    }
//حذف تخصص
    public function delete($id) {
        $sql = "DELETE FROM specializations WHERE id = ?";
        return $this->execute($sql, 'i', [$id]);
    }
//التحقق مما إذا كان من الآمن حذف تخصص (أي لا يوجد أطباء مرتبطين به)
    public function isSafeToDelete($id) {
        $sql = "SELECT COUNT(*) as total FROM doctors WHERE specialization_id = ?";
        $result = $this->execute($sql, 'i', [$id]);
        $row = $result->fetch_assoc();
        return $row['total'] == 0;
    }
}