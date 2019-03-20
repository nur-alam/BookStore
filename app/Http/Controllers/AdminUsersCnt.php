<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Yajra\Datatables\Datatables;

use App\User;

class AdminUsersCnt extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }	
    

	public function index()
	{
		$users = User::all();
		return view('admin.users',compact('users'));
		//return response()->json($users);
	}

	// public function getUsers()
	// {
	// 	return Datatables::of(User::query())->make(true);
	// }
	// session()->flash('success','Post updated done!!');
	// return back()->withErrors([
 //                'errors' => 'Post not updated!!, Something went wrong'
 //            ]);

	public function deleteUser(User $user){

		//$deleted = User::where('id','=',$user->id)->delete();
		//$deleted = false;
		$deleted = true;
		if($deleted){
			session()->flash('success','Yeah user deleted');
			return redirect()->back();
		}

		return back()->withErrors([
			'errors' => 'User not deleted!!'
		]);

	}

}
