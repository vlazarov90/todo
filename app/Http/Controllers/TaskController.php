<?php


namespace App\Http\Controllers;


use App\Models\task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::paginate(15);

        return view('task.index', ['tasks' => $tasks]);
    }

    public function new()
    {
        return view('task.new');
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'text' => 'required|min:1|max:255'
        ]);

        if ($validator->fails()) {
            return redirect('/new')
                ->withErrors($validator)
                ->withInput();
        }

        try{
            Task::create([
                'text' => $request->get('text')
            ]);
        } catch (\Exception $e){
            return redirect()->back()->withErrors('Something went wrong')->withInput();
        }


        return redirect('/')->with(['success' => 'Task successfully created']);
    }

    public function toggleStatus($id)
    {
        $task = Task::find($id);

        $task->completed = !$task->completed;

        try{
           $task->save();
        } catch (\Exception $e){
            return redirect()->back()->withErrors('Something went wrong');
        }

        return redirect()->back()->with(['success' => 'Status successfully changed']);
    }
}
