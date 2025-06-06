<?php
class SessionHelper
{
    // Khởi động session nếu chưa bắt đầu
    public static function start()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }
    // Kiểm tra người dùng đã đăng nhập chưa
    public static function isLoggedIn()
    {
        self::start();
        return isset($_SESSION['username']);
    }
    public static function isAdmin()
    {
        return isset($_SESSION['username']) && $_SESSION['user_role'] === 'admin';
    }
    // Lấy vai trò của người dùng, mặc định là 'user'
    public static function getRole()
    {
        self::start();
        return $_SESSION['role'] ?? 'user';
    }
}
