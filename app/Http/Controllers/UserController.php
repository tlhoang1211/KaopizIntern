<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\Filterable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    use Filterable;

    public function index()
    {
        $data = DB::table('users')->paginate(5);
        return view('Eloquent ORM.search', compact('data'));
    }

    public function search(Request $request)
    {
        $data = User::filter($request)->orderBy('id', 'desc')->paginate(5);
        return view('Eloquent ORM.search', compact('data'));
    }
}

