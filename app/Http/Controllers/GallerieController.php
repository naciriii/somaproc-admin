<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Gallerie;
use File;

class GallerieController extends Controller
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
         $galleries= Gallerie::get();

        $params=[
            'title'=>'Galleries list',
            'galleries'=>$galleries
        ];
        return view('admin.galleries.galleries_list')->with($params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $params=['title'=>'Creation gallerie',

        ];

        return view('admin.galleries.galleries_create')->with($params);
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
            'description'=>'required',
            'photo'  => 'required|image|max:3000',
        ]);
        $gallerie=new Gallerie;
        $gallerie->description=$request->description;
        $gallerie->photo=asset('/').$this->upload($request);
        
        $gallerie->save();
        return redirect()->route('galleries.index')->with('success', "gallerie a été crée.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        try
        {
            $gallerie = Gallerie::findOrFail($id);

            $params = [
                'title' => 'Supprimer Gallerie',
                'gallerie' => $gallerie,
            ];

            return view('admin.galleries.galleries_delete')->with($params);
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
        //
         try
        {
         
            $gallerie = Gallerie::findOrFail($id);

            $params = [
                'title' => 'Modifier Gallerie',
             
                'gallerie' => $gallerie
                
            ];

            return view('admin.galleries.galleries_edit')->with($params);
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
            'description'=>'required',
            'photo'  => 'image|max:3000',
        ]);

            $gallerie = Gallerie::findOrFail($id);

            $gallerie->description = $request->input('description');

            if($request->hasFile('photo')){
                $gallerie->photo=asset('/').$this->upload($request);
            }
        
            $gallerie->save();

            return redirect()->route('galleries.index')->with('success', " Galleries a été mis à jour.");
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
            $gallerie = Gallerie::find($id);
            File::delete($gallerie->photo);

            $gallerie->delete();

            return redirect()->route('galleries.index')->with('success', "gallerie a été supprimé.");
        }
        catch (ModelNotFoundException $ex) 
        {
            if ($ex instanceof ModelNotFoundException)
            {
                return response()->view('errors.'.'404');
            }
        }
    }
    public function upload(Request $request) {
            if($request->hasFile('photo')) {

                $file = $request->file('photo');

                $filename = time() . '-' . $file->getClientOriginalName();
                $despath=base_path().'/public/gallerie/';
                $file->move($despath,$filename);
                $filePath = 'gallerie/'.$filename;
                $path= $filePath;
              return $path;
            }
            else
            {
                return '';
            }

    }
}
