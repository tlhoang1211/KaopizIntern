<?php

namespace App\Http\Controllers;

use App\Models\AdvanceUser;
use App\Models\Role;
use App\Traits\Filterable;
use Illuminate\Http\Request;

class AdvanceUserController extends Controller
{
    use Filterable;

    public function index()
    {
        $adv_data = AdvanceUser::paginate(5);
        return view('Eloquent ORM.advance_search', compact('adv_data'));
    }

    public function search_advance(Request $request)
    {
//        $adv_data = AdvanceUser::query();
//        $condition = [];
//
//        if ($request->has('id')) {
//            array_push($condition, ['id', '=', $request->id]);
//        }
//
//        if ($request->has('name')) {
//            $firstName_query = AdvanceUser::where($condition)->where('first_name', 'LIKE', '%' . $request->name . '%')->paginate(5)->appends(request()->query());
//            $lastName_query = AdvanceUser::where($condition)->where('last_name', '=', $request->name)->paginate(5)->appends(request()->query());
//            $adv_data = $firstName_query->merge($lastName_query);
//            dd($adv_data);
//        }
//
//        if ($request->has('phone')) {
//            foreach ($adv_data as $user) {
//                dd($user->phones);
//            }
//        }
//
//        $adv_data = AdvanceUser::where($condition)->paginate(5)->appends(request()->query());
//        dd($adv_data);
        $adv_data = AdvanceUser::filter($request)->orderBy('id', 'desc')->paginate(5);
        return view('Eloquent ORM.advance_search', compact('adv_data'));
    }
}
