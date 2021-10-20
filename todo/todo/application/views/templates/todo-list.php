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
  

<div class='container'>
<div style='min-width:300px;width:70%;margin:50px auto' class="input-group">
  <a href="/todo/index.php/todo/add"><button class="btn btn-primary" style='margin-left:auto;' type="button" id="button-addon2">Add new todo</button></a>
</div>
</div>

</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
<script>
function Delete(id){
  jQuery.ajax({
		type: "POST",
		url: "<?php echo base_url('/index.php/todo/delete'); ?>",
		dataType: 'html',
		data: {id:id},
		success: function(res) 
		{
      console.log('e',res);
			if(res==1)
			{
			alert('Data Deleted successfully');	
      window.location.reload();
			}
			else
			{
			alert('Data not deleted');	
			}
			
		},
		error:function()
		{
		alert('data not deleted');	
		}
		});
}

$(document).ready( function () {
  jQuery.ajax({
		type: "GET",
		url: "<?php echo base_url('/index.php/todo/getlist'); ?>",
		success: function(res) 
		{
      res=JSON.parse(res);
       res.map(element=>{
        
        var div = $("<div>", { "class": "input-group" ,"style":"min-width:300px;width:70%;margin:10px auto"});
        div.append("<input type='text' class='form-control' value='"+element.title+"' readonly aria-describedby='button-addon2'>");
        div.append("<a href='/todo/index.php/todo/edit?id="+element.id+"'><button class='btn btn-warning' style='margin-right:5px' type='button'>Edit</button></a>")
        div.append("<button class='btn btn-danger' type='button' onclick='Delete("+element.id+")' >Delete</button>") ;
        $(".container").append(div);
         
         })
  
    
		},
		error:function()
		{	
		}
		});
});
</script>
</html>