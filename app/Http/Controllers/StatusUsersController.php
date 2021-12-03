<?php

namespace App\Http\Controllers;

use App\Models\StatusUsers;
use Illuminate\Http\Request;

class StatusUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'msg'  => 'OK'
        ]);
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
     * @param  \App\Models\StatusUsers  $statusUsers
     * @return \Illuminate\Http\Response
     */
    public function show(StatusUsers $statusUsers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StatusUsers  $statusUsers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StatusUsers $statusUsers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StatusUsers  $statusUsers
     * @return \Illuminate\Http\Response
     */
    public function destroy(StatusUsers $statusUsers)
    {
        //
    }
}
