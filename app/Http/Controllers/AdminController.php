<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    function index(){
        return view('admin');
    }
    function kepsek(){
        return view('admin');
    } 
    function operator(){
        return view('admin');
    } 
    function guru(){
        return view('admin');
    } 
    function siswa(){
        return view('admin');
    }     
}
