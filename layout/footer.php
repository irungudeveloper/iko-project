
<div class="col-md-12 bg-dark text-white mt-2 p-3 align-self-end">
	
	<p class="text-center">IKO - SOLUTIONS @ <?php echo date("Y"); ?></p>

</div>


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/cf5e4a236d.js" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>
	$(document).on("click","a",function(e){

	var id =  $(this).attr("id");

	console.log(id);

    $.ajax({  
    type: "POST",  
    data: "id=" + $(this).attr("id"), 
    url: "category_view.php",
    success    : function(data){
                console.log(data);
            }
    });
});
</script>


</body>
</html>

