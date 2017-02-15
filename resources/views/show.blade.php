<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

 @foreach($user as $users)
    <img src="{{$users->name}}" alt="" width="150" height="150">
 @endforeach

</body>
</html>