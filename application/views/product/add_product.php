<div class="container mt 4">
	<h2 class="text-left" style="margin-top: 10px;">
		Add Product
	</h2>

	<a href="#" id="addbtn" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a>
	
	<br><br>
	<form action="<?php echo base_url(); ?>/product/save_product" method="post">
		<table class="table table-bordered ">
			<thead>
				<th width="10%">Serial</th>
				<th width="20%">Product ID</th>
				<th width="20%">Product Name</th>
				<th width="25%">Sale Price</th>
				<th width="25%">Purchase Price</th>
			</thead>

			<tbody id="append">

			</tbody>
		</table>

		<br>
		<button class="btn btn-success" type="submit">Submit</button>

		<button class="btn btn-warning" type="reset">Reset</button>
	</form>
</div>

<!-- script -->
<script>
	$(document).ready(function() {
		var data = '';
		var i = 1;
		$('#addbtn').click(function(event) {
			console.log('yes');

			data += '<tr>'
			+'<td class="text-center">'+i+'</td>'
			+'<td><input name="product_id[]" class="form control input-full" type="text"></td>'
			+'<td><input name="product_name[]" class="form control input-full" type="text"></td>'
			+'<td><input name="sale_price[]" class="form control input-full" type="text"></td>'
			+'<td><input name="purchase_price[]" class="form control input-full" type="text"></td>'
			+'<td id="deleteid'+i+'"><i class="fa fa-trash btn btn-danger deletebtn" attr="'+i+'"></i></td>'
			+'</tr>';
			$('#append').append(data);	 
			i++;
			data = '';

			//deletebtn
			$('.deletebtn').click(function(){
				//console.log($(this).attr('attr'););
				var rowid = $(this).attr('attr');
				console.log(rowid); 
				$('#deleteid'+rowid).parent().remove();
			});
			
		});

		
	});
</script>