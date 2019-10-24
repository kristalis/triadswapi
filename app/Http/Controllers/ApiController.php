<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;

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
        
        
    }

    public function indexCache()
    {
        $results =  Cache::remember('swapiData', 22*60, function() {
        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', 'https://swapi.co/api/people/');
        $response = $res->getBody();
        $response = json_decode($response,true);
        $resultc =   $response['results'];
   
        return $resultc;
        });
       
        return view('welcome',['results'=> $results]);
        
        
    }


}
