<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>HAPPY STUDENT'S</title>
    <link rel="stylesheet" href="//cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-table@1.22.6/dist/bootstrap-table.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Student Database</h2>
            <a href="{{ route('students.create') }}" class="btn btn-primary">Create Student</a>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                {{ $message }}
            </div>
        @endif

        <table id="myTable" class="table table-striped table-bordered" data-toggle="table">
            <thead class="thead-dark">
                <tr>
                    <th>S.No</th>
                    <th>Student Name</th>
                    <th>Student Email</th>
                    <th>Student Course</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr id="student-{{ $student->id }}">
                        <td>{{ $student->id }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->Course }}</td>
                        <td class="d-flex justify-content-center">
                            <a href="{{ route('students.edit', $student->id) }}" class="btn btn-sm btn-warning me-2">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="d-inline delete-student-form" data-id="{{ $student->id }}" data-name="{{ $student->name }}">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-sm btn-danger delete-student">
                                    <i class="bi bi-person-dash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>S.No</th>
                    <th>Student Name</th>
                    <th>Student Email</th>
                    <th>Student Course</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        $(document).ready(function() {
            // Initialize DataTable
            var table = $('#myTable').DataTable({
                initComplete: function () {
                    // Adding search input to each footer cell
                    this.api().columns().every(function () 
                    {
                        var column = this;
                        var input = $('<input type="text" placeholder="Search" class="form-control form-control-sm" />')
                            .appendTo($(column.footer()).empty())
                            .on('keyup change clear', function () {
                                if (column.search() !== this.value) {
                                    column.search(this.value).draw();
                                }
                            });
                    });
                    
                }
            });

            // Delete student
            $('.delete-student').click(function() {
                var form = $(this).closest('form');
                var studentId = form.data('id');
                var studentName = form.data('name');
                var actionUrl = form.attr('action'); // Get the form action URL

                if (confirm('Are you sure you want to delete ' + studentName + '?')) {
                    $.ajax({
                        url: actionUrl,
                        type: 'POST',
                        data: {
                            _method: 'DELETE',
                            _token: $('meta[name="csrf-token"]').attr('content') // Ensure the CSRF token is sent
                        },
                        success: function(response) {
                            if (response.success) {
                                $('#student-' + studentId).remove();
                                toastr.success('Student ' + studentName + ' deleted successfully.');
                                table.row('#student-' + studentId).remove().draw(false);
                            } else {
                                toastr.error('Error: ' + response.message);
                            }
                        },
                        error: function(xhr) {
                            toastr.error('Request failed. Status: ' + xhr.status + ' - ' + xhr.statusText);
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>



<!-- $(document).ready(function() {
            // Initialize DataTable
            var table = $('#myTable').DataTable({
                initComplete: function () {
                    // Adding search input to each footer cell
                    this.api().columns().every(function () 
                    {
                        var column = this;
                        var input = $('<input type="text" placeholder="Search" class="form-control form-control-sm" />')
                            .appendTo($(column.footer()).empty())
                            .on('keyup change clear', function () {
                                if (column.search() !== this.value) {
                                    column.search(this.value).draw();
                                }
                            });
                    });
                    
                }
            });

            // Delete student
            $('.delete-student').click(function() {
                var form = $(this).closest('form');
                var studentId = form.data('id');
                var studentName = form.data('name');
                var actionUrl = form.attr('action'); // Get the form action URL

                if (confirm('Are you sure you want to delete ' + studentName + '?')) {
                    $.ajax({
                        url: actionUrl,
                        type: 'POST',
                        data: {
                            _method: 'DELETE',
                            _token: $('meta[name="csrf-token"]').attr('content') // Ensure the CSRF token is sent
                        },
                        success: function(response) {
                            if (response.success) {
                                $('#student-' + studentId).remove();
                                toastr.success('Student ' + studentName + ' deleted successfully.');
                                table.row('#student-' + studentId).remove().draw(false);
                            } else {
                                toastr.error('Error: ' + response.message);
                            }
                        },
                        error: function(xhr) {
                            toastr.error('Request failed. Status: ' + xhr.status + ' - ' + xhr.statusText);
                        }
                    });
                }
            });
        }); -->
