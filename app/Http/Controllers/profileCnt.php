<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class profileCnt extends Controller
{


    public function index()
    {
        return view('profile');
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit()
    {
        return view('edit_profile');
    }

    public function reset_password()
    {
        return view('password');
    }

    public function nid()
    {
        return view('nidinfo');
    }

    public function nidStore(Request $request)
    {

        $allowed = config('app.allowed');
        $maxfilesize = config('app.file_size');
        $rules = [
            'address' => ['required'],
            'nid' => ['required','numeric','unique:users'],
            'nid_image' => "required|mimes:{$allowed}|max:{$maxfilesize}"
        ];

        $this->validate($request,$rules);
        $file = $request->file('nid_image');
        $originalFilename = $file->getClientOriginalName();
        $ext = explode(".", $originalFilename);
        $destination = "img/nid_".rand()."_".$ext[0]."_".time().".".end($ext);
        $uploaded = Storage::put($destination,file_get_contents($file));

        $nid_updated = DB::table('users')
            ->where('id',auth()->user()->id)
            ->update([
                'address' => $request->address,
                'nid' => $request->nid,
                'nid_img' => $destination
            ]);

        if($nid_updated){
            session()->flash('info', 'NID info update now you can rent book , go ahead!!');
            return redirect(route('home'));
        }

        return back()->withErrors([
            'errors' => 'Something went wrong!'
        ]);

    }

    public function changePassword(Request $request)
    {

        $rules = [
            'old_password' => ['required', 'string', 'max:20'],
            'password' => ['required', 'string', 'min:6', 'max:20','confirmed']
        ];

        $this->validate($request,$rules);

        $user = auth()->user();

        if( Hash::check($request->old_password, $user['password']) ){
            $user->password = bcrypt($request->password);
            $user->save();
            session()->flash('success','password updated.');
            return redirect(route('profile.index'));
        }

        return back()->withErrors([
            'errors' => 'Wrong old password.'
        ]);

    }


    public function update(Request $request)
    {

        $allowed = config('app.allowed');
        $maxfilesize = config('app.file_size');

        $hasUser = DB::table('users')
            ->where('name', $request->name)
            ->whereNotIn('id',[auth()->user()->id])
            ->get()->first();

        if(!empty($hasUser))
        {
            return back()->withErrors([
                'errors' => 'user name already used by another one.'
            ]);
        }

        if($request->image == null){

            $request->image = auth()->user()->image;

            $rules = [
                'name' => ['required', 'string', 'min:3']
            ];

            $this->validate($request,$rules);

        }else {

            $rules = [
                'name' => ['required', 'string', 'min:3'],
                'image' => "required|mimes:{$allowed}|max:{$maxfilesize}"
            ];

            $this->validate($request, $rules);

            $isImageDeleted = Storage::delete(auth()->user()->image);

            if ($isImageDeleted || auth()->user()->image == 'img/default.png') {

                $file = $request->file('image');
                $originalFilename = $file->getClientOriginalName();
                $ext = explode(".", $originalFilename);
                $destination = "img/propic_" . rand() . "_" . $ext[0] . "_" . time() . "." . end($ext);
                Storage::put($destination, file_get_contents($file));
                $request->image = $destination;

            } else {

                return back()->withErrors([
                    'errors' => 'Profile image not found.'
                ]);

            }
        }

        $profile_updated = DB::table('users')
            ->where('id',auth()->user()->id)
            ->update([
                'name' => $request->name,
                'image' => $request->image
            ]);

        if($profile_updated){
            session()->flash('success', 'Profile updated');
            return redirect(route('profile.index'));
        }

        return redirect(route('profile.index'));

    }


    public function destroy($id)
    {
        //
    }


}
