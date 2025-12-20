<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Cập nhật sự cố</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<style>
    body { color: #566787; background: #f5f5f5; font-family: 'Varela Round', sans-serif; }
    .card { border-radius: 3px; border: none; box-shadow: 0 1px 1px rgba(0,0,0,.05); }
    .card-header { background: #435d7d; color: #fff; padding: 16px 30px; border-radius: 3px 3px 0 0 !important; }
    .btn-info { background-color: #03A9F4; border: none; }
    .btn-info:hover { background-color: #0397d6; }
</style>
</head>
<body>
<div class="container-xl mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="m-0">Cập nhật thông tin <b>Sự cố #{{ $issue->id }}</b></h4>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('issues.update', $issue->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label><b>Tên máy tính</b></label>
                            <select name="computer_id" class="form-control" required>
                                @foreach($computers as $computer)
                                    <option value="{{ $computer->id }}" {{ $issue->computer_id == $computer->id ? 'selected' : '' }}>
                                        {{ $computer->computer_name }} ({{ $computer->model }})
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label><b>Người báo cáo</b></label>
                            <input type="text" name="reported_by" class="form-control" value="{{ $issue->reported_by }}" required maxlength="50">
                        </div>

                        <div class="form-group">
                            <label><b>Thời gian báo cáo</b></label>
                            <input type="datetime-local" name="reported_date" class="form-control" value="{{ date('Y-m-d\TH:i', strtotime($issue->reported_date)) }}" required>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label><b>Mức độ sự cố</b></label>
                                <select name="urgency" class="form-control" required>
                                    <option value="Low" {{ $issue->urgency == 'Low' ? 'selected' : '' }}>Low</option>
                                    <option value="Medium" {{ $issue->urgency == 'Medium' ? 'selected' : '' }}>Medium</option>
                                    <option value="High" {{ $issue->urgency == 'High' ? 'selected' : '' }}>High</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label><b>Trạng thái hiện tại</b></label>
                                <select name="status" class="form-control" required>
                                    <option value="Open" {{ $issue->status == 'Open' ? 'selected' : '' }}>Open (Mở)</option>
                                    <option value="In Progress" {{ $issue->status == 'In Progress' ? 'selected' : '' }}>In Progress (Đang xử lý)</option>
                                    <option value="Resolved" {{ $issue->status == 'Resolved' ? 'selected' : '' }}>Resolved (Đã giải quyết)</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label><b>Mô tả chi tiết vấn đề</b></label>
                            <textarea name="description" class="form-control" rows="4" required>{{ $issue->description }}</textarea>
                        </div>

                        <div class="text-right mt-4">
                            <a href="{{ route('issues.index') }}" class="btn btn-secondary">Hủy bỏ</a>
                            <button type="submit" class="btn btn-info px-4">Lưu thay đổi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>