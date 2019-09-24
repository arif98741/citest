<div class="container mt 4">
	<h2 class="text-left" style="margin-top: 10px;">
		Product List
	</h2>
	
	<br><br>
	
	<table class="table table-bordered ">
		<thead>
			<th width="10%">Serial</th>
			<th width="20%">Product ID</th>
			<th width="20%">Product Name</th>
			<th width="25%">Sale Price</th>
			<th width="25%">Purchase Price</th>
		</thead>

		<tbody id="append">

			<?php $i = 1; foreach ($products as $product) { ?>
				<tbody>
					<tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $product->product_id; ?></td>
						<td><?php echo $product->product_name; ?></td>
						<td class="text-center"><?php echo $product->sale_price; ?></td>
						<td class="text-center"><?php echo $product->purchase_price; ?></td>
					</tr>
				</tbody>
			<?php 	$i++; } ?>
		</tbody>
	</table>

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
