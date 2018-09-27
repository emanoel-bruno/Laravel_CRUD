<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Exception;

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

    public function search(Request $request){
      $mode=3;
      $value = $request->input('search');
      $users = User::where('name','LIKE',"%{$value}%")->get();
      return view('welcome', compact("mode","users"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            $user = new User;
            $user->name = $request->input('name');
            $user->password = $request->input('password');
            $user->email = $request->input('email');

            $user->tel = $request->input('tel');

            $user->save();

            $message = "User Registred !";
            $result = true;
        } catch (Exception $e) {
            $message = "Email already registred";
            $result = false;
        }
        $users = User::all();
        $mode=0;
        // return redirect()->back()->with(["message" => $message, "result" => $result]);

        //return redirect()->back()->with("message", $message)->with("result", $result);
        // return redirect()->back()->compact("message", "result");
        return view('welcome', compact("message", "mode","users","result"));
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
      try {
          $user = User::find($id);
          $user->name = $request->input('name');
          $user->email = $request->input('email');
          $user->tel = $request->input('tel');
          $user->save();

          $message = "User Modefied !";
          $result = true;
      } catch (Exception $e) {
          $message = "Please try again.";
          $result = false;
      }
      $mode = 2;
      $users = User::all();
      return view('welcome', compact("message", "mode", "id", "users", "result"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
      	$users = User::all();
      	$mode = 0;
        $deleted = true;
      	return view('welcome', compact('users','mode','deleted'));
    }

    public function all()
    {
        $users = User::all();
        return $users;
    }
}
