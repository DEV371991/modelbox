<h1>edit</h1>
<html>
    <head>

    </head>
    <body>
        <div style="border:1px solid black; height:300px; width:250px">
             <h3>Edit from</h3>
            <form method="post" action="{{route('update',$post->id)}}">
                @csrf
                <label>username</label><br>
                <input type="text" name="username" placeholder=" please enter username" value="{{$post->name}}"><br><br>
                <label>email</label><br>
                <input type="text" name="email" placeholder=" please enter email" value="{{$post->email}}"><br><br>
                <label>password</label><br>
                <input type="password" name="password" placeholder="please enter password" value="{{$post->password}}"><br><br>
                <button type="submit">submit</button>
                <button type="button" ><a href="{{route('index')}}">Login</a></button>
            </form>
            
        </div>
        
           
        
    </body>
</html>