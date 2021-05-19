<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Movie {

    public $title;
    public $description;

    public function __construct($title,$description = 'Descrizione non presente'){

        $this -> title = $title;
        $this -> description = $description;
    }

    public function getString(){
        return 'Titolo film: '. $this -> title. "\n".'Genere: '. $this -> description;
    }
}

class TestController2 extends Controller
{
    public function userControl(){

        $movie1 = new Movie('Il Padrino','Cartone animato');
        $movie1 ->description = 'Gangsta Movie';
        $movie1Str = $movie1 -> getString();

        $movie2 = new Movie('Il Padrino 2');
        $movie2Str = $movie2 -> getString();

        $movie3 = new Movie('Il Padrino 3');
        $movie4 = new Movie('The Ring','Film Horror');

        $movies = [
            $movie1,
            $movie2,
            $movie3,
            $movie4,
        ];

        $str = '';
        foreach($movies as $movie){
            $str .= $movie -> getString() . "\n\n";
        }
        dd($movie1,$movie2,$movie3,$movie4,$str);

        return view('pages.miaPagina');
    }
}