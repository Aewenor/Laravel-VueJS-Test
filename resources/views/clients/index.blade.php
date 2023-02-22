<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Client Blade View</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Client Blade View</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('clients.create') }}"> Create Client</a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Client Name</th>
                    <th>Client Surname</th>
                    <th>Client Email</th>
                    <th>Client Address</th>
                    <th>Client Phone</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clients as $Client)
                    <tr>
                        <td>{{ $Client->id }}</td>
                        <td>{{ $Client->name }}</td>
                        <td>{{ $Client->surname }}</td>
                        <td>{{ $Client->email }}</td>
                        <td>{{ $Client->address }}</td>
                        <td>{{ $Client->phone }}</td>
                        <td>
                            <form action="{{ route('clients.destroy',$Client->id) }}" method="Post">
                                <a class="btn btn-primary" href="{{ route('clients.edit',$Client->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
        {!! $clients->links() !!}
    </div>
</body>
</html>
