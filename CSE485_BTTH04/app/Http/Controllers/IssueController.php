<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use App\Models\Computer;
use Illuminate\Http\Request;

class IssueController extends Controller
{
    public function index() {
        // Phân trang 10 bản ghi/trang theo yêu cầu [cite: 22]
        $issues = Issue::with('computer')->paginate(10);
        return view('issues.index', compact('issues'));
    }

    public function create() {
        $computers = Computer::all();
        return view('issues.create', compact('computers'));
    }

    public function store(Request $request) {
        $request->validate([
            'computer_id' => 'required',
            'reported_by' => 'nullable|max:50',
            'reported_date' => 'required|date',
            'description' => 'required',
            // Sửa lại giá trị khớp với ENUM trong DB 
            'urgency' => 'required|in:Low,Medium,High',
            'status' => 'required|in:Open,In Progress,Resolved'
        ]);

        Issue::create($request->all());
        return redirect()->route('issues.index')->with('success', 'Thêm vấn đề thành công.');
    }

    public function edit(Issue $issue) {
        $computers = Computer::all();
        return view('issues.edit', compact('issue', 'computers'));
    }

    public function update(Request $request, Issue $issue) {
        $request->validate([
            'computer_id' => 'required',
            'reported_by' => 'nullable|max:50',
            'reported_date' => 'required|date',
            'description' => 'required',
            'urgency' => 'required|in:Low,Medium,High',
            'status' => 'required|in:Open,In Progress,Resolved'
        ]);

        $issue->update($request->all());
        return redirect()->route('issues.index')->with('success', 'Cập nhật thành công.');
    }

    public function destroy(Issue $issue) {
        $issue->delete(); // Đã có Route Model Binding nên chỉ cần delete 
        return redirect()->route('issues.index')->with('success', 'Xóa vấn đề thành công.');
    }
}