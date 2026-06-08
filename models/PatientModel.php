<?php

require_once 'BaseModel.php';

class PatientModel extends BaseModel
{

    //تبحث عن مريض بواسطة معرف المستخدم المرتبط به
    public function findByUserId($userId)
    {
        return $this->fetchOne("
            SELECT *
            FROM users
            WHERE id = ?
            AND role = 'patient'
        ", "i", [$userId]);
    }

    //جلب كل المرضى
    public function getAll()
    {
        $sql = "SELECT id, name, email, phone, created_at
                FROM users
                WHERE role = 'patient'
                ORDER BY name ASC";
        $result = $this->execute($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    //جلب مريض بواسطة معرفه
    public function findById($id)
    {
        $sql = "SELECT * FROM users WHERE id = ? AND role = 'patient'";
        $result = $this->execute($sql, 'i', [$id]);
        return $result->fetch_assoc();
    }

    //حساب إجمالي عدد المرضى
    public function countAll()
    {
        $sql = "SELECT COUNT(*) as total FROM users WHERE role = 'patient'";
        $result = $this->execute($sql);
        $row = $result->fetch_assoc();
        return $row['total'] ?? 0;
    }

    //جلب المرضى مع دعم الترقيم
    public function getAllPaginated($page = 1, $itemsPerPage = 10)
    {
        $offset = ($page - 1) * $itemsPerPage;
        $sql = "SELECT id, name, email, phone, created_at
                FROM users
                WHERE role = 'patient'
                ORDER BY name ASC
                LIMIT ? OFFSET ?";
        $result = $this->execute($sql, 'ii', [$itemsPerPage, $offset]);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    //إنشاء مريض جديد
    public function create($name, $email, $password, $phone = '')
    {
        $hashed = password_hash($password, PASSWORD_BCRYPT);
        $sql = "INSERT INTO users (name, email, password, role, phone)
                VALUES (?, ?, ?, 'patient', ?)";
        return $this->execute($sql, 'ssss', [$name, $email, $hashed, $phone]);
    }

    //تحديث بيانات المريض
    public function update($id, $name, $email, $phone = '')
    {
        $sql = "UPDATE users SET name = ?, email = ?, phone = ?
                WHERE id = ? AND role = 'patient'";
        return $this->execute($sql, 'sssi', [$name, $email, $phone, $id]);
    }

    //حذف مريض
    public function delete($id)
    {
        $sql = "DELETE FROM users WHERE id = ? AND role = 'patient'";
        return $this->execute($sql, 'i', [$id]);
    }

    //تفعيل أو تعطيل حساب المريض
    public function toggleActive($id)
    {
        $sql = "UPDATE users SET is_active = NOT is_active
                WHERE id = ? AND role = 'patient'";
        return $this->execute($sql, 'i', [$id]);
    }

    //جلب جميع الوصفات الطبية لمريض معين
    public function searchPatients($search = '')
    {
        $search = trim($search);

        if ($search === '') {
            return $this->getAll();
        }

        $sql = "SELECT id, name, email, phone, created_at
                FROM users
                WHERE role = 'patient'
                AND (
                    name  LIKE ?
                    OR email LIKE ?
                )
                ORDER BY name ASC";

        $like = '%' . $search . '%';
        $result = $this->execute($sql, 'ss', [$like, $like]);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}