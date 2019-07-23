<html>
<head>

      <style type = "text/css" media = "all">
         body {
            background-color: blue;
         }
         h1 {
            color: maroon;
            margin-left: 40px;
         }
		 form
		 {
			 text -align:center:
		 }
      </style>
	   <script type="text/javascript">
         <!--
            function submit() {
               alert("submitted")
            }
         //-->
      </script>
 </head>
<body>

<h1>registration form</h1>

<form action="welcome_post.php" method="post">
Name: <input type="text" name="name"><br>
E-mail: <input type="text" name="email"><br>
</form>
<input type="button" onclick="submit()" value= " submit"/>


</body>
</html>