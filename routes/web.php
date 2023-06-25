<?php

use App\Models\post;
use App\Models\role_user;
use App\Models\User;
use App\Models\roles;
use App\Models\cities;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/insertUser',function(){
    $pass = Hash::make(123123);
    return User::create(['name'=>'Mario','email'=>'mario123@gmail.com','password'=>$pass]);
});

Route::get('/insertPost',function(){
    return post::create(['user_id'=>'1','title'=>'PHP tutorial','content'=>'This is the fourth content']);
});

Route::get('/getPost',function(){
    $posts= post::all();
    foreach($posts as $post){
        echo $post->title . "<br>";
        echo $post->content . "<hr>";
    }
});

Route::get('/getuPost/{id}/show',function($id){
    $posts = post::find($id);
    echo $posts->title;
    echo "<br>";
    echo $posts->user->name;
    echo $posts->user->email;
});

Route::get('/getpUser/{id}/show',function($id){
    $users = User::find($id);
    echo $users->name;
    echo "<br>";

    foreach($users->post as $pos){
        echo $pos->content;
    }
});

// City
Route::get('/insertCity',function(){
    return cities::create(['user_id'=>2,'city_name'=>'Yangon']);
});
Route::get('/getCity/{id}/show',function($id){
    $city = User::find($id);
    echo $city->name . "....";
    echo $city->city->city_name;
});

// Role
Route::get('/insertRole',function(){
    return roles::create(['rank'=>'Cyber Security']);
});

//Role_user
Route::get('/insertrUser',function(){
    return role_user::create(["user_id"=> 2 ,"role_id"=>3]);
});

Route::get('/getRole/{id}/show',function($id){
    $roles = User::find($id);
    echo $roles->name . "...";
    foreach($roles->role as $ro){
        echo $ro->rank;
    }
});

// Has Many Through
Route::get('/getcPost/{id}/show',function($id){
    $posts = cities::find($id);
    echo $posts->city_name;
    echo "<br>";
    foreach($posts->posts as $poss){
        echo $poss->title . "<br>";
    }
});

//comment
Route::get('/getuComment/{id}/show',function($id){
    $ucomments = User::find($id);
    echo $ucomments->name;

    foreach($ucomments->comment as $ucom){
        echo $ucom->commentable_id . "<br>";
    }
});

Route::get('/getpComment/{id}/show',function($id){
    $pcomments = User::find($id);
    echo $pcomments->name;

    foreach($pcomments->comment as $pcom){
        echo $pcom->content . "<br>";
    }
});
