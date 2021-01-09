<nav class="navbar navbar-expand-lg navbar-light bg-info">
    <a class="navbar-brand" href="{{url('/')}}">Shout Box</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
    <a class="nav-item nav-link active" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
    <!-- <a class="nav-item nav-link active" href="{{url('/users')}}"> Pending Users </a> -->
    <a class="nav-item nav-link active" href="{{url('/getAllloginUsers')}}"> login Users </a>

    <a class="nav-item nav-link active" href="{{url('/getReportedShouts')}}"> Reported Shouts </a>
    <a class="nav-item nav-link active" href="{{url('/getAllPosts')}}"> All Shouts </a>

     </div>
    </div>
    </nav>