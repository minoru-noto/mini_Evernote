<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Memo;
use Illuminate\Support\Facades\Auth;

class MemoController extends Controller
{


    public function show($id)
    {


        $memo = Memo::where('id',$id)->first();

        
        // dd($memo); //結果1

        return redirect(route('home',['id' => $memo->id]));

    }

    public function create(Request $request,$id)
    {


        $CreateMemo = Memo::find($id);

        // dd($CreateMemo);
        
        $CreateMemo->user_id = $request->input('user_id');
        $CreateMemo->title = $request->input('title');
        $CreateMemo->content = $request->input('content');
        $CreateMemo->save();

        return redirect(route('home',['id'=> $CreateMemo->id]));

    }

    public function destroy($id)
    {

        Memo::destroy($id);

        return redirect(route('home'));
        

    }


}
