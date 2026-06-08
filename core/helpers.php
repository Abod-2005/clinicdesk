<?php

// منع XSS - تنظيف النص قبل عرضه
function sanitize($data)
{
    return htmlspecialchars(trim((string) ($data ?? '')), ENT_QUOTES, 'UTF-8');
}
// التوجيه إلى صفحة أخرى
function redirect($url)
{
    header("Location: $url");
    exit;//*/
}
// نسيق التاريخ (2026-06-08 → 08 Jun 2026)
function formatDate($date)
{
    return date('d M Y', strtotime($date));
}
// نسيق الوقت (14:30:00 → 2:30 PM)
function formatTime($time)
{
    return date('h:i A', strtotime($time));
}
// دالة للحصول على فئة Bootstrap المناسبة لحالة الحجز
function getStatusBadgeClass($status)
{
    $classes = [
        'pending' => 'warning',
        'confirmed' => 'info',
        'completed' => 'success',
        'cancelled' => 'danger'
    ];
    return $classes[$status] ?? 'secondary';
}