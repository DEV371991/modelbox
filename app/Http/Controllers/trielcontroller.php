<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\trielmodel;

class trielcontroller extends Controller
{
    // /**
    //  * Display a listing of the resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    public function index()
    {
        //
        //dd($post);
        return view('loginpage');
    }

       public function loginpage(Request $post)
    {
        //
        //dd($post);
        //return view('loginpage');
        return redirect()->route('list')->with('success','User created successfully.');
    }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    public function create(Request $request)
    {
        //
        
        return view('create');
    }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request;
    //  * @return \Illuminate\Http\Response
    //  */
    public function store(Request $req)
    {
        //
        $insert=[
            "name" => $req->username,
            "password"=>$req->password
        ];

        trielmodel::create($insert);
        return redirect()->route('index')->with('success','User created successfully.');
       // print_r("hello");
        //return view('create');
    }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    public function show()
    {
        //
       $data = trielmodel::get();
        //dd($data);
        return view('list',['data'=>$data]);
    }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    public function edit($id)
    {
        //

         $post = trielmodel::find($id);
        //dd($findid);
    
        return view('edit',['findid'=>$post]);
    }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    public function update($id, Request $post)
    {
        //
       $postData = $post->all();return;
        
        if(!empty($postData)){
            $data=[
                "username"=>$postData['username'],
                "password"=> md5($postData['password'])
            ];
            trielmodel::find($id)->update($data);
        }
        $post=trielmodel::find($id);
        if(empty($post)){
             //Session::flash('message', 'Record not found'); 
            return redirect()->route('list');
        }
        //dd($post);
        return view('edit',['post'=>$post]);
        //return view('edit');
         //return redirect()->route('edit')->with('success','User created successfully.');
    }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    public function destroy($id)
    {
        //
    }


    public function searchdata(Request $req)
    {
      //  print_r($req);die;
        $data =[];
        if($req->query('search')){
          $data=trielmodel::where('name','Like','%'.$req->query('search').'%')->get();  
        }
       // 
            
        //return view('list',['data'=>$data]);
        return response()->json(['data'=> $data]);
    }
}
