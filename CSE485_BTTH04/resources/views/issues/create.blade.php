<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Thêm sự cố mới</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body style="background: #f5f5f5;">
<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h4>Thêm báo cáo sự cố</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('issues.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Tên máy tính</label>
                    <select name="computer_id" class="form-control" required>
                        @foreach($computers as $computer)
                            <option value="{{ $computer->id }}">{{ $computer->computer_name }} - {{ $computer->model }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Người báo cáo</label>
                    <input type="text" name="reported_by" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Thời gian báo cáo</label>
                    <input type="datetime-local" name="reported_date" class="form-control" required>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Mức độ</label>
                        <select name="urgency" class="form-control">
                            <option value="Low">Low</option>
                            <option value="Medium">Medium</option>
                            <option value="High">High</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Trạng thái</label>
                        <select name="status" class="form-control">
                            <option value="Open">Open</option>
                            <option value="In Progress">In Progress</option>
                            <option value="Resolved">Resolved</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label>Mô tả sự cố</label>
                    <textarea name="description" class="form-control" rows="3" required></textarea>
                </div>
                <div class="text-right">
                    <a href="{{ route('issues.index') }}" class="btn btn-secondary">Hủy</a>
                    <button type="submit" class="btn btn-success">Thêm mới</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>