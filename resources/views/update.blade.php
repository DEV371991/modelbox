<h1>update blade</h1>
<h1>edit blade</h1>


<html>
    <head>
        <title></title>
        <link rel="stylesheet" href="https://
        cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
        <script>
            
        </script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                @if(Session::has('message'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                @endif
                <div>
                    <form method="post" action="{{route('edit',1)}}" name="">
                        @csrf
                        
                        <h4>edit form</h4>
                        <label>user name</label>
                        <br>
                        <input type="text" name="name" value="{{$post->name}}">
                        <br>
                        <label>password<store/label>
                        <br>
                        <input type="password" name="password" value="{{$post->password}}">
                        <br><br>
                        <button type="submit">submit</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
