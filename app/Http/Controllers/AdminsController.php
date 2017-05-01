<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Auth;
use Illuminate\Support\Facades\Hash;

class AdminsController extends Controller
{
   public function __construct() {
        $this->middleware('auth');
        $this->middleware('super_user');
      
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $admins=User::where('email','<>',Auth::user()->email)->get();
            $params=[
        'title'=>'Liste admins',
        "admins"=>$admins];

        return view('admin.admins.admins_list')->with($params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         $params=['title'=>'Creation Admin',

        ];

        return view('admin.admins.admins_create')->with($params);
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
               'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
        $user=new User;
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=bcrypt($request->password);
        $user->super=$request->super;

        $user->save();
          return redirect()->route('admins.index')->with('success', "Admin  '<strong>$user->name</strong>' a été crée.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
 public function show($id)
    {
         try
        {
            $user = User::findOrFail($id);

            $params = [
                'title' => 'Supprimer Admin',
                'admin' => $user,
            ];

            return view('admin.admins.admins_delete')->with($params);
        }
        catch (ModelNotFoundException $ex) 
        {
            if ($ex instanceof ModelNotFoundException)
            {
                return response()->view('errors.'.'404');
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try
        {
         
            $user = User::findOrFail($id);

            $params = [
                'title' => 'Modifier admin',
             
                'admin' => $user
                
            ];

            return view('admin.admins.admins_edit')->with($params);
        }
        catch (ModelNotFoundException $ex) 
        {
            if ($ex instanceof ModelNotFoundException)
            {
                return response()->view('errors.'.'404');
            }
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
         try
        {
               $this->validate($request, [
         'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email,'.$id,
            'password' => 'required|min:6',

          
          
           
          
        ]);

            $user = User::findOrFail($id);

            $user->name = $request->input('name');
            $user->email = $request->input('email');
              if (Hash::needsRehash($request->password)){
                $user->password = bcrypt($request->input('password'));

            }
            $user->super=$request->super;
        
               
            
            
        
            
            
        
            

            $user->save();

            return redirect()->route('admins.index')->with('success', " Admin <strong>$user->name</strong> a été mis à jour.");
        }
        catch (ModelNotFoundException $ex) 
        {
            if ($ex instanceof ModelNotFoundException)
            {
                return response()->view('errors.'.'404');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try
        {
            $user = User::find($id);
           

            $user->delete();

            return redirect()->route('admins.index')->with('success', "Admin <strong>$user->name</strong> a été supprimé.");
        }
        catch (ModelNotFoundException $ex) 
        {
            if ($ex instanceof ModelNotFoundException)
            {
                return response()->view('errors.'.'404');
            }
        }
    }
     }
