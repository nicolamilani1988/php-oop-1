<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class User {

    public $userName;
    public $password;

    public function __construct($user,$pw = null){
        $this -> userName = $user;
        $this -> password = $pw;

        if($pw === null){
            $this -> password = uniqId();
        }
    }

    public function getString(){
        return 'Username: '. $this -> userName. "\n".'Password: '. $this -> password;
    }
}

class TestController extends Controller
{
    public function home(){

        $user1 = new User('Default1988','PW-Default');
        $user1 ->userName  = 'Nicola1988';
        $user1 ->password = 'NicolaPassword';
        $user1Str = $user1 -> getString();

        $user2 = new User('Default1988');
        //$user2 ->userName  = '1984Marta';
        //$user2 ->password = 'PassMarta';
        $user2Str = $user2 -> getString();

        $user3 = new User('Utente3');
        $user4 = new User('Utente4','MiaPassword4');

        $users = [
            $user1,
            $user2,
            $user3,
            $user4,
        ];

        $str = '';
        foreach($users as $user){
            $str .= $user -> getString() . "\n\n";
        }
        dd($user1,$user2,$user3,$user4,$str);

        return view('pages.miaPagina');
    }
}
