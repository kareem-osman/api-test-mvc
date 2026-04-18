<?php
require_once __DIR__ . '/../../models/User.php';
require_once __DIR__ . '/../../core/Response.php';

class UserControllerV2 {
    public function index() {
        $data = User::all();
        foreach ($data as &$u) {
            $u['role'] = 'user';
        }
        Response::json(["version"=>"v2","data"=>$data]);
    }
}
