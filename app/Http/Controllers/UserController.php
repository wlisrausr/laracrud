<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $htmlBuilder)
    {
        if ($request->ajax()) {
            $users = User::select(['id', 'name', 'address', 'phone']);

            return Datatables::of($users)
              ->addColumn('action', function($user){
                  return view('datatable._action', [
                      'model'    => $user,
                      'form_url' => route('users.destroy', $user->id),
                      'show_url' => route('users.show', $user->id),
                      'edit_url' => route('users.edit', $user->id)
                  ]);
              })->make(true);
        }

        $html = $htmlBuilder
            ->addColumn(['data'=>'name', 'name'=>'name', 'title'=>'Name'])
            ->addColumn(['data'=>'phone', 'name'=>'phone', 'title'=>'Phone'])
            ->addColumn(['data'=>'address', 'name'=>'address', 'title'=>'Address'])
            ->addColumn(['data'=>'action', 'name'=>'action', 'title'=>'', 'orderable'=>false, 'searchable'=>false]);

        $pageTitle = 'User List';

        return view('users.index')->with(compact('html', 'pageTitle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = 'Add User';

        return view('users.create')->with(compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
          'name' => 'required',
          'address' => 'required',
          'phone' => 'required|unique:users'
        ]);

        $user = new User;

        $user->name = $request->name;
        $user->address = $request->address;
        $user->phone = $request->phone;

        $user->save();

        Session::flash("flash_notification", [
            "level"   => "success",
            "message" => "Successfully added user"
        ]);

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $pageTitle = 'User Detail';

        return view('users.show')->with(compact('user', 'pageTitle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $pageTitle = 'Edit User';

        return view('users.edit')->with(compact('user', 'pageTitle'));
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
        $this->validate($request, [
          'name' => 'required',
          'address' => 'required',
          'phone' => 'required|unique:users,phone,' . $id
        ]);

        $user = User::find($id);

        $user->name = $request->name;
        $user->address = $request->address;
        $user->phone = $request->phone;

        $user->save();

        Session::flash("flash_notification", [
            "level"   => "success",
            "message" => "Successfully updated user"
        ]);

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        Session::flash("flash_notification", [
            "level"   => "success",
            "message" => "Successfully deleted user"
        ]);

        return redirect()->route('users.index');
    }
}
