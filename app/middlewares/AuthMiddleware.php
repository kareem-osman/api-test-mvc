<?php
require_once __DIR__ . '/../core/Response.php';

class AuthMiddleware {
    private static $validToken = "secret123";

    public static function handle() {
        $headers = function_exists('getallheaders') ? getallheaders() : [];
        $auth = $headers['Authorization'] ?? $headers['authorization'] ?? null;

        if (!$auth) {
            Response::json(["message"=>"Unauthorized"], 401);
        }

        if (strpos($auth, 'Bearer ') !== 0) {
            Response::json(["message"=>"Invalid header"], 401);
        }

        $token = str_replace('Bearer ', '', $auth);
        if ($token !== self::$validToken) {
            Response::json(["message"=>"Invalid token"], 401);
        }
    }
}
