<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
	<title>File Upload</title>
</head>
<body>
                                   
<form action="store" method="post" enctype="multipart/form-data">
   <label for="name" >name</label>
   <input type="text" name="name"><br/>

   <label for="image" >image</label>
   <input type="file" name="image"><br/>

   <input type="hidden" name="_token" value="{{csrf_token()}}">
    
   <input type="submit" name="submit" value="Submit">
</form>

</body>
</html>