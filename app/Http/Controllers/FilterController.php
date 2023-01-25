<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function orderby(Request $request) {
        $request->validate(['orderby' => 'in:created_at,completion_deadline']);
        $search = $request->input('search');
        $orderby = $request->input('orderby');
        $status = $request->input('status');
        return redirect()->route('task.index', ['search' => $search, 'orderby' => $orderby, 'status' => $status]);
    }

    public function search(Request $request) {
        $search = $request->input('search');
        $orderby = $request->input('orderby');
        $status = $request->input('status');
        return redirect()->route('task.index', ['search' => $search, 'orderby' => $orderby, 'status' => $status]);
    }

    public function status(Request $request) {
        $status = $request->status;
        return redirect()->route('task.index', ['status' => $status]);
    }
}
