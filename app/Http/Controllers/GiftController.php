<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GiftController extends Controller
{
    public function getGifts () {
        $gifts = $this->getAllGifts();
        return view('gifts.all', compact('gifts'));
    }

    protected function getAllGifts() {
        $gifts = DB::table('users')
            ->join('gift', 'users.id', '=', 'gift.user_id')
            ->select('users.name as username','gift.*',
                DB::raw('gift.real_cost - gift.estimated_cost as diferenca'))
            ->get();

        return $gifts;
    }

    public function viewGift($id)
    {
        $gift = Db::table('gift')
            ->where('gift.id',$id)
            ->join('users', 'gift.user_id','=', 'users.id')
            ->select('gift.*', 'users.name as username')
            ->first();
        $users = DB::table('users')->get();
        return view('gifts.view', compact('gift','users'));
    }

    public function storeGift(Request $request)
    {
        $request->validate([
            'name' => 'string|max:50',
            'estimated_cost' => 'integer',
            'user_id' => 'integer'
        ]);

        DB::table('gift')
            ->where('id',$request->gift)
            ->insert([
                'name' => $request->name,
                'estimated_cost' =>$request->estimated_cost,
                'real_cost' =>$request->real_cost,
                'user_id' => $request->user_id
            ]);

        return redirect()->route('all_gifts');
    }
    public function updateGift(Request $request)
    {
        $request->validate([
            'name' => 'string|max:50',
            'estimated_cost' => 'integer',
            'user_id' => 'integer'
        ]);


        DB::table('gift')
            ->where('id',$request->id)
            ->update([
                'name' => $request->name,
                'estimated_cost' =>$request->estimated_cost,
                'real_cost' =>$request->real_cost,
                'user_id' => $request->user_id
            ]);
        return redirect()->route('all_gifts');
    }
    public function deleteGift($id)
    {
        DB::table('gift')
            ->where('id','=',$id)
            ->delete();

        return redirect()->route('all_gifts');
    }

    public function addGift()
    {
        $users = DB::table('users')->get();
        return view('gifts.add',compact('users'));
    }
}
