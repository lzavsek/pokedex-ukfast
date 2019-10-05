<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    function home($offset=null) {
        $url = 'https://pokeapi.co/api/v2/pokemon/';
        if ($offset) {
            $url .= '?offset=' . $offset . '&limit=20';
        }
        $pokemons = json_decode(file_get_contents($url), false);
        return view('list')->withPokemons($pokemons);
    }
    
    function detail($id) {
        $json = file_get_contents('https://pokeapi.co/api/v2/pokemon/' . $id);
        $pokemon = json_decode($json, false);
        return view('pokemon')->withPokemon($pokemon);
    }

    function search() {
        $json = @file_get_contents('https://pokeapi.co/api/v2/pokemon/' . strtolower(request('name')));
        if ($json === false) {
            return view('notfound');
        } else {
            $pokemon = json_decode($json, false);
            return view('pokemon')->withPokemon($pokemon);
        }
    }
}
