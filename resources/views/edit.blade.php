<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Student Data Base</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Edit Student</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('students.index') }}" class="btn btn-primary mb-3">Back</a>
                        @if(session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                        @endif
                        <form action="{{ route('students.update',$student->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name"><strong>Student Name:</strong></label>
                                <!-- $student -->
                                <input type="text" name="name" class="form-control" value="{{ $student->name }}" placeholder="Student name">
                                @error('name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email"><strong>Student Email:</strong></label>
                                <input type="email" name="email" class="form-control" placeholder="Student Email" value="{{ $student->email }}">
                                @error('email')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="phone"><strong>Student Phone:</strong></label>
                                <input type="tel" name="phone" class="form-control" value="{{ $student->phone }}" placeholder="Student Phone">
                                @error('phone')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="Course"><strong>Student Course:</strong></label>
                                <input type="text" name="Course" class="form-control" value="{{ $student->Course }}" placeholder="Student Course">
                                @error('Course')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
