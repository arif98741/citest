<div class="container mt 4">
	<h2 class="text-left" style="margin-top: 10px;">
		Add Customer
	</h2>

		<form action="<?php echo base_url(); ?>/customer/save_customer" method="post">
	<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="">Customer ID</label>
					<input type="text" name="customer_id" class="form-control">
				</div>

			</div>

			<div class="col-md-6">
				<div class="form-group">
					<label for="">Customer Name</label>
					<input type="text" name="customer_name" class="form-control">
				</div>

			</div>

			<div class="col-md-6">
				<div class="form-group">
					<label for="">Customer Address</label>
					<input type="text" name="customer_address" class="form-control">
				</div>
			</div>


			<div class="col-md-6">
				<div class="form-group">
					<label for="">Contact No</label>
					<input type="text" name="contact_no" class="form-control">
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
					<label for="">Email</label>
					<input type="text" name="email" class="form-control">
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
					<label for="">Discount</label>
					<input type="text" name="discount" class="form-control">
				</div>
			</div>

			<div class="col-md-2">
				<div class="form-group">

					<input type="submit" name="save_customer" value="save_customer" class="form-control btn btn-success ">
				</div>
			</div>


		</div>
	</form>
	
</div>

