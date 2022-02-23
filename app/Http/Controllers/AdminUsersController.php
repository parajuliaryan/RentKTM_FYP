<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_type' => 'required',
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        if ($request->user_type == "student") {
            if ($request->roommate_image) {
                $imageName = time() . '.' . $request->roommate_image->extension();
                $request->roommate_image->move(public_path('images'), $imageName);
                User::create([
                    'user_type' => $request->user_type,
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'student_check' => "on",
                    'identification' => $imageName,
                ]);
            } else {
                User::create([
                    'user_type' => $request->user_type,
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'student_check' => "on",
                ]);
            }
        } else {
            if ($request->roommate_image) {
                $imageName = time() . '.' . $request->roommate_image->extension();
                $request->roommate_image->move(public_path('images'), $imageName);
                User::create([
                    'user_type' => $request->user_type,
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'identification' => $imageName,
                ]);
            } else {
                User::create([
                    'user_type' => $request->user_type,
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                ]);
            }
        }

        return redirect()->route('admin.users.index')->with('Success', 'User Added Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.users.show', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'user_type' => 'required',
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if ($request->user_type == "student") {
            if ($request->roommate_image) {
                $imageName = time() . '.' . $request->roommate_image->extension();
                $request->roommate_image->move(public_path('images'), $imageName);
                $user->update([
                    'user_type' => $request->user_type,
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'identification' => $imageName,
                    'student_check' => "on",
                ]);
            } else {
                $user->update([
                    'user_type' => $request->user_type,
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'student_check' => "on",
                ]);
            }
        }else{
            if ($request->roommate_image) {
                $imageName = time() . '.' . $request->roommate_image->extension();
                $request->roommate_image->move(public_path('images'), $imageName);
                $user->update([
                    'user_type' => $request->user_type,
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'identification' => $imageName,
                ]);
            } else {
                $user->update([
                    'user_type' => $request->user_type,
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                ]);
            }
        }


        return redirect()->route('admin.users.index')->with('Success', 'User Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('Success', 'User Deleted Successfully.');
    }
}
