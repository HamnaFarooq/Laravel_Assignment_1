<?php

namespace App\Http\Controllers;
use App\Student;
use App\Teachers;
use Illuminate\Http\Request;

class HomeController extends Controller
{
	public function index()
	{
		$type = Session('type');
		if($type != null){
			if($type->tname == 'Student'){
				$id = Session('user')->sid;
				$clubs = Student::with('societies')->where('sid',$id)->first()->societies;
				$learning = Student::with('courses')->where('sid',$id)->first()->courses;
				return view('home',compact('clubs','learning'));
			}
			elseif ($type->tname == 'Teacher') {
				$id = Session('user')->TId;
				// $courses = Teachers::with('courses')->where('TId', $id)->first()->courses;
				$courses = Teachers::getCoursesOf($id);
				$books = Teachers::with('books')->where('TId', $id)->first()->books;
				return view('home',compact('courses' , 'books'));
			}
			elseif ($type->tname == 'Admin') {
				return view('home');
			}
		}
		else {
			return redirect('/');
		}

	}
}
