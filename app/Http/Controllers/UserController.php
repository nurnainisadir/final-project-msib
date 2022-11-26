<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // if (! auth()->user()->can('list users')) {
        //     abort(403);
        // }

        $user = User::orderBy('created_at', 'desc')->get();

        return view('users.index', compact('user'));
    }

    /**
     * Prepare Data
     *
     * @param Request $request
     *
     * @return array
     */
    public function prepareData($request)
    {
        $data = $request->only([
            'name',
            'email',
        ]);

        if (! is_null($request->password)) {
            $data['password'] = bcrypt($request->password);
        }

        return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // if (! auth()->user()->can('create user')) {
        //     abort(403);
        // }

        $data['roles'] = \Spatie\Permission\Models\Role::get(['id', 'name']);
        $data['permissions'] = \Spatie\Permission\Models\Permission::get(['id', 'name']);

        return view('users.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        $payload = request()->except(['_method', '_token']);
        $payload = $this->prepareData($request);

        \DB::transaction(function () use ($payload, $request) {
            $user = User::create($payload);

            if (isset($request['role_id'])) {
                $user->roles()->attach($request['role_id']);
            }

        });

        return redirect()->route('users.index')->with('status', 'Data User berhasil disimpan');
    }

    /**
     * Show the form for editing the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // if (! auth()->user()->can('edit user')) {
        //     abort(403);
        // }

        $data['user'] = User::findOrFail($id);
        $data['roles'] = \Spatie\Permission\Models\Role::get(['id', 'name']);
        $data['permissions'] = \Spatie\Permission\Models\Permission::get(['id', 'name']);

        return view('users.form', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $payload = request()->except(['_method', '_token']);
        $payload = $this->prepareData($request);

        \DB::transaction(function () use ($user, $payload, $request) {
            $user->update($payload);

            // Detach old roles
            $user->roles()->detach();
            if (isset($request['role_id'])) {
                $user->roles()->attach($request['role_id']);
            }
        });

        return redirect()->route('users.index')->with('status', 'Data User berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // if (! auth()->user()->can('delete user')) {
        //     abort(403);
        // }

        $user = User::findOrFail($id);
        if ($user->id == request()->user()->id) {
            return redirect()->back()->withErrors([
                'User yang Akan dihapus sedang Login',
            ]);
        }

        $user->delete();

        return redirect()->back()->with('status', 'Data User berhasil dihapus!');
    }
}
