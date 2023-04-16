<?php

namespace App\Http\Controllers;

use App\Http\Requests\MentorPostRequest;
use App\Models\mentor;
use App\Models\User;
use App\Services\ImageService;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class MentorCantroller extends Controller
{

    public function index()
    {
        $mentors = mentor::all();
        return view('mentor.index', compact('mentors'));
    }

    public function create()
    {
        return view('mentor.create');
    }

    public function store(MentorPostRequest $request)
    {
        $uploaded = $request->file('image');
        $tmp_name = $request->file('image')->getClientOriginalExtension();
        $new_name = rand(100, 999) . time() . 'image.' . $tmp_name;
        $move_path = $uploaded->move(public_path('images/'), $new_name);
        $database_save_name = "images/" . $new_name;
        if ($move_path) {
            $store = mentor::create(
                [
                    'full_name' => $request->full_name,
                    'phone' => $request->phone,
                    'salary' => $request->salary,
                    'image' => $database_save_name,
                    'email' => $request->email,
                    'password' => $request->password
                ]
            );
            if ($store) {
                $user_id = mentor::orderBy('id', 'desc')->first();
                $user_role = 'mentor';
                $store = User::create(
                    [
                        'name' => $request->full_name,
                        'email' => $request->email,
                        'password' => Hash::make($request->password),
                        'role' => $user_role,
                        'user_image' => $database_save_name,
                        'role_id' => $user_id->id
                    ]
                );
                return redirect()->route('mentor.index');
            } else {
                return redirect()->back();
            }
        }
    }

    public function edit($id)
    {
        $mentor = mentor::find($id);
        return view('mentor.edit', compact('mentor'));
    }

    public function update(Request $request, $id, ImageService $imageService)
    {
        $mentor_update_id = mentor::find($id);
        $uploaded = $request->file('image');
        if ($uploaded) {
            $tmp_name = $request->file('image')->getClientOriginalExtension();
            $new_name = rand(100, 999) . time() . '_image.' . $tmp_name;
            $move_path = $uploaded->move(public_path('images/'), $new_name);
            $database_save_name = "images/" . $new_name;
        }
        if ($uploaded) {
            $imageService->image_file_delete($mentor_update_id->image);
        }
        $update = $mentor_update_id->update([
            'full_name' => $request->full_name,
            'phone' => $request->phone,
            'salary' => $request->salary,
            'image' => $database_save_name ?? $mentor_update_id->image,
            'email' => $request->email,
        ]);

        //user table update
        $user_role = 'mentor';
        $user_update = User::where('role', $user_role)
            ->where('role_id', $mentor_update_id->id)
            ->first();
        $user_update->update([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'user_image' => $save_upload_name ?? $user_update->user_image
        ]);
        if ($user_update) {
            return redirect()->route('mentor.index');
        } else {
            return redirect()->back();
        }
    }

    public function destroy($id, ImageService $imageDelete)
    {
        $mentor_id = mentor::find($id);
        $mentor_image_path_name = $mentor_id->image;
        $mentor_id->delete();
        $user_delete = User::where('role_id',$id)->where('role','mentor')->first();
        $user_delete->delete();
        $imageDelete->image_file_delete(($mentor_image_path_name));
        return redirect()->route('mentor.index')->with('success_mentor_delete', 'Mnetor O\'chirildi');
    }
}
