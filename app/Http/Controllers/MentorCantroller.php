<?php

namespace App\Http\Controllers;

use App\Http\Requests\MentorPostRequest;
use App\Models\mentor;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MentorCantroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mentors = mentor::all();
        return view('mentor.index', compact('mentors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mentor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MentorPostRequest $request)
    {
        $uploaded = $request->file('image');
        if ($uploaded) {
            $tmp_name = $request->file('image')->getClientOriginalExtension();
            $new_name = rand(100, 999) . time() . 'image.' . $tmp_name;
            $move_path = $uploaded->move(public_path('images/uploaded-image/'), $new_name);
            $database_save_name = "images/uploaded-image/" . $new_name;
            $mentor_email = $request->email;
            $users = User::all();
            foreach ($users as  $user) {
                # user email find
                if($user->email == $mentor_email){
                    return redirect('mentor')->with('message', 'bu email mavjud iltimos tekshiring');
                }
            }
            $mentor_default_image = 'fotomanuser.png';
            //mentor create
            if ($move_path) {
                $store = mentor::create(
                    [
                        'full_name' => $request->full_name,
                        'phone' =>$request->phone,
                        'salary' => $request->salary,
                        'image' => $database_save_name ?? $mentor_default_image ,
                        'email' => $request->email,
                        'password' => $request->password
                    ]
                );
                if ($store) {
                    //mentor id get All
                    $user_id = mentor::orderBy('id', 'desc')->first();
                    //user column create
                    $user_role = 'mentor';
                    $store = User::create(
                        [
                            'name' => $request->full_name,
                            'email' => $request->email,
                            'password' =>Hash::make($request->password),
                            'role' => $user_role,
                            'user_image'=>$database_save_name ?? $mentor_default_image,
                            'role_id' => $user_id['id']
                        ]
                    );
                    return redirect()->route('mentor.index');
                } else {
                    return redirect()->back();
                }
            }
        }
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mentor = mentor::find($id);
        return view('mentor.edit', compact('mentor'));
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
        $mentor_update_id = mentor::find($id);
        $uploaded = $request->file('image');
        if($uploaded){
            //tmp name
            $tmp_name = $request->file('image')->getClientOriginalExtension();
            //image file name create
            $new_name = rand(100, 999) . time() . 'image.' . $tmp_name;
            //move save public images file
            $move = $uploaded->move(public_path('images/uploaded-image/'), $new_name);
            // baza save name
            $save_upload_name = "images/uploaded-image/" . $new_name;
            $update = $mentor_update_id->update([
                'full_name' =>$request->full_name,
                'phone' =>$request->phone,
                'salary' =>$request->salary,
                'image' =>$save_upload_name ?? null,
                'email' =>$request->email,
            ]);
        }
        ///image delete
        if( File::exists($uploaded)){
            File::delete($uploaded);
        }
        //user table update
        $user_role = 'mentor';
        $user_update = User::where('role' , $user_role)
        ->where('role_id' , $mentor_update_id->id)
        ->first();
        $user_update->update([
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);
        if($user_update){
            return redirect()->route('mentor.index');
        }else{
            return redirect()->back();
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
        $mentor_id = mentor::find($id);
        // dd($mentor_id->image);
        $mentor_image_path_name = $mentor_id->image;
        $delete_mentor = $mentor_id->delete();
       if( File::exists($mentor_image_path_name)){
         File::delete($mentor_image_path_name);
         return redirect()->back();
       }

    }
}
