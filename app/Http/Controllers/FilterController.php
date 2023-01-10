<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function orderby(Request $request) {
        $request->validate(['orderby' => 'in:created_at,completion_deadline']);

        return redirect()->route('task.index', ['orderby' => $request->query('orderby')]);
    }

    public function search(Request $request) {
        return redirect()->route('task.index', ['search' => $request->input('search')]);
    }
}
