<div class="container">

    <h2 class="text-left" style="margin-top: 10px;">
        Sale Product
    </h2>

    <br>
    <div class="row">
        <div class="col-md-2">
            <button class="btn btn-success" id="add-btn">Add Product</button>
        </div>

        <div class="col-md-3">
            <input type="text" class="form-control">
        </div>

        <div class="col-md-3">
            <select name="customr_id" id="customerdropdown" class="form-control">
                <option value="" disabled="" selected="">---</option>
                <?php foreach($customers as $customer){?>

                    <option value="<?php echo $customer->serial; ?>"><?php echo $customer->customer_name; ?></option>

                <?php }?>
            </select>
        </div>
        <br>
    </div>
    <div class="row">

        <div class="col-md-12">
            <p>Customer Name: <span id="customer_name"></span>| Customer Mobile : <span id="customer_mobile"></span></p>
            <p>Customer Address: <span id="customer_adderss"></span>| Customer Email : <span id="customer_email"></span></p>
        </div>
    </div>


    <form action="printfiles/sale/printinvoice.php" method="post">

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

    </form>

</div>
<script>
    //customer dropdown
    $('#customerdropdown').change(function(event) {
       //console.log($(this).val());
       var id = $(this).val();
       $.ajax({
        url: '<?php echo base_url(); ?>/api/customer'+id,
        type: 'POST',
        dataType: 'json',
        success: function (response) {
            console.log(response);
        }, error: function (error_data) {
               // console.log(error_data);
           }
       });

   });
</script>