<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTaskRequest;


class TaskController extends Controller
{
    public function show(Request $request)
    {
        // Ambil status dari request jika ada, defaultnya 'all'
        $status = $request->input('status', 'all');

        // Query dasar
        $tasks = Task::query();

        // Jika status tidak 'all', filter berdasarkan status
        if ($status !== 'all') {
            $tasks = $tasks->where('status', $status);
        }

        // Dapatkan hasil query
        $tasks = $tasks->get();

        // Kirim data ke view
        return view('task.show', [
            'task' => $tasks,
            'selectedStatus' => $status // Mengirim status terpilih
        ]);
    }

    function add() {
        return view('task.add');
    }

    public function submit(Request $request)
    {
        // Debugging: Lihat data yang diterima
        // dd($request->all());  // Pastikan data yang di-submit terlihat

        // Validasi input, tanpa validasi 'user_id' karena kita akan mengambilnya dari Auth
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:pending,in_progress,completed',
            'due_date' => 'required|date',
        ]);

        // Tambahkan user_id dari user yang sedang login
        $validatedData['user_id'] = Auth::id(); // Mengambil ID user yang sedang login

        // Buat instance Task baru dengan data yang divalidasi
        $task = new Task($validatedData);

        // Simpan task ke database dan tambahkan logika error
        try {
            $task->save();
            return redirect()->route('task.show')->with('success', 'Task berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menambahkan task: ' . $e->getMessage());
        }
    }

    public function detail($id)
    {
        $task = Task::find($id);
        
        if (!$task) {
            return redirect()->route('task.show')->with('error', 'Task tidak ditemukan');
        }

        return view('task.detail', compact('task'));
    }


    function edit($id) {
        $task = Task::find($id);
        return view('task.edit', compact('task'));
    }

    public function update(Request $request, $id)
    {
        // Temukan task berdasarkan ID
        $task = Task::find($id);

        // Validasi input, tanpa validasi 'user_id' karena kita tidak ingin mengubahnya
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:pending,in_progress,completed',
            'due_date' => 'required|date',
        ]);

        // Update task dengan data yang telah divalidasi, kecuali user_id
        $task->title = $validatedData['title'];
        $task->description = $validatedData['description'];
        $task->status = $validatedData['status'];
        $task->due_date = $validatedData['due_date'];

        // Tidak mengubah user_id
        // $task->user_id tetap tidak diubah

        // Simpan perubahan
        $task->save();

        return redirect()->route('task.show')->with('success', 'Task berhasil diperbarui');
    }

    function delete($id) {
        $task = Task::find($id);
        $task->delete();
        return redirect()->route('task.show');
    }
}
