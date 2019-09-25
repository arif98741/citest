







<!DOCTYPE html>



<html lang="en">



<head>



  <meta charset="utf-8">



  <title>Invoice ID-<?php echo $invoice_number; ?></title>



  <style type="text/css">



    body{

      background: #eee;

      font-size: 14px;

    }



    .main{

      width: 900px;



      padding-left: 50px;

      padding-right: 50px;

    }



    .header h1{

      margin: 0px;

    }

    .break{

      background: #DBDDE0;

      margin-top:0px;

      height: 7px;

    }

    .address{

    }

    .address h4{

      text-align: center;

      margin: 0px;

      padding: 4px;

    }

    .page_title{

    }

    .page_title h2{

      text-align: center;

    }

    .information{

      width: 100%;

    }

    .information_left{

      width: 50%;

      float: left;

    }



    .information_right{

      width: 50%;

      float: right;

    }

    .products_table{

    }

    .products_table table{

      width: 100%;

      border-collapse: collapse;

      border: 1px solid #000;

    }



    .products_table table tr{

    }



    .products_table table tr th{

      border: 1px solid #000;

    }

    .products_table table tr td{

      border: 1px solid #000;



    }



    .calculation{

      width: 100%;

      overflow: hidden;

    }



    .calculation_left{

      width: 50%;

      float: left;

    }



    .calculation_right{

      width: 50%;

      float: right;

    }



    .footer_singature{

      width: 100%;

      margin-top: 50px;

      overflow: hidden;

    }



    .first_part{

      width: 25%;

      float: left;

    }



    .second_part{

      width: 25%;

      float: left;

      padding-left: 110px;

    }



    .third_part{

      width: 25%;

      float: right;

    }





    .command_section{



      text-align: center;



      margin-top: 20px;

    }



    .command_section span{



    }

    .command_section span input{



      padding: 5px;



      width: 50px;



      height: 30px;



      display: inline-block;

    }







    body,td,th {

     font-family: Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", serif;

   }

 </style>

</head>



<body>



  <div class="main"  style="padding: 10px;

  background: #fff;

  margin-top: 5px;

  /* border: 1px solid #FFE2D3; */

  margin: 0 auto;

  box-shadow: 0 0 2px #ccc; margin:0 auto; border-radius:4px;">



  <table width="100%">

    <tr>

      <td width="9%" height="66" valign="top" class="header"><img src="uploads/logo_1.png" width="64"></td>

      <td align="left" valign="top">  <div style="font-size:28px; font-weight:bold; color:#C00;">Testing Company</div>

        <div style="font-size: 16px; font-weight: bold; color: #039;">Test Address,Location</div></td>

      </tr>

      <tr>

        <td height="25" colspan="2" align="center" bgcolor="#C6C6FF"><div style="font-size:18px; font-weight:bold;">BILL/INVOICE</div></td>

      </tr>

    </table>



            <!-- <div class="address">

            

                <h4 ></h4>

            

              </div> -->






              <div class="information">







               <table width="100%" cellpadding="0">



                <tr>

                  <td colspan="6" nowrap="nowrap">&nbsp;</td>

                </tr>

                <tr>

                  <td width="8%" nowrap="nowrap">Invoice No</td>

                  <td width="1%">:</td>

                  <td width="41%"><strong><?php echo $invoice_number; ?></strong></td>



                  <td width="8%" nowrap="nowrap">Customer ID</td>



                  <td width="1%">:</td>



                  <td width="40%"><strong><?php echo $invoice->customer_id; ?>;</strong></td>

                </tr>



                <tr>

                  <td nowrap="nowrap">Date</td>

                  <td>:</td>

                  <td><strong><?php echo date('d-m-Y',strtotime( $invoice->date)); ?>;</strong></td>



                  <td nowrap="nowrap">Name</td>



                  <td>:</td>



                  <td><strong><?php echo $invoice->customer_name;  ?></strong></td>

                </tr>



                <tr>

                  <td nowrap="nowrap">Time</td>

                  <td>:</td>

                  <td><strong><?php echo date('h:i A',strtotime( $invoice->date)); ?></strong></td>



                  <td nowrap="nowrap">Address</td>



                  <td>:</td>



                  <td><strong>D<?php echo $invoice->address;  ?></strong></td>

                </tr>



                <tr>

                  <td nowrap="nowrap">Sold by</td>

                  <td>:</td>

                  <td><strong>Salesman</strong></td>



                  <td nowrap="nowrap">Contact</td>



                  <td>:</td>



                  <td><strong>01750840217</strong></td>

                </tr>

                <tr>

                  <td colspan="6" nowrap="nowrap">&nbsp;</td>

                </tr>

              </table>



            </div>


            <div class="products_table">

              <table width="100%" cellpadding="0" cellspacing="0">

                <thead>

                  <tr>

                    <th width="11%" bgcolor="#C6C6FF">SERIAL</th>

                    <th width="15%" bgcolor="#C6C6FF">PROUDCT ID</th>

                    <th width="43%" bgcolor="#C6C6FF">PRODUCT NAME</th>

                    <th width="10%" bgcolor="#C6C6FF">QUANTITY</th>

                    <th width="9%" bgcolor="#C6C6FF">PRICE</th>

                    <th width="12%" bgcolor="#C6C6FF">SUBTOTAL</th>

                  </tr>

                </thead>

                <tbody>

                  <?php $i = 1 ; 
                  $total  = 0;
                  foreach ($invoice_products as  $product) { ?>


                    <tr>

                      <td align="center"><?php echo $i; ?></td>

                      <td align="left"><?php echo $product->product_id; ?></td>
                      <td align="left"><?php echo $product->product_name; ?></td>
                      <td align="left"><?php echo $product->quantity; ?></td>

                      <td align="right">250.00</td>

                      <td align="right">1250.00</td>

                    </tr>

                    <?php $total += $product->total; ?>

                  <?php }   ?>

                  <tr>

                    <td align="center">2</td>

                    <td align="left">222</td>

                    <td align="left">Google Addition Something<br>

                      456 12-06-2019
                    </td>

                    <td align="center">6</td>

                    <td align="right">2500.00</td>

                    <td align="right">15000.00</td>

                  </tr>



                </tbody>

              </table>

            </div>



            <div class="calculation">


              <table width="100%" cellpadding="0" cellspacing="0" style="text-align: center;">





                <tr>



                  <td width="791" align="right" nowrap="nowrap"><strong>Sub Total</strong></td>



                  <td width="107" align="right" nowrap="nowrap"><strong>16250</strong></td>




                </tr>



                <tr>



                  <td align="right" nowrap="nowrap">DL.</td>



                  <td align="right" nowrap="nowrap"> 0</td>



                </tr>



                <tr>



                  <td align="right" nowrap="nowrap">VAT(%)</td>



                  <td align="right" nowrap="nowrap"> 0</td>



                </tr>



                <tr>



                  <td align="right" nowrap="nowrap">Discount</td>



                  <td align="right" nowrap="nowrap">0</td>





                </tr>







                <tr>



                  <td align="right" nowrap="nowrap"><strong>PAYABLE</strong></td>



                  <td align="right" nowrap="nowrap"><strong>16250</strong></td>



                </tr>











                <tr>



                  <td align="right" nowrap="nowrap">Paid</td>



                  <td align="right" nowrap="nowrap"> 1000</td>







                </tr>



                <tr>



                  <td align="right" nowrap="nowrap">DUE</td>



                  <td align="right" nowrap="nowrap">15250</td>



                </tr>



                <tr>





                </tr>



              </table>



            </div>







            <table width="100%">

              <tr>

                <td height="57" colspan="6" align="center">&nbsp;</td>

              </tr>

              <tr>

                <td width="7%" align="center">&nbsp;</td>

                <td width="23%" align="center"><hr/>

                  <p>Customer's Signature</p></td>

                  <td width="21%"><p>&nbsp;</p></td>

                  <td width="21%">&nbsp;</td>

                  <td width="22%" align="center"><hr/>

                    <p>For

                      HAPPY PRODUCTS
                    </p></td>

                    <td width="6%" align="center">&nbsp;</td>

                  </tr>

                </table>

                <hr>

                <center>

                  <span style="text-align: center; font-size: 10px;">Developed by: Ariful Islam</span></center>

                  <div class="command_section">



                    <span>



                      <a  href="addinvoice.php" id="backbutton">Sale again</a>



                    </span>



                  </div>







                </div>



                <script>



                  function printFunction() {



                    var printButton = document.getElementById("printbutton");



                    var backButton = document.getElementById('backbutton');



                    backButton.style.visibility = 'hidden';



                    printButton.style.visibility = 'hidden';



                    window.print();



                    printButton.style.visibility = 'visible';



                    backButton.style.visibility = 'visible';



                  }



                </script>





              </body>

              </html>

