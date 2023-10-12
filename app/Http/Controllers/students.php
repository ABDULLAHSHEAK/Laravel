<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\student;
use Carbon\carbon;
use Illuminate\Support\Facades\Validator;
class students extends Controller
{
    function index(){
        $data = student::all();
        return view('show',['student' => $data]);
        // return student::all();

    }

    function creat(){
        return view('create');
    }

    function storage(Request $req){

        $validator = Validator::make($req->all(), [
        'name'  => ['required', 'string', 'max:50'],
        'roll'  => ['required', 'numeric'],
        'reg'   => ['required', 'numeric'],
        'email' => ['required', 'email'],
        'img' => ['nullable', 'image','mimes:jpeg,png,jpg,gif,webp','max:2048'],
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $insert        = new student();
        if($req->hasFile('image')){
            $image = $req->file('image');
            $path = $image->store("student/$insert->id",'public');
            $insert->image = $path;
        }

        $insert->name  = $req->name;
        $insert->roll  = $req->roll;
        $insert->reg   = $req->reg;
        $insert->email = $req->email;
        $insert->save();
        return redirect()->route('index')->with('success','Data Insert Successfully');
    }
    function edit($id){
        $a['student'] = student::findOrFail($id);
        return view('edit',$a);
    }
    function update(Request $request , $id){
        $student = student::findOrFail($id);
        $student->name = $request->name;
        $student->roll = $request->roll;
        $student->reg = $request->reg;
        $student->email = $request->email;
        $student->updated_at = carbon::now();
        $student->update();
        return redirect()->route('index');
    }
    function delete($id){
        $student = student::findOrFail($id);
        $student->delete();
        return redirect()->route('index');
        // return redirect()->back();
    }

}
