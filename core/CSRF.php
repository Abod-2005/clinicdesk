<?php
class CSRF
{
    // إنشاء توكن (رمز سري) للنموذج
    public static function generateToken()
    {
        //اذا مش موجود بننشئ واحد جديد واذا موجود بنرجعه
        if (empty($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }
        return $_SESSION['csrf_token'];
    }
    // التحقق من صحة التوكن المرسل من النموذج
    public static function validateToken($token)
    {
        if (empty($_SESSION['csrf_token'])) {
            return false;
        }
        return hash_equals($_SESSION['csrf_token'], $token);
    }
}