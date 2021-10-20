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
  

<h3 style='display:block;margin-top:20px; text-align:center'>Edit your todo</h3>
<div style='width:600px;margin-top:50px;' class='container'>
<form>
  <div class="mb-3">
    <input type="text" id='title' class="form-control" placeholder='write your todo title here'>
  </div>
  <div class="mb-3">
    <textarea class="form-control" id='description' placeholder='write your todo description here...'></textarea>
  </div>
  <div class="mb-3">
    <label for="date" class="form-label">Select date</label>
    <input type="date" id='date' class="form-control" id="date">
  </div>
  <div class="mb-3">
    <label for="date" class="form-label">Created at</label>
    <input readonly type="date" id='created_at' class="form-control" id="date">
  </div>
  <button  type="button" id='update'  class="btn btn-primary">Updated</button>
</form>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
$(document).ready( function () {
  jQuery.ajax({
		type: "GET",
		url: "<?php echo base_url('/index.php/todo/editapi?id='.$_GET['id']); ?>",
		success: function(res) 
		{
    res=JSON.parse(res);
    $('#title').val(res["title"]);
    $('#description').val(res["description"]);
    $('#date').val(res["date"]);
    $('#created_at').val(res["created_at"]);
		},
		error:function()
		{	
		}
		});
   
    $("#update").click(function() 
    {
    var title = $('#title').val();
    var description = $('#description').val();
    var date = $('#date').val();
    var id=<?php echo  $_GET['id'] ?>

	if(title!="" && description!="")
	{
		jQuery.ajax({
		type: "POST",
		url: "<?php echo base_url('/index.php/todo/editapi?id='.$_GET['id']); ?>",
		dataType: 'html',
		data: {id:id,title: title, description: description,date:date},
		success: function(res) 
		{
      console.log(res);
			if(res==1)
			{
			alert('Data Updated successfully');	
      window.location.href='/todo/index.php/todo';
			}
			else
			{
			alert('Data not updated');	
			}
			
		},
		error:function()
		{
		alert('data not updated');	
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