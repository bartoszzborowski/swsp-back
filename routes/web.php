<?php

use App\Models\Article;
use App\Models\Student;
use App\Models\StudentParent;
use App\Repository\ClassSectionRepository;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/article', function () {
//    $dupa = StudentParent::query()->paginate(5000, ['id', 'user_id'], 'test', 1);
//    $dupa->each(static function ($item) {
//        $item->searchable();
//    });
//    $test = Student::search('sebastia')->with('user');

    /** @var ClassSectionRepository $repo */
    $repo = app(ClassSectionRepository::class);
    $repo->pushCriteria(new \App\Criteria\ClassSectionCriteria(2));
    dd($repo->all());
});
