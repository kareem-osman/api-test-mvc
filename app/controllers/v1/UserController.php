<?php
require_once __DIR__ . '/../../models/User.php';
require_once __DIR__ . '/../../core/Response.php';

class UserControllerV1 {
    public function index() {
        Response::json(["version"=>"v1","data"=>User::all()]);
    }
}
