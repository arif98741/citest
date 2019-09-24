<div class="container mt 4">
	<h2 class="text-left" style="margin-top: 10px;">
		Add Product
	</h2>

	<a href="#" id="addbtn" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a>
	
	<br><br>
	<form action="<?php echo base_url(); ?>/product/save_product" method="post">
		<table class="table table-bordered ">
			<thead>
				<th>Serial</th>
				<th>Customer Name</th>
				<th>Customer ID</th>
				<th>Contact No</th>
				<th>Email</th>
				<th>Address</th>
				<th>Discount</th>
			</thead>

			<tbody id="append">

			<?php $i = 1; foreach ($customers as $customer) { ?>
				<tbody>
					<tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $customer->customer_id; ?></td>
						<td><?php echo $customer->customer_name; ?></td>
						<td><?php echo $customer->contact_no; ?></td>
						<td><?php echo $customer->email; ?></td>
						<td ><?php echo $customer->address; ?></td>
						<td><?php echo $customer->discount; ?></td>
					</tr>
				</tbody>
			<?php 	$i++; } ?>
		</tbody>
		</table>

</div>
