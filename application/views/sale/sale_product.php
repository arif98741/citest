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

                <tbody id="calculation" class="text-right">
                    <tr id="grand total">
                        <td colspan="7">Grand Total</td>
                        <td><input type="text" name="invoice_grand_total" id="invoice_grand_total" value="0" class="form-control text-right"></td>
                    </tr>

                    <tr id="grand total">
                        <td colspan="7">Discount</td>
                        <td><input type="text" id="invoice_discount" value="0" class="form-control text-right"></td>
                    </tr>

                    <tr id="grand total">
                        <td colspan="7">Tax</td>
                        <td><input type="text" name="invoice_tax" id="invoice_tax" value="0" class="form-control text-right"></td>
                    </tr>

                    <tr id="grand total">
                        <td colspan="7">Paid </td>
                        <td><input type="text" name="invoice_paid" id="invoice_paid" value="0" class="form-control text-right"></td>
                    </tr>

                    <tr id="grand total">
                        <td colspan="7">Due </td>
                        <td><input type="text" name="invoice_due" id="invoice_due" value="0" class="form-control text-right"></td>
                    </tr>

                    <tr id="grand total">
                        <td colspan="7">Invoice Total </td>
                        <td><input type="text" name="invoice_total" id="invoice_total" class="form-control text-right"></td>
                    </tr>

                    
                    
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
            +'<td><input name="total[]" class="total total'+i+'" style="text-align:right;" class="form control input-full" type="number" readonly></td>'
            
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
                total_grand_total();
                calculation();
            });

            // quantity action
            $('.quantity').keyup(function(event) {
                var rowid = $(this).attr('rowid');
                var quantity = $(this).val();
                var sale_price = $('.sale_row'+rowid).val();
                $('.total'+rowid).val((sale_price * quantity).toFixed(2));
                $('#invoice_grand_total').val(total_grand_total());
                calculation();
            });

             // quantity action
             $('.discount').keyup(function(event) {
                var discount = $(this).val();
                var rowid = $(this).attr('rowid');
                var total = $('.total'+rowid).val();
                var now = total - discount;
                $('.total'+rowid).val(now.toFixed(2));
                $('#invoice_grand_total').val(total_grand_total());
                calculation();
            });

             // quantity action
             $('#invoice_discount').keyup(function(event) {
                console.log('yes');
                var invoice_discount = $(this).val();
                var invoice_grand_total = $('#invoice_grand_total').val();
                $('#invoice_grand_total').val(total_grand_total());
                calculation();
            });

              // quantity action
              $('#invoice_paid').keyup(function(event) {
                calculation();
            });

               //paid
               $('#invoice_paid').keyup(function(event) {
                calculation();
            });

            // tax
            $('.invoice_tax').keyup(function(event) {
                calculation();
            });

            

            $('#invoice_grand_total').val(total_grand_total());

        }, error: function (error_data) {
               // console.log(error_data);
           }
       });


   });

    //discount
    function total_grand_total()
    {
        var value = 0;
        $('tr .total').each(function() { // iterate over inputs
            value += Number($(this).val()) 
        });
        return value;
    }

    function total_discount()
    {
        var value = 0;
        $('tr .discount').each(function() { // iterate over inputs
            value += Number($(this).val()) 
        });
        return value;
    }

    

    function calculation()
    {
        var invoice_grand_total = $('#invoice_grand_total').val();
        var invoice_discount = $('#invoice_discount').val();
        var invoice_tax = $('#invoice_tax').val();
        var invoice_paid = $('#invoice_paid').val();
        var invoice_total = $('#invoice_total').val();
        var grand_tax = invoice_grand_total + invoice_tax;
        var due_discount = invoice_due - invoice_discount;
        var now = grand_tax - due_discount;
        var due = now  - invoice_paid;
        $('#invoice_total').val(now) ;  
        $('#invoice_due').val(due) ;  

    }
    
</script>