<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;


class PagesController extends Controller
{

    public function index()
    {

        //$fetchAuthors = file_get_contents('http://localhost:8000/api/authors?api_token=Sczf7sz354cMlsrH5GwId6WMWdwTy4mhj5XL1MjSwohfKK5GsTp6HGgkzac9');
        //$decodedAuthors = json_decode($fetchAuthors, true);

        $client = new Client();
        $res = $client->request('GET', 'http://localhost:8000/api/authors', [
            'headers' => [
                'api_token' => ['Sczf7sz354cMlsrH5GwId6WMWdwTy4mhj5XL1MjSwohfKK5GsTp6HGgkzac9']
            ]
            ]);
        if($res->getStatusCode() == 200){
            $decodedAuthors = json_decode($res->getBody(), true);
        } else {
            $decodeAuthors = [];
        }
        

        return view('home')->with('decodedAuthors', $decodedAuthors);
    }

}
