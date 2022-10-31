<?php

use App\Http\Controllers\Category;
use App\Jobs\SendTestMailJob;
use App\Mail\OrderShipped;
use App\Mail\SendMarkdawn;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[Category::class,'index']);
Route::post('addcategory',[Category::class,'store']);

// Route::get('/', function () {
//     $users=User::find(2)->roles()->attach(1,['name'=>'oytizo']);
//     $users=User::find(2)->roles()->detach([1]);
//     dd($user);
//     $arr=[2,1];
//     $users=User::where('id',$arr)
//     ->get();
//     $users=DB::table('users')
//     ->whereIn('id', $arr)
//     ->get();
//     $users=User::find(2)->roles()->get();
//     foreach($users as $user){
//       echo $user->pivot->name;
//     }
//     echo $users->name;

//     dd($users);
//    $data=['data'=>'This is data'];
//     Mail::send('emails.orders.shipped',$data,function($msg){
//       $msg->to("test@test.com","Laravel")
//       ->from("hello@example.com")
//       ->subject("hellow")
//       ->text("This is Content");
//         });
//   Mail::to('test@test.com')->send(new SendMarkdawn());
//   dispatch(function(){                      //closer method
//   Mail::to('test@test.com')->send(new SendMarkdawn());
//   })->delay(now()->addSeconds(5));
//   dispatch(new SendTestMailJob())->delay(now()->addSeconds(5)); // another method
//   $user=User::findorfail(2);
// SendTestMailJob::dispatch($user)->delay(now()->addSeconds(5)); //this is another methods
//     echo "mail sent";

// });
