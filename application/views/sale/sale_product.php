<div class="container">

    <h2 class="text-left" style="margin-top: 10px;">
        Sale Product
    </h2>

    <br>
    <form action="<?php echo base_url(); ?>sale/save_sale" method="post">
        <div class="row">
            <div class="col-md-2">
                <button class="btn btn-success" id="addbtn">Add Product</button>
            </div>

            <div class="col-md-3">
                <select name="product_id" id="productdropdown" class="form-control">
                    <option value="" disabled="" selected="">---</option>
                    <?php foreach($products as $product){?>
                        <option value="<?php echo $product->product_id; ?>"><?php echo $product->product_name; ?></option>

                    <?php }?>
                </select>
            </div>

            <div class="col-md-3">
                <select name="customr_id" id="customerdropdown" class="form-control">
                    <option value="" disabled="" selected="">---</option>
                    <?php foreach($customers as $customer){?>

                        <option value="<?php echo $customer->serial; ?>"><?php echo $customer->customer_name; ?></option>

                    <?php }?>
                </select>
            </div>

            <div class="col-md-3">

                <button type="submit" class="btn btn-primary" id="saveproduct">Save Product</button>
                <button type="reset" class="btn btn-warning" >Reset</button>

                
            </div>
            <br>
        </div>
        <div class="row">

            <div class="col-md-12">
                <p>Customer Name: <span id="customer_name"></span></p>
                <p> Customer Mobile : <span id="customer_mobile"></span></p>
                <p>Customer Address: <span id="customer_adderss"></span></p>
                <p>Customer Email : <span id="customer_email"></span></p>
            </div>
        </div>


        <form action="printfiles/sale/printinvoice.php" method="post">

            <table class="table table-bordered ">
                <thead>
                    <th width="10%">Serial</th>
                    <th width="20%">Product ID</th>
                    <th width="20%">Product Name</th>
                    <th width="10%">Sale Price</th>
                    <th width="10%">Purchase Price</th>
                    <th width="5%">Quantity</th>
                    <th width="5%">Discount</th>
                    <th width="10%">Total</th>
                    <th width="5%">Action</th>
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

       $('#append').children().remove();

       var id = $(this).val();
       $.ajax({
        url: '<?php echo base_url(); ?>api/customerapi/get_customer/'+id,
        type: 'POST',
        dataType: 'json',
        success: function (response) {
            //console.log(response.customer_id);
            $('#customer_name').html(response.customer_name);
            $('#customer_id').html(response.customer_id);
            $('#customer_mobile').html(response.contact_no);
            $('#customer_email').html(response.email);
            $('#customer_adderss').html(response.address);
        }, error: function (error_data) {
               // console.log(error_data);
           }
       });

   });

    //customer dropdown
    var i = 1;
    $('#productdropdown').change(function(event) {
       //console.log($(this).val());
       var id = $(this).val();
       var data = '';
       
       $.ajax({
        url: '<?php echo base_url(); ?>api/productapi/get_product/'+id,
        type: 'POST',
        dataType: 'json',
        success: function (response) {

            data += '<tr>'
            +'<td class="text-center">'+i+'</td>'
            +'<td><span>'+response.product_id+'</span> <input name="product_id[]" value="'+response.product_id+'" class="form control input-full" type="hidden"></td>'
            +'<td><span>'+response.product_name+'</span> <input name="product_name[]"  value="'+response.product_name+'" class="form control input-full" type="hidden"></td>'
            +'<td><span>'+response.sale_price+'</span> <input name="sale_price[]" value="'+response.sale_price+'" class="form control input-full sale_row'+i+'" type="hidden"></td>'
            +'<td><span>'+response.purchase_price+'</span> <input name="purchase_prirce[]" class="form control input-full" type="hidden"></td>'
            +'<td><input name="quantity[]" class="quantity quantity'+i+'" rowid="'+i+'" style="text-align:right;" class="form control input-full" type="number"></td>'
            +'<td><input name="discount[]" class="discount discount'+i+'" rowid="'+i+'" style="text-align:right;" class="form control input-full" type="number"></td>'
            +'<td><input name="total[]" class="total'+i+'" style="text-align:right;" class="form control input-full" type="number" readonly></td>'
            
            +'<td id="deleteid'+i+'"><span class="btn btn-danger deletebtn" attr="'+i+'">X</span></td>'
            +'</tr>';
            $('#append').append(data);   


            data = '';
            i++;
            //deletebtn
            $('.deletebtn').click(function(){
                //console.log($(this).attr('attr'););
                var rowid = $(this).attr('attr');
                console.log(rowid); 
                $('#deleteid'+rowid).parent().remove();
            });

            // quantity action
            $('.quantity').keyup(function(event) {
                var rowid = $(this).attr('rowid');
                var quantity = $(this).val();
                var sale_price = $('.sale_row'+rowid).val();
                $('.total'+rowid).val((sale_price * quantity).toFixed(2));
            });


             // quantity action
            $('.discount').keyup(function(event) {
                var discount = $(this).val();
                console.log(discount);
                var rowid = $(this).attr('rowid');
                var total = $('.total'+rowid).val();
                var now = total - discount;
                $('.total'+rowid).val(now.toFixed(2));
            });

        }, error: function (error_data) {
               // console.log(error_data);
           }
       });

    
   });

    
</script>