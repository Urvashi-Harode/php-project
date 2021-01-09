<table class="table" border="1">
    <thead class="thead-light">
    <tr>
    <th scope="col">first Name</th>
    <th scope="col">Last Name</th>
    <th scope="col">Role</th>
    <th scope="col">isappoverd</th>
    <th scope="col">delete</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
    <tr>

    <td>{{  $user->firstname }}</td>
    <td>{{  $user->lastname }}</td>
    <td>{{  $user->role }}</td>
    <td>{{  $user->isapproved }}</td>

    {{-- <td>
    <!-- <a href="#" class="btn btn-sm btn-info">Show</a> -->
    <a href="{{ url('/edit/'.$student->id)}}" class="btn btn-sm btn-warning">Edit</a>
    <!-- <a href="" class="btn btn-sm btn-danger">Delete</a> -->
    </td> --}}
    <td>
    <a href="{{ url('/deleteUser/'.$user->id)}}" class="btn btn-sm btn-danger">Delete</a>

    </td>
    </tr>
    @endforeach
    </tbody>
    </table>