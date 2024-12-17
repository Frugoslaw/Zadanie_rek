<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Task;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $query = Task::query();
        $query->where('user_id', auth()->user()->id);
        if ($request->has('priority') && in_array($request->priority, array_keys(\App\Constants\TaskConstants::PRIORITY))) {
            $query->where('priority', $request->priority);
        }

        if ($request->has('status') && in_array($request->status, array_keys(\App\Constants\TaskConstants::STATUS))) {
            $query->where('status', $request->status);
        }

        if (!empty($request->input('due_date_from')) && !empty($request->input('due_date_to'))) {
            $query->whereBetween('due_date', [
                Carbon::parse($request->due_date_from)->toDateString(),
                Carbon::parse($request->due_date_to)->toDateString(),
            ]);
        } elseif (!empty($request->input('due_date_from'))) {
            $query->where('due_date', '>=', Carbon::parse($request->due_date_from)->toDateString());
        } elseif (!empty($request->input('due_date_to'))) {
            $query->where('due_date', '<=', Carbon::parse($request->due_date_to)->toDateString());
        }


        $tasks = $query->paginate(15);
        return view('home', ['tasks' => $tasks]);
    }
}
