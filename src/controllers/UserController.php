<?php
class UserController
{
    public function index(Request $request, Response $response)
    {
        $users = [
            ["id" => 1, "name" => "Daniel Garcia"],
            ["id" => 2, "name" => "Jimena Sanchez"]
        ];

        $response->send(200, $users);
    }
}
