<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
class RolController extends Controller
{
    public function datos($sw)
    {  
        if($sw=3){
            $rol=Role::all();
            return json_encode($rol);
        }else{
            $roles=Role::select(
                'roles.*'
            );
            //->get();
            return DataTables::of($roles)
                // anadir nueva columna botones
               ->addColumn('actions', function($roles){
                $css_btn_edit= config('adminlte.classes_btn_editar') ;
                $css_btn_delete= config('adminlte.classes_btn_eliminar') ;
                // $url_propio=route('usuario.edit',[$caja->id,'1']);
                 $btn_editar='<a class="btn '.$css_btn_edit.'  " rel="tooltip" data-placement="top" title="Editar" onclick="Modificar('.$roles->id.')" ><i class="far fa-edit"></i></a>';
                 $btn_eliminar='<a class="btn '.$css_btn_delete.'" rel="tooltip" data-placement="top" title="Eliminar" onclick="Eliminar('.$roles->id.')"><i class="far fa-trash-alt"></i></a>';
                 //$button_grupo4='<a class="btn btn-success" rel="tooltip" data-placement="top" title="Ingresos y egresos" href="'.$url_propio.'" ><i class="fas fa-balance-scale-right"></i></a>';                   $btn= '<div class="text-right">  <div class="btn-group btn-group-sm">'
                    $btn= '<div class="text-right">  <div class="btn-group btn-group-sm ">'
                   .$btn_editar
                   .$btn_eliminar
                   .'</div> </div> ';
                 return  $btn;
               })
               
               ->rawColumns(['actions']) // incorporar columnas
               ->make(true); // convertir a codigo
            }
    }
}
