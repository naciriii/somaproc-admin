<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Client;
use Hash;

class ClientsController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
       
      
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $clients=Client::all();
            $params=[
        'title'=>'Liste clients',
        "clients"=>$clients];

        return view('admin.clients.clients_list')->with($params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         $params=['title'=>'Creation Client',

        ];

        return view('admin.clients.clients_create')->with($params);
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
            'email' => 'required|email|max:255|unique:clients',
            'password' => 'required|min:6|confirmed',
        ]);
        $client=new Client;
        $client->name=$request->name;
        $client->email=$request->email;
        $client->password=bcrypt($request->password);
       

        $client->save();
          return redirect()->route('clients.index')->with('success', "Client  '<strong>$client->name</strong>' a été crée.");
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
            $client = Client::findOrFail($id);

            $params = [
                'title' => 'Supprimer Client',
                'client' => $client,
            ];

            return view('admin.clients.clients_delete')->with($params);
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
         
            $client = Client::findOrFail($id);

            $params = [
                'title' => 'Modifier admin',
             
                'client' => $client
                
            ];

            return view('admin.clients.clients_edit')->with($params);
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
            'email' => 'required|email|max:255|unique:clients,email,'.$id,
            'password' => 'required|min:6',

          
          
           
          
        ]);

            $client = Client::findOrFail($id);

            $client->name = $request->input('name');
            $client->email = $request->input('email');
              if (Hash::needsRehash($request->password)){
                $client->password = bcrypt($request->input('password'));

            }
        
               
            
            
        
            
            
        
            

            $client->save();

            return redirect()->route('clients.index')->with('success', " Client <strong>$client->name</strong> a été mis à jour.");
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
            $client = Client::find($id);
           

            $client->delete();

            return redirect()->route('clients.index')->with('success', "Client <strong>$client->name</strong> a été supprimé.");
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
