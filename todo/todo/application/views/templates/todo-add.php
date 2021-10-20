<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>Hello, world!</title>
  </head>
  <body>
  <nav class="navbar navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
       My todo app
    </a>
  </div>
</nav>
  

<h3 style='display:block;margin-top:20px; text-align:center'>Add your todo</h3>
<div style='width:600px;margin-top:50px;' class='container'>
<form>
  <div class="mb-3">
    <input type="text" class="form-control" id='title' placeholder='write your todo title here'>
  </div>
  <div class="mb-3">
    <textarea class="form-control" id='description' placeholder='write your todo description here...'></textarea>
  </div>
  <div class="mb-3">
    <label for="date" class="form-label">Select date</label>
    <input type="date" id='date' class="form-control" id="date">
  </div>
  <button type="submit" id="butsave" class="btn btn-primary">Save</button>
</form>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
 
<script type="text/javascript">

// Ajax post
$(document).ready(function() 
{
$("#butsave").click(function() 
{
var title = $('#title').val();
var description = $('#description').val();
var date = $('#date').val();

	if(title!="" && description!="")
	{
		jQuery.ajax({
		type: "POST",
		url: "<?php echo base_url('/index.php/todo/savedata'); ?>",
		dataType: 'html',
		data: {title: title, description: description,date:date},
		success: function(res) 
		{
      console.log(res);
			if(res==1)
			{
			alert('Data saved successfully');	
      window.location.href='/todo/index.php/todo/';
			}
			else
			{
			alert('Data not saved');	
			}
			
		},
		error:function()
		{
		alert('data not saved');	
		}
		});
	}
	else
	{
	alert("pls fill all fields first");
	}

});
});
</script>
 
  </body>
</html>


