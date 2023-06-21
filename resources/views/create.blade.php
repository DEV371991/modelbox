<html>
    <head>

    </head>
    <body>
        <div style="border:1px solid black; height:300px; width:250px">
             <h3>registration from</h3>
            <form method="post" action="{{route('store')}}">
                @csrf
                <label>username</label><br>
                <input type="text" name="username" placeholder=" please enter username"><br><br>
                <label>password</label><br>
                <input type="password" name="password" placeholder="please enter password"><br><br>
                <button type="submit">submit</button>
                <button type="button" ><a href="{{route('index')}}">Login</a></button>
            </form>
            
        </div>
        
           
        
    </body>
</html>