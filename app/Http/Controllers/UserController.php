<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Group;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->authorizeResource(User::class, null, ['except' => ['index']]);
    }
    public function index()
    {
        $users = User::latest()->paginate(10);
        return view('user.list', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $groups = Group::all();
        return view('user.add', compact('groups'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        try {
            $userId = Auth::user()->id;
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->group_id = $request->group_id;
            $user->user_id = $userId;
            $user->save();
            return redirect()->route('user.index')->with('message', 'Add user successfully');
        } catch (Exception $e) {
            return back()->with('message', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $groups = Group::all();
        return view('user.edit', compact('user', 'groups'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {
        try {
            $user->fill([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'user_id' => Auth::user()->id,
                'group_id' => $request->group_id
            ])->save();
            return redirect()->route('user.index')->with('message', 'Update user successfully');
        } catch (Exception $e) {
            return back()->with('message', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        try {
            if (Auth::user()->id != $user->id) {
                $user->delete();
                return back()->with('message', 'Deleted successfully');
            }
            return redirect()->route('user.index')->with('message', "Don't delete this user");
        } catch (Exception $e) {
            return back()->with('message', $e->getMessage());
        }
    }
}