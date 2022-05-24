<!DOCTYPE html>
<html>

<head>
    <title>Import Export User Excel</title>
    <link rel="stylesheet" type="text/css"
        href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        #userList {}

        #userList .dataTables_info {
            margin-top: 1rem;
        }

        #userList .odd,
        #userList .even {
            background: none;
        }

        #userList thead th {
            padding: 1rem;
        }

        #userList .sorting_1 {
            background: none;
        }

        #userList td {
            padding: 1rem;
        }

        #userList_wrapper .dataTables_filter {
            margin-bottom: 1rem;
        }

        #userList_wrapper .userList_length {
            margin-bottom: 1rem;
        }

        #userList_wrapper .dataTables_paginate {
            margin-top: 1rem;
        }

        #userList_wrapper .dataTables_info {
            margin-top: 1rem;
        }

    </style>
</head>

<body>

    <div class="container">
        <div class="card bg-light mt-3 mb-4">
            <div class="card-header">
                Import Excel
            </div>
            <div class="card-body">
                <form action="{{ route('users.import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="file" name="file" class="form-control">
                        @error('file')
                            <div class="alert-danger mt-2 p-2">{{ $errors->first('file') }} </div>
                        @enderror
                    </div>
                    <button class="btn btn-success mt-3">Import</button>
                </form>

            </div>
        </div>
        @if (Session::has('message'))
            <p class="alert-success">{{ Session::get('message') }}</p>
        @endif
        <div class="row mb-4">
            <div class="col-md-12">
                <a class="btn btn-warning float-end" href="{{ route('users.export') }}">Export Data</a>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col">
                <div class="app-card app-card-orders-table">
                    <div class="app-card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover mb-0 text-left" id="userList">
                                <thead>
                                    <tr>
                                        <th class="cell">ID</th>
                                        <th class="cell">Username</th>
                                        <th class="cell">Email</th>
                                        <th class="cell">Admin</th>
                                        <th class="cell">Status</th>
                                        <th class="cell">Hidden</th>
                                        <th class="cell">Banned</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td class="cell">{{ $user->id }}</td>
                                            <td class="cell">
                                                <a href="#">{{ $user->name }}</a>
                                            </td>
                                            <td class="cell">{{ $user->email }}</td>
                                            <td class="cell">
                                                <span class="badge bg-primary">Admin</span>
                                            </td>
                                            <td class="cell">
                                                <span class="badge bg-success">Verified</span>
                                            </td>
                                            <td class="cell">
                                                <span class="badge bg-warning">Hidden</span>
                                            </td>
                                            <td class="cell">
                                                <span class="badge bg-danger">Hidden</span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!--//table-responsive-->
                    </div>
                    <!--//app-card-body-->
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8"
        src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
    <!-- Page Specific JS -->
    <script>
        $(document).ready(function() {
            $("#userList").dataTable();
        })
    </script>
</body>

</html>
