<table class="users-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Username</th>
            <th>Email</th>
            <th>Gender</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user['ID'] }}</td>
                <td>{{ $user['Firstname'] }}</td>
                <td>{{ $user['Lastname'] }}</td>
                <td>{{ $user['Username'] }}</td>
                <td>{{ $user['Email'] }}</td>
                <td>{{ $user['Gender'] }}</td>
                <td>
                    <a href="{{ route('users.edit', ['id' => $user['ID']]) }}" class="btn btn-edit">Edit</a>

                    <form action="{{ route('users.delete', ['id' => $user['ID']]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-delete">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@include('components.pagination')
