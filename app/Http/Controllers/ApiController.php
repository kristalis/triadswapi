<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ApiController extends Controller
{
    public function index()
    {

        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', 'https://swapi.co/api/people/');
        $response = $res->getBody();
        $response = json_decode($response,true);
        $results = $response['results'];
        $count = $response['count'];
       $next = $response['next'];
        return view('welcome',['results'=> $results, 'count'=>$count]);
        //dd($response);,['overview'=> $overview
        //dd($response['results'][9]['name']);
        
    }


}
