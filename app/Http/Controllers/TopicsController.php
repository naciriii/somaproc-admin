<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Topic;
use File;

class TopicsController extends Controller
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
        $topics=Topic::all();
            $params=[
        'title'=>'Liste actualités',
        "topics"=>$topics];

        return view('admin.topics.topics_list')->with($params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         $params=['title'=>'Creation actualité',

        ];

        return view('admin.topics.topics_create')->with($params);
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
            'title'=>'required',
            'photo1'  => 'required|image|max:3000',
            'photo2'  => 'required|image|max:3000',
            'photo3'  => 'required|image|max:3000',

            'description'=>'required',
           
            'language_id'=>'required'
        ]);
        $topic=new Topic;
        $topic->title=$request->title;
        $topic->photo1=asset('/').$this->upload($request,'photo1');
        $topic->photo2=asset('/').$this->upload($request,'photo2');
        $topic->photo3=asset('/').$this->upload($request,'photo3');

        $topic->description=$request->description;
  
        $topic->language_id=$request->language_id;

        $topic->save();
          return redirect()->route('topics.index')->with('success', "Actualité  '<strong>$topic->title</strong>' a été crée.");
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
            $topic = Topic::findOrFail($id);

            $params = [
                'title' => 'Supprimer Actualité',
                'topic' => $topic,
            ];

            return view('admin.topics.topics_delete')->with($params);
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
         
            $topic = Topic::findOrFail($id);

            $params = [
                'title' => 'Modifier Actualité',
             
                'topic' => $topic
                
            ];

            return view('admin.topics.topics_edit')->with($params);
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
            'title'=>'required',
            'photo1'  => 'image|max:3000',
            'photo2'  => 'image|max:3000',
            'photo3'  => 'image|max:3000',

            'description'=>'required',
           
            'language_id'=>'required'

          
          
           
          
        ]);

            $topic = Topic::findOrFail($id);

            $topic->title = $request->input('title');
            $topic->description = $request->input('description');
            $topic->language_id = $request->input('language_id');
            if($request->hasFile('photo')){
                $request->photo1=asset('/').$this->upload($request,'photo1');
            }
            if($request->hasFile('photo2')){
                $request->photo2=asset('/').$this->upload($request,'photo2');
            }
            if($request->hasFile('photo3')){
                $request->photo3=asset('/').$this->upload($request,'photo3');
            }
        
               
            
            
        
            
            
        
            

            $topic->save();

            return redirect()->route('topics.index')->with('success', " Actualité <strong>$topic->title</strong> a été mis à jour.");
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
            $topic = Topic::find($id);
            File::delete($topic->photo1);
            File::delete($topic->photo2);
            File::delete($topic->photo3);


            $topic->delete();

            return redirect()->route('topics.index')->with('success', "Actualité <strong>$topic->title</strong> a été supprimé.");
        }
        catch (ModelNotFoundException $ex) 
        {
            if ($ex instanceof ModelNotFoundException)
            {
                return response()->view('errors.'.'404');
            }
        }
    }
     public function upload(Request $request,$name) {
            if($request->hasFile($name)) {

              

                $file = $request->file($name);

                $filename = time() . '-' . $file->getClientOriginalName();
                $despath=base_path().'/public/actualites/';
                $file->move($despath,$filename);

           
             
                $filePath = 'actualites/'.$filename;
               


            

                $path= $filePath;

              return $path;
            }
            else
            {
                return '';
            }

    }
}
