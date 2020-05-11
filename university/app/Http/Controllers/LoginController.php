<?php

namespace App\Http\Controllers;

use App\Types;
use App\Student;
use App\Teachers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
	public function index()
    {
        $types = Types::all();
        return view('login',compact('types'));
    }

	public function login(Request $request)
    {
		$total = count(Types::all());
		$validation = $request->validate([
			'tid' => "required|numeric | lte:$total",
            'tid' => 'numeric|gt:0',
            'name' => 'required',
            'pass' => 'required'
        ]);
		$type = Types::with('users','pages')->where('tid',$request->tid)->get()->first();
		if($type->tname == 'Student'){
			$student = Student::where('sname',$request->name)->get()->first();
			if($student == null){
				return redirect()->back()->withErrors(["my error"=>"Incorrect Username or Password!"]);
			}
			else if($request->pass != ($type->users[0]->password)){
				return redirect()->back()->withErrors(["my error"=>"Incorrect Username or Password!"]);
			}
			else{
				$request->session()->put('user', $student);
				$request->session()->push('type', $type);
				return redirect('/home');
			}
		}
		else if($type->tname ==  'Teacher'){
			$teacher = Teachers::where('Firstname',$request->name)->get()->first();
			if($teacher == null){
				return redirect()->back()->withErrors(["my error"=>"Incorrect Username or Password!"]);
			}
			else if($request->pass != ($type->users[0]->password)){
				return redirect()->back()->withErrors(["my error"=>"Incorrect Username or Password!"]);
			}
			else{
				$request->session()->put('user', $teacher);
				$request->session()->push('type', $type);
				return redirect('/home');
			}
		}

		return redirect()->back();
    }

	public function logout()
	{
		session()->flush();
		return redirect('/');
	}
}
