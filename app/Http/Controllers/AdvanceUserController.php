<?php

namespace App\Http\Controllers;

use App\Models\AdvanceUser;
use App\Traits\Filterable;
use Illuminate\Http\Request;

class AdvanceUserController extends Controller
{
    use Filterable;

    public function index()
    {
        $adv_data = AdvanceUser::query()->paginate(5);
        return view('eloquent_orm.advance_search', compact('adv_data'));
    }

    public function search_advance(Request $request)
    {
        $adv_data = AdvanceUser::filter($request)
            ->join('phones', 'advance_users.id', '=', 'phones.user_id')
            ->select('*', 'phones.number')
            ->orderBy('advance_users.id', 'asc')->paginate(5);
        return view('eloquent_orm.advance_search', compact('adv_data'));
    }
}
