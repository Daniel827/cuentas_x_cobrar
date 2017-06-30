<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Http\Requests;
use App\Http\Requests\PagoRequest;
use App\Pago;


class PagoController extends Controller
{
    public function _construct(){
      $this -> middleware('auth');
    }

   public function index(){
      $pagos=Pago::paginate(10);
      return view('panel.pagos.index', compact('pagos'));
    }

    public function create(){
      // llamar al listado de clientes del ws
      $pagos=Pago::get();
      return view('panel.pagos.create',compact("pagos"));
    }

    public function store(PagoRequest $request){
      Pago::create($request->all());
      //return view('productos.index');
}
}