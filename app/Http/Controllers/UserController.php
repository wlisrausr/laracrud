<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;

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
                      'model'           => $user,
                      'form_url'        => route('users.destroy', $user->id),
                      'edit_url'        => route('users.edit', $user->id)
                  ]);
              })->make(true);
        }

        $html = $htmlBuilder
            ->addColumn(['data'=>'name', 'name'=>'name', 'title'=>'Name'])
            ->addColumn(['data'=>'phone', 'name'=>'phone', 'title'=>'Phone'])
            ->addColumn(['data'=>'address', 'name'=>'address', 'title'=>'Address'])
            ->addColumn(['data'=>'action', 'name'=>'action', 'title'=>'', 'orderable'=>false, 'searchable'=>false]);

        return view('users.index')->with(compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
