<?php

class Users{
    public function index(){
        $users = [
            'user1',
            'user2',
            'user3'
        ];
        $data['users'] = $users;
        $data['title'] = 'Hello';
        $view = new View;
        $view->render('users/index.php', $data);
    }

    public function test(){
        echo "testUsers";
    }
}