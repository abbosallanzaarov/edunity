<?php

namespace App\Http\Controllers;

use App\Http\Requests\GiftCreateRequest;
use App\Models\Gift;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class GiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gifts = Gift::paginate(3);
        $gift_count = count($gifts);
        return view('gifts.index' , compact('gifts' ,'gift_count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gifts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GiftCreateRequest $request)
    {
        $uploaded = $request->file('image');
        if ($uploaded) {
            $tmp_name = $request->file('image')->getClientOriginalExtension();
            $new_name = rand(100, 999) . time() . 'image.' . $tmp_name;
            $move_path = $uploaded->move(public_path('images/uploaded-image/gift/'), $new_name);
            $database_save_name = "images/uploaded-image/gift/" . $new_name;
            if($move_path){
                $createGift = Gift::create([
                    'name'    =>$request->name,
                    'title'   =>$request->title,
                    'desc'    =>$request->desc,
                    'image'   =>$database_save_name,
                    'coin'    =>$request->coin
                ]);
                return redirect()->back();
            }
        }else{
            return redirect()->route('gift.index')->with('success_gift' , 'Sovg\'a yaratildi');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gift  $gift
     * @return \Illuminate\Http\Response
     */
    public function show(Gift $gift)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gift  $gift
     * @return \Illuminate\Http\Response
     */
    public function edit(Gift $gift)
    {

        return view('gifts.edit' , compact('gift'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gift  $gift
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gift $gift)
    {
        $upload_image = $request->file('image');
        if($upload_image){
            $tmp_name = $request->file('image')->getClientOriginalExtension();
            //image file name create
            $new_name = rand(100, 999) . time() . 'image.' . $tmp_name;
            //move save public images file
            $move = $upload_image->move(public_path('images/uploaded-image/'), $new_name);
            // baza save name
            $save_upload_name = "images/uploaded-image/" . $new_name;

        }
        $gift->update([
            'name'=>$request->name,
            'title' => $request->title,
            'image' => $save_upload_name ?? $gift->image,
            'desc' => $request->desc,
            'coin' =>$request->coin
        ]);
        return redirect()->route('gift.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gift  $gift
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gift $gift)
    {
       $gift_delete = $gift->delete();
       if( File::exists($gift->image)){
        File::delete($gift->image);
        return redirect()->back();
      }
    }
}
