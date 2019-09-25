<div class="container mt 4">
	<h2 class="text-left" style="margin-top: 10px;">
		Invoice List
	</h2>

	
	<form action="<?php echo base_url(); ?>/product/save_product" method="post">
		<table class="table table-bordered ">
			<thead>
				<th>Serial</th>
				<th>Invoice Number</th>
				<th>Quantity</th>
				<th>Invoice Total</th>
				<th>Invoice Paid</th>
				<th>Customer ID</th>
				<th>Contact Name</th>
				<th>--</th>
			</thead>

			<tbody id="append">

				<?php $i = 1; foreach ($invoices as $invoice) { ?>
					<tbody>
						<tr>
							<td><?php echo $i; ?></td>
							<td><?php echo $invoice->invoice_number; ?></td>
							<td><?php echo $invoice->quantity; ?></td>
							<td><?php echo $invoice->invoice_total; ?></td>
							<td><?php echo $invoice->invoice_paid; ?></td>
							<td><?php echo $invoice->customer_id; ?></td>
							<td><?php echo $invoice->customer_name; ?></td>
							<td><a href="<?php echo base_url(); ?>sale/view_invoice/<?php echo $invoice->invoice_number; ?>" class="btn btn-primary"><i class="fa fa-eye"></i></a></td>
						</tr>
					</tbody>
					<?php 	$i++; } ?>
				</tbody>
			</table>

		</div>
