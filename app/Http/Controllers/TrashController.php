<?php

namespace App\Http\Controllers;

use App\Models\trash;
use App\Http\Requests\StoretrashRequest;
use App\Http\Requests\UpdatetrashRequest;

class TrashController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoretrashRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoretrashRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\trash  $trash
     * @return \Illuminate\Http\Response
     */
    public function show(trash $trash)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\trash  $trash
     * @return \Illuminate\Http\Response
     */
    public function edit(trash $trash)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatetrashRequest  $request
     * @param  \App\Models\trash  $trash
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatetrashRequest $request, trash $trash)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\trash  $trash
     * @return \Illuminate\Http\Response
     */
    public function destroy(trash $trash)
    {
        //
    }
}
