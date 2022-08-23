<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Home;
use App\Model\Certification;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $result = Home::first();
        $certifications = Certification::where('status','1')->orderby('displayOrder','ASC')->get();

        return view('front.home.home',['home'=>$result,'certifications'=>$certifications]);
    }

    public function insipirations()
    {
        return view('front.insipiration.insipiration');
    }

    public function infrastructure()
    {
        return view('front.infrastructure.infrastructure');
    }

    public function export()
    {
        return view('front.export.export');
    }
    public function download()
    {
        return view('front.download.download');
    }

    public function resource()
    {
        return view('front.resource.resource');
    }

    public function visualizers()
    {
        return view('front.visualizer.visualizer');
    }

    public function investors()
    {
        return view('front.investors.investors');
    }

    public function whereToBuy()
    {
        return view('front.where-to-buy.where-to-buy');
    }

}
