<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

class usersController extends Controller
{
    //

    public function admins(){
        $succses= false;
        $fail = 'No Error';
        $delete = false;

        $users = \DB::connection('mysql')
        ->table('users')
        ->get();

        return view('administrar_roles.adminrol',['users'=>$users,'succses'=>$succses,'fail'=>$fail,'delete' =>$delete]);
    }


    public function userEdited(Request $request){
        $succses= true;
        $fail = 'No Error';
        $idUser = $request->get('idUser');
        $userName = $request->get('nameUser');
        $userEmail = $request->get('emailUser');
        $rolUser = $request->get('rolUser');
        $delete = false;

        $users = \DB::connection('mysql')
        ->table('users')
        ->get();

        $validateEmail = \DB::connection('mysql')
        ->table('users')
        ->where('email',$userEmail)
        ->get();

        $validateUEmail = \DB::connection('mysql')
        ->table('users')
        ->where('id',$idUser)
        ->where('email',$userEmail)
        ->get();

        //dd($validateUEmail);


        if (sizeof($validateEmail) > 0) {
            if (sizeof($validateUEmail) > 0) {
                //dd('Falla de mala manera x2',$validateUEmail);

                $updateUser = \DB::connection('mysql')
                ->table('users')
                ->where('id',$idUser)
                ->update([
                    'name' => $userName,
                    'email' => $userEmail,
                    'rol' => $rolUser,
                    'updated_at' => Carbon::now()
    
                ]); 
    
                return view('administrar_roles.adminrol',['users'=>$users,'succses'=>$succses,'fail'=>$fail,'delete' =>$delete]);
            }else{
                //dd('Falla de buena manera');

                $fail = 'Error';
                return view('administrar_roles.adminrol',['users'=>$users,'succses'=>$succses,'fail'=>$fail,'delete' =>$delete]);
            }
           
        }else{
             //Actualiazar usuario
             $updateUser = \DB::connection('mysql')
             ->table('users')
             ->where('id',$idUser)
             ->update([
                 'name' => $userName,
                 'email' => $userEmail,
                 'rol' => $rolUser,
                 'updated_at' => Carbon::now()
 
             ]); 
 
             return view('administrar_roles.adminrol',['users'=>$users,'succses'=>$succses,'fail'=>$fail,'delete' =>$delete]);
            
        }

    }

    public function userDelete(Request $request){
        $succses= false;
        $fail = 'No Error';
        $delete = true;
        $idUser = $request->get('idUserDelete');

        $users = \DB::connection('mysql')
        ->table('users')
        ->get();

        \DB::connection('mysql')
             ->table('users')
             ->where('id',$idUser)
             ->delete();

        return view('administrar_roles.adminrol',['users'=>$users,'succses'=>$succses,'fail'=>$fail,'delete' =>$delete]);

    }
}
