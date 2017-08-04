<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Http\Requests;
use App\Http\Requests\TipoPagoRequest;
use App\TipoPago;

/**
 * Controlador TipoPagoController, CRUD de tipos de pago
 */
class TipoPagoController extends Controller
{
    /**
     * Solo los usuarios con rol admin puede acceder a los métodos
     */
     public function __construct(){
       $this->middleware('role:admin');
    }


    /**
     *  Redirige al listado de tipos de pago
     * @return View Página de listado de tipos de pago
     */
    public function index(){
      $tipopagos=TipoPago::orderBy('codigo','desc')->paginate(10);
      return view('panel.tipopagos.index', compact('tipopagos'));
    }

    /**
     * Redirige al formulario para registrar un nuevo tipo de pago
     * @return View Página para registrar un nuevo tipo de pago
     */
    public function create(){
      return view('panel.tipopagos.create');
    }

    /**
     * Registra un tipo de pago
     * @param  TipoPagoRequest $request Atributos del tipo de pago
     * @return Redirect Ruta para listar tipos de pago
     */
    public function store(TipoPagoRequest $request){
      TipoPago::create($request->all());
         return Redirect::to('tipopagos/create')->with('success', 'Tipo de pago creado');
    }

    /**
     * Redirige al formulario para editar el tipo de pago
     * @param  int $id ID del tipo de pago
     * @return  View  Página para editar un tipo de pago
     */
    public function edit($id){
      $tipopago=TipoPago::find($id);
      return view('panel.tipopagos.edit', compact('tipopago'));
    }

    /**
     * Actualiza un tipo de pago
     * @param  TipoPagoRequest $request Atributos del tipo de pago
     * @param  int          $id      ID del tipo de pago
     * @return View Vista anterior
     */
    public function update(TipoPagoRequest $request, $id){
      TipoPago::updateOrCreate(['idtipopago'=>$id], $request->all());
      return back()->with('success', 'Tipo de pago actualizado');
    }
}
