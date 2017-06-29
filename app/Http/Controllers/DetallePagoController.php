<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;
use App\Http\Requests\DetallePagoFormRequest;
use App\DetallePago;
use App\Pago;
use DB;
use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;

class DetallePagoController extends Controller
{
  public function _construct(){
   $this -> middleware('auth');
 }

 public function index(){
   $detallespago=DetallePago::paginate(10);
   return view('panel.pagos.index', compact('detallespago'));
 }

 public function create(){
   return view('panel.pagos.create');
 }

 public function store(DetallePagoFormRequest $request){
   DetallePago::create($request->all());
      return Redirect::to('detallespago');
 }

 public function show(DetallePagoFormRequest $request){
   DetallePago::create($request->all());
      return Redirect::to('detallespago');
 }

 public function edit($id){
   $detallepago=DetallePago::find($id);
   return view('panel.pagos.edit', compact('detallepago'));
 }

 public function update(DetallePagoFormRequest $request, $id){
   DetallePago::updateOrCreate(['idDetalle'=>$id], $request->all());
   return Redirect::to('detallespagos');
 }

 public function destroy($id){
   DetallePago::destroy($id);
   return Redirect::to('detallepago');
 }
}
