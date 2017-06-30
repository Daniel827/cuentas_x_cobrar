<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPanelController extends Controller{
  public function __construct() {
  }

  public function index(){
      return view('panel.index');
  }

  public function profile(){
      return view('panel.profile');
  }

  public function getPDF(){
    return \PDF::loadFile('http://www.github.com')->inline('github.pdf');
    //return \PDF::loadView('panel.index')->download('inicio.pdf');
  }
}
