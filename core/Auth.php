<?php
class Auth
{
    public static function login($user)
    {
        //  مهم جداً! منع هجوم Session Fixation
        session_regenerate_id(true);
        // تخزين بيانات المستخدم في الجلسة
        $_SESSION['user'] = [
            'id' => $user['id'],
            'name' => $user['name'],
            'role' => $user['role']
        ];
    }

    public static function logout()
    {
        // تجديد معرف الجلسة
        session_regenerate_id(true);
        // تفريغ بيانات الجلسة
        session_unset();
        // تدمير الجلسة
        session_destroy();
        redirect('index.php?page=login');
    }

    public static function check()
    {
        // التحقق من أن المستخدم مسجل الدخول
        return isset($_SESSION['user']);
    }

    public static function currentUser()
    {
        // إرجاع بيانات المستخدم الحالي
        return $_SESSION['user'] ?? null;
    }

    public static function role()
    // إرجاع دور المستخدم الحالي
    {
        return $_SESSION['user']['role'] ?? '';
    }

    public static function userId()
    // إرجاع معرف المستخدم الحالي
    {
        return $_SESSION['user']['id'] ?? 0;
    }

    public static function requireRole(...$roles)
    {
        // التحقق من أن المستخدم مسجل الدخول وأن لديه الدور المناسب
        if (!self::check()) {
            redirect('index.php?page=login');
        }

        if (!in_array(self::role(), $roles)) {
            redirect('index.php?page=403');
        }
    }
}
