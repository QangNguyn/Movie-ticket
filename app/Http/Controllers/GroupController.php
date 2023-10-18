<?php

namespace App\Http\Controllers;

use App\Http\Requests\GroupRequest;
use App\Models\Group;
use App\Models\Module;
use Exception;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->authorizeResource(Group::class, null, ['except' => ['index']]);
    }

    public function index()
    {
        $groups = Group::latest()->paginate(10);
        return view('group.list', compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('group.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GroupRequest $request)
    {
        try {
            $group = new Group();
            $group->name = $request->name;
            $group->user_id = Auth::user()->id;
            $group->save();
            return redirect()->route('group.index')->with('message', 'Add group successfully');
        } catch (Exception $e) {
            return back()->with('message', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Group $group)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Group $group)
    {
        return view('group.edit', compact('group'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GroupRequest $request, Group $group)
    {
        try {
            $group->name = $request->name;
            $group->save();
            return redirect()->route('group.index')->with('message', 'Update group successfully');
        } catch (Exception $e) {
            return back()->with('message', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Group $group)
    {
        try {
            if ($group->users->count() === 0) {
                $group->delete();
                return back()->with('message', 'Deleted successfully');
            }
            return back()->with('message', "Don't delete this group");
        } catch (Exception $e) {
            return back()->with('message', $e->getMessage());
        }
    }
    public function permission(Group $group)
    {
        $this->authorize('permissions', Group::class);
        $modules = Module::all();
        $roleJson = $group->permissions;
        if (!empty($roleJson)) {
            $roleArr = json_decode($roleJson, true);
        } else {
            $roleArr = [];
        }
        return view('group.permission', compact('group', 'modules', 'roleArr'));
    }
    public function postPermission(Group $group, Request $request)
    {
        $this->authorize('permissions', Group::class);
        if (!empty($request->role)) {
            $roleArr = $request->role;
        } else {
            $roleArr = [];
        }
        try {
            $roleJson = json_encode($roleArr);
            $group->permissions = $roleJson;
            $group->save();
            return back()->with('message', 'Permission successfully');
        } catch (Exception $e) {
            return back()->with('message', $e->getMessage());
        }
    }
}
