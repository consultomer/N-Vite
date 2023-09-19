<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QueryController extends Controller
{
    public function view(Request $request)
    {
        $queries = DB::table('query')
            ->get();

        return view('admin.query', ['queries' => $queries]);
    }
}
