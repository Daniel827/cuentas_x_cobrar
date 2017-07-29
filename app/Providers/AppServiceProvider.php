<?php

namespace App\Providers;

use Validator;
use Auth;
use Hash;
use Illuminate\Support\ServiceProvider;
use DB;
use App\TipoPago;
use App\Pago;

class AppServiceProvider extends ServiceProvider
{
 
    public function boot(){


/**$this->validateCedula();
      $this->validateCurrent_Password();

      $this->validateCedulaRuc();
      $this->validateCurrent_Password();*/


      $this->validateCedulaRuc();
      $this->validateCurrent_Password();

      $this->validateCedulaRuc();
      $this->validateCurrent_Password();
      TipoPago::creating(function ($tipoPago) {
            $nextId=DB::select('select last_value from tipopagos_idtipopago_seq');
            $codigo="TP-".(str_pad($nextId."", 5, "0",STR_PAD_LEFT));
            $tipoPago->codigo=$codigo;
        });

    }

 
    public function register()
    {
        //
    }

    private function validateCurrent_Password(){
        Validator::extend('current_password',function($attribute,$value,$parametes){
          return Hash::check($value, Auth::user()->password);
        });
    }



 //private function validateCedula(){
   //   Validator::extend('cedula',function($attribute,$value,$parametes){


    private function validateCedulaRuc(){
      Validator::extend('cedula_ruc',function($attribute,$value,$parametes){
          if(preg_match('/[0-2][0-9]{9}(001)?/',$value)){
            $c1=0;
            $c2=0;
            $f=0;
            $cedula=$value;
            for($i=0;$i<9;$i++){
                $a=$cedula[$i];
                  if($i%2==0){
                      $d=$a*2;
                      if($d<9){
                          $c1+=$d;
                      }else{
                          $c1+=$d-9;
                      }
                  }else{
                      $c2+=$a;
                  }
              }
              $e=$c1+$c2;
              for($j=10;$j<=60;$j=$j+10){
                  if($e<=$j){
                      $f=$j-$e;
                      break;
                  }
              }
              return $cedula[9]==$f;
          }else{
            return false;
          }
      });
    }
}
