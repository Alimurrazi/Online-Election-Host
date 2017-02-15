<!DOCTYPE html>
<html>

<body>
<meta name="csrf-token" content="{{ csrf_token() }}" />
<form method="post" action="{{ action('electionentryController@test')}}" class="form">
  First name:<br>
  <input type="text" value="Mickey">
  <br> 
  Last name:<br>
  <input type="text" name="lastname" value="Mouse">
  <br><br>
  <input type="submit" value="Submit">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>

<form method="post" action="{{ action('electionentryController@test')}}" class="form">
         <input type="text" placeholder="Username">
         <input type="text" placeholder="Father's Name">
         <input type="text" placeholder="Mother's Name">
            <input type="password" placeholder="Id number">
         <input type="email" placeholder="email">
         <input type="password" placeholder="Password">
         <button type="submit" id="login-button">Login</button>

      </form> 

<p>If you click the "Submit" button, the form-data will be sent to a page called "action_page.php".</p>

<p>Notice that the value of the "First name" field will not be submitted, because the input element does not have a name attribute.</p>

</body>
</html>