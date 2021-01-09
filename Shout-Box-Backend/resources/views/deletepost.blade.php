<table class="table" border="1">
    <thead class="thead-light">
    <tr>
    <th scope="col">first Name</th>
    <th scope="col">Last Name</th>
    <th scope="col">text</th>
    <th scope="col">mulitimedia</th>
    <th scope="col">delete</th>


    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
    <tr>

    <td>{{  $user->firstname }}</td>
    <td>{{  $user->lastname }}</td>

    <td>{{$user->text == "undefined" ? " " : $user->text }}
     {{-- <td>{{  $user->multimedia }}</td> --}}

      {{-- <td>  <img src="{{ $user->multimedia  }}"
        height="100px"
        width="100px"
        accept="image/*"
      />
    </div> </td> --}}

     <td>

    @if($user->type ==='jpeg' OR $user->type ==='jpg' OR $user->type ==='png')
    <img src="{{ $user->multimedia  }}"
    height="100px"
    width="100px"
    accept="image/*">


    @elseif ($user->type ==='mp4' OR $user->type ==='3gp')
    <video width="320" height="240" controls>
        <source src="{{$user->multimedia }}" type="video/mp4" />
      </video>


      @elseif ($user->type ==='mp3')
      <audio controls>
        <source
          src="{{ $user->multimedia  }}"
          height="100px"
          width="100px"
        />
      </audio>


      @endif







    {{-- <td>
    <!-- <a href="#" class="btn btn-sm btn-info">Show</a> -->
    <a href="{{ url('/edit/'.$student->id)}}" class="btn btn-sm btn-warning">Edit</a>
    <!-- <a href="" class="btn btn-sm btn-danger">Delete</a> -->
    </td> --}}
    <td>
    <a href="{{ url('/deletePost/'.$user->id)}}" class="btn btn-sm btn-danger">Delete</a>

    </td>
    </tr>
    @endforeach
    </tbody>
    </table>