<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypeMusic;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

    public function edit($id, User $user) {

        $this->data['edit'] = $user->find($id);

        return view('manage.profile', $this->data);
    }

    public function update(Request $req, User $user) {

        $inputs = $req->only('name', 'email');
        $id = $req->id;
        if (!empty($req->password)) {
            $inputs['password'] = Hash::make($req->password);
        }

        $data = $user->find($id);
        // dd($data, $inputs);
        $data->update($inputs);

        if ($req->hasFile('image')) {
            $item = $req->file('image');
            $filePath = 'image/profile';
            $this->createFolder($filePath);
            $ext = $item->getClientOriginalExtension();
            $size = \File::size($item);
            $oldFilename = $item->getClientOriginalName();
            $filename = $this->generateFilename(public_path($filePath));
            $filenameWithExtension = $filename . '.' . $ext;
            $attach['image'] = $filePath . '/' . $filenameWithExtension;
            $data->update($attach);
            $item->move(public_path($filePath) , $filenameWithExtension);
        }

        return redirect('/home');
    }

}
