<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
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

    /**
     * Update the User Avatar in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function upload_avatar(Request $request)
    {
        // return view('profile');
        // dd($request->avatar->getClientOriginalName());
        // $request->file('avatar')->store('images','public');
        // return "uploaddeeedddddd";

        if($request->hasFile('avatar')) {
            $avatar_name = $request->avatar->getClientOriginalName();

            $this->deleteOldAvatar();

            $request->avatar->storeAs('images',$avatar_name,'public' );
            
            auth()->user()->update(array('avatar'=>$avatar_name));
            // $user = User::find(1);
            // dd($user);
        }
        return redirect()->back();
    }

    protected function deleteOldAvatar() {
        if(auth()->user()->avatar) {
            Storage::delete('/public/images/'.auth()->user()->avatar);
        }
    }    

}
