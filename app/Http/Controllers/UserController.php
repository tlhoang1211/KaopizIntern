<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Traits\Filterable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    use Filterable;

    public function index()
    {
        $data = DB::table('customers')->paginate(5);
        return view('eloquent_orm.search', compact('data'));
    }

    public function search(Request $request)
    {
        $data = Customer::filter($request)->orderBy('id', 'desc')->paginate(5);
        return view('eloquent_orm.search', compact('data'));
    }
}

