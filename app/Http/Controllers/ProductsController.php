<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Product;
use File;

class ProductsController extends Controller
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
        $products=Product::all();
            $params=[
        'title'=>'Liste produits',
        "products"=>$products];

        return view('admin.products.products_list')->with($params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         $params=['title'=>'Creation produit',

        ];

        return view('admin.products.products_create')->with($params);
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
            'name'=>'required',
            'photo'  => 'required|image|max:3000',
            'min_price'=>'required|numeric',
            'max_price'=>'required|numeric',
            'category_id'=>'required',
            'language_id'=>'required'
        ]);
        $product=new Product;
        $product->name=$request->name;
        $product->photo=$this->upload($request);
        $product->min_price=$request->min_price;
        $product->max_price=$request->max_price;

        $product->category_id=$request->category_id;
        $product->language_id=$request->language_id;

        $product->save();
          return redirect()->route('products.index')->with('success', "Produit  '<strong>$product->name</strong>' a été crée.");
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
            $product = Product::findOrFail($id);

            $params = [
                'title' => 'Supprimer Produit',
                'product' => $product,
            ];

            return view('admin.products.products_delete')->with($params);
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
         
            $product = Product::findOrFail($id);

            $params = [
                'title' => 'Modifier produit',
             
                'product' => $product
                
            ];

            return view('admin.products.products_edit')->with($params);
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
            'name'=>'required',
            'photo'  => 'image|max:3000',
            'min_price'=>'required|numeric',
            'max_price'=>'required|numeric',
            'category_id'=>'required',
            'language_id'=>'required'

          
          
           
          
        ]);

            $product = Product::findOrFail($id);

            $product->name = $request->input('name');
            $product->min_price = $request->input('min_price');
            $product->max_price = $request->input('max_price');
            $product->category_id = $request->input('category_id');
            $product->language_id = $request->input('language_id');
            if($request->hasFile('photo')){
                $request->photo=$this->upload($request);
            }
        
               
            
            
        
            
            
        
            

            $product->save();

            return redirect()->route('products.index')->with('success', " Produit <strong>$product->name</strong> a été mis à jour.");
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
            $product = Product::find($id);
            File::delete($product->photo);

            $product->delete();

            return redirect()->route('products.index')->with('success', "Produit <strong>$product->name</strong> a été supprimé.");
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
                $despath=base_path().'/public/produits/';
                $file->move($despath,$filename);

           
             
                $filePath = 'produits/'.$filename;
               


            

                $path= $filePath;

              return $path;
            }
            else
            {
                return '';
            }

    }
}
