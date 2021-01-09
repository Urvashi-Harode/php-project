<table class="table" border="1">
    <thead class="thead-light">
    <tr>
    <th scope="col">first Name</th>
    <th scope="col">Last Name</th>
    <th scope="col">Role</th>
    <th scope="col">isappoverd</th>
    <th scope="col">Approve</th>
    <th scope="col">Reject</th>

    </tr>
    </thead>
    <tbody class="A">
    @foreach($users as $user)
    <tr>

    <td>{{  $user->firstname }}</td>
    <td>{{  $user->lastname }}</td>
    <td>{{  $user->role }}</td>
    <td>{{  $user->isapproved }}</td>

     
    <td>
    <a href="{{ url('/updatestatus/'.$user->id)}}" class="btn btn-sm btn-primary">Approve</a>

    </td>
    <td>
        <a href="{{ url('/reject/'.$user->id)}}" class="btn btn-sm btn-danger">Reject</a>

        </td>
    </tr>
    @endforeach
    </tbody>
    </table>