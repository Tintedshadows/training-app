<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <style media="screen">
      body{
        background:url("https://images.pexels.com/photos/1308624/pexels-photo-1308624.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260");
      }
      #login-form{
        width: 20%;
        padding: 20px;
        background-color: rgba(255, 255, 255, 0.8);
        border-left: 1px solid #222222;
        position: absolute;
        right: 0;
        top: 0;
        height: 100%;
        min-width: 300px;
      }
      #login-form .holder{
        position: absolute;
        top: 50%;
        -webkit-transform: translateY(-50%);
        transform: translateY(-50%);
        left: 0;
        padding: 20px;
        width: 100%;
      }
    </style>
    <title></title>
  </head>
  <body>


    <form id="login-form" method="post" action="{{ route('login') }}">
      {{csrf_field()}}
      <div class="holder">
        <label for="control-label">Email:</label>
        <div class="input-group">
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
        <label for="control-label">Password:</label>
        <div class="input-group">
          <input id="password" type="password" class="form-control" name="password" required>
        </div>
        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
        <br>
        <div class="form-group">
          <input class="btn btn-primary" type="submit" name="login" value="Login">
        </div>

      </div>
    </form>

  </body>
</html>
