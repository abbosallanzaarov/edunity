<?php

namespace App\Http\Controllers;

use App\Models\Prises;
use Illuminate\Http\Request;

class PrisesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prises = Prises::paginate();
        return view('prise.index',compact('prises'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('prise.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $uploaded = $request->file('image');
        if($uploaded){
            $uploaded = $request->file('image');
            if($uploaded){
            $tmp_name = $request->file('image')->getClientOriginalExtension();
            
            $new_name = rand(100,999).time().'image.'.$tmp_name;
            //dd($new_name);
    
                
            $move = $uploaded->move(public_path('images/uploaded-image/'),$new_name);
            //dd($move);
    
            $baza_name = "images/uploaded-image/".$new_name;
            //dd($baza_name);   
            }
            $store = Prises::create([
                    'name'=>$request->name,
                    'image'=>$baza_name,
                    'price'=>$request->price,
                    'description'=>$request->description,
                ]);
            if($store)
            {
                return response()->json(['success' => true,'message' => 'Prise added successfully']);
            }
            else
            {
                return response()->json(['success' => false,'message' => 'Prise not added']);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Prises $prise)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Prises $prise)
    {
        $priseEdit = Prises::find($prise)->first();
        $prises = Prises::paginate();

        return view('prise.index',compact('priseEdit','prises'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prises $prise)
    {
        $prise = Prises::find($prise)->first();
        $oldimage = $prise->image;
        if($prise){
            $uploaded = $request->file('image');
            if($uploaded){
                $uploaded = $request->file('image');
                if($uploaded){
                $tmp_name = $request->file('image')->getClientOriginalExtension();
                
                $new_name = rand(100,999).time().'image.'.$tmp_name;
                //dd($new_name);
        
                    
                $move = $uploaded->move(public_path('images/uploaded-image/'),$new_name);
                //dd($move);
        
                $baza_name = "images/uploaded-image/".$new_name;
                // dd($baza_name);   
                }
                $update = $prise->update([
                    'name'=>$request->name,
                    'image'=>$baza_name,
                    'price'=>$request->price,
                    'description'=>$request->description,
                    ]);
                if($update){
                    return response()->json(['success' => true,'message' => 'Prise updated successfully']);
                }
                else{
                    return response()->json(['success' => false,'message' => 'Prise not updated']);
                }
            }
        }
        else{
            return response()->json(['success' => false,'message' => 'Prise not found']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(student $prise)
    {
        $prise = student::find($prise);
        if($prise){
            $delete = $prise->delete();
            if($delete){
                return response()->json(['success' => true,'message' => 'Prise delete successfully']);
            }
            else{
                return response()->json(['success' => false,'message' => 'Prise not delete']);
            }
        }
        else{
            return response()->json(['success' => false,'message' => 'Prise not found']);
        }
    }
}
