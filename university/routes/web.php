<?php
use Illuminate\Support\Facades\Route;

Route::get('/', 'LoginController@index');
Route::post('/', 'LoginController@login');
Route::get('/logout', 'LoginController@logout');
Route::get('/home', 'HomeController@index');
Route::resource('/products','ProductsController');
Route::resource('/cafes','CafesController');
Route::resource('/societies','SocietiesController');
Route::resource('/programs','ProgramsController');
Route::resource('/sessions','SessionsController');
Route::resource('/teachers','TeachersController');
Route::resource('/books','BooksController');
Route::resource('/pages','PagesController');
Route::resource('/types','TypesController');
Route::resource('/user','UserController');
Route::resource('/student','StudentController');
Route::resource('/course','CourseController');

Route::get('/participate','ParticipateController@create');
Route::post('/participate','ParticipateController@store');
Route::delete('/participate','ParticipateController@destroy');
Route::get('/register','RegisterController@create');
Route::post('/register','RegisterController@store');
Route::delete('/register','RegisterController@destroy');
Route::get('/issue','TeacherissueController@create');
Route::post('/issue','TeacherissueController@store');
Route::patch('/issue','TeacherissueController@update');

Route::get('/cafeteria', function () {
	$cafes = App\Cafes::with('products')->get();
	return view('cafes.productsincafe', compact('cafes'));
});


Route::get('/extra', function () {
    //
    //Checking Relationships:
    //Checking on tinker and then here to recheck in dump and dye
    //
    //Many to Many:
    //-------------
    // $page = App\Pages::with('types')->get();
    // $type = App\Types::with('pages')->get();
    // $cafe = App\Cafes::with('products')->get();
    // $prod = App\Products::with('cafes')->get();
    // $society = App\Societies::with('students')->get();
    // $participated = App\Student::with('societies')->get();
    // $teaching = App\Teachers::with('courses')->get();
    // $course_teachers = App\Course::with('teachers')->get();
    // $teachers = App\Books::with('teachers')->get();
    // $books_issued = App\Teachers::with('books')->get();
    // $learning = App\Student::with('courses')->get();
    // $course_teachers = App\Course::with('teachers')->get();
    //
    //
    // dd($course_teachers);
    //
    //
});
