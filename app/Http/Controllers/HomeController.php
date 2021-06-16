<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Memo;
use Illuminate\Support\Facades\Auth;
// use App\Http\Controllers\MemoController;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {

        // dd($request);

        $memos = Memo::where('user_id',Auth::user()->id)->orderBy('created_at', 'desc')->get();
       
        // $memo = Memo::where('id',$request->id)->first();

        $catchmemo = Memo::find($request->id);
          
        return view('home',[
            'memos' => $memos,
            // 'memo' => $memo,
            'catchmemo' => $catchmemo
            ]);
    }

   public function create(Request $request)
   {

        $memo = new Memo();

        $memo->user_id = $request->input('user_id');
        $memo->title = $request->input('title');
        $memo->content = $request->input('content');
        $memo->save();

        return redirect(route('home'));

   }

  
}
