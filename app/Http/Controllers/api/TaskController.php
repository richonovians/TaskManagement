<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTaskRequest;
use App\Models\Task;
use App\Http\Resources\ApiResource;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Model\Role;
use Spatie\Permission\Model\Permission;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    // public function __construct() {
    //     $this->middleware(["role:superadmin"]);
    // }

    public function index()
    {
        $this->authorize("lihat Task");
        $tasks = Task::latest()->paginate(10);
        return response()->json($tasks);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        $validator = Validator::make($request->all(),
        [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:pending,in_progress,completed',
            'due_date' => 'required|date',
            'category_id' => 'required|exists:categories,id',
            'user_id' => 'required'
        ]);

        $data = Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'due_date' => $request->due_date,
            'category_id' => $request->category_id,
            'user_id' => $request->user_id
        ]);

        return new ApiResource (
            $data, "Berhasil di tambahkan", "True"
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tasks = Task::find($id);
        return response()->json(
            ["pesan" => "Berhasil",
            "status" => "Completed",
            "data" => $tasks]);

        return new ApiResource (
            $tasks, "Berhasil", "True"
        );
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->authorize('ubah Task', $request);
        $tasks = Task::find($id);
        $tasks->update($request->all());

        return response()->json([
            'status' => 'success',
            'pesan' => 'Task berhasil diperbarui',
            'data' => $request
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tasks = Task::find($id);
        $tasks->delete(); //FEIN FEIN FEIN FEIN!!!!

        return new ApiResource (
            $tasks, "Berhasil dihapus", "True"
        );
    }
}