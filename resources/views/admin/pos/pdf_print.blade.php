<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Invoice</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@5.15.2/css/all.min.css">
    
  <script type="text/javascript">
  var theme_skin = (typeof (Storage) !== "undefined") ? localStorage.getItem('skin') : 'skin-blue';
  theme_skin = (theme_skin=='' || theme_skin==null) ? 'skin-blue' : theme_skin;
  var sidebar_collapse = (typeof (Storage) !== "undefined") ? localStorage.getItem('collapse') : 'skin-blue';
  </script>
 
<style>
@page {
                margin: 10px 20px 10px 20px;
            }
table, th, td {
    border: 0.5pt solid #0070C0;
    border-collapse: collapse;   

}
th, td {
    /*padding: 5px;*/
    text-align: left;   
    vertical-align:top 
}
body{
  word-wrap: break-word;
  font-family:  'sans-serif','Arial';
  font-size: 11px;
  /*height: 210mm;*/
}
.style_hidden{
  border-style: hidden;
}
.fixed_table{
  table-layout:fixed;
}
.text-center{
  text-align: center;
}
.text-left{
  text-align: left;
}
.text-right{
  text-align: right;
}
.text-bold{
  font-weight: bold;
}
.bg-sky{
  background-color: #E8F3FD;
}
@page { size: A5 margin: 5px; }
body { margin: 5px; }

 #clockwise {
       rotate: 90;
    }

    #counterclockwise {
       rotate: -90;
    }
</style>
</head>
<body onload="window.print()"><!-- window.print(); -->

<caption>
      <center>
        <span style="font-size: 18px;text-transform: uppercase;">
          Invoice        </span>
      </center>
</caption>

<table autosize="1" style="overflow: wrap" id='mytable' align="center" width="100%" height='100%'  cellpadding="0" cellspacing="0"  >
<!-- <table align="center" width="100%" height='100%'   > -->
  
    <thead>

      <tr>
        <th colspan="16">
          <table width="100%" height='100%' class="style_hidden fixed_table">
              <tr>
                <!-- First Half -->
                <td colspan="4">
                  <img src="https://pos.creatantech.com/uploads/company/company_logo.png" width='100%'>
                </td>

                <td colspan="4">
                  <b>Khush Fashion Palace</b><br/>
                  <span style="font-size: 10px;">
                    Mobile:9999999999<br/>
                    Address : AP: Ankali<br/>
                   <!--  India<br/> -->
                    
                    Email: admin@example.com<br> GST Number: GSTIN123456780<br> 
                  </span>
                </td>

                <!-- Second Half -->
                <td colspan="8" rowspan="1">
                  <span>
                    <table style="width: 100%;" class="style_hidden fixed_table">
                    
                        <tr>
                          <td colspan="4">
                            Invoice <br>
                            <span style="font-size: 10px;">
                              <b>SL0040</b>
                            </span>
                          </td>
                          <td colspan="4">
                            Date<br>
                            <span style="font-size: 10px;">
                              <b>14-01-2024</b>
                            </span>
                          </td>
                        </tr>
                        <tr>
                          <td colspan="8">
                            
                              <b>Payment Status : </b>Paid                            
                          </td>
                          
                        </tr>
                        <tr>
                          <td colspan="8">
                            
                              <b>Reference No. : </b>                            
                          </td>
                          
                        </tr>

                        
                        
                        <tr>
                          <td colspan="8">
                            <span>
                                <b>Bank Details</b><br/>
                              </span>
                              <span style="font-size: 10px;">
                                  SBI                                </span>
                          </td>
                        </tr>



                    
                    </table>
                  </span>
                </td>
              </tr>

              <tr>
                <!-- Bottom Half -->
                <td colspan="8">
                  <b>Customer Address</b><br/>
                  <span style="font-size: 10px;">
                      Name: Walk-in customer<br/>
                                                                              <br>
                                                                         <!-- -->
                  </span>
                </td>

                <td colspan="8">
                            <span>
                                <b>Shipping Address</b><br/>
                              </span>
                              <span style="font-size: 10px;">
                              Name: Walk-in customer<br/>
                                                                                                      <br>
                                                                                                 <!-- -->
                          </span>
                          </td>
              </tr>




            
          </table>
      </th>
      </tr>

      <tr>
        <td colspan="16">&nbsp; </td>
      </tr>
      <tr class="bg-sky"><!-- Colspan 10 -->
        <th colspan='2' class="text-center">Sl.No.</th>
        <th colspan='4' class="text-center" >Description of Goods</th>
        <th colspan='2' class="text-center">HSN/SAC</th>
        <th colspan='2' class="text-center">Unit Cost</th>
        <th colspan='1' class="text-center">Qty</th>
                <th colspan='1' class="text-center">Tax</th>
        <th colspan='1' class="text-center">Tax Amt</th>
                <th colspan='1' class="text-center">Disc.</th>
        <!-- <th colspan='2' class="text-center">Rate</th> -->
        <th colspan='2' class="text-center">Amount</th>
      </tr>
  </thead>



<tbody>
  <tr>
    <td colspan='16'>
 <tr><td colspan='2' class='text-center'>1</td><td colspan='4'>Suits</td><td colspan='2' class='text-left'></td><td colspan='2' class='text-right'>1100.00</td><td class='text-center' colspan='1'>1.00</td><td colspan='1' class='text-right'>10.00%</td><td style='text-align: right;'>110.00</td><td style='text-align: right;' colspan='1'>0</td><td colspan='2' class='text-right'>1,210.00</td></tr><tr><td colspan='2' class='text-center'>2</td><td colspan='4'>Rado Watch</td><td colspan='2' class='text-left'></td><td colspan='2' class='text-right'>20768.00</td><td class='text-center' colspan='1'>1.00</td><td colspan='1' class='text-right'>18.00%</td><td style='text-align: right;'>3168.00</td><td style='text-align: right;' colspan='1'>0</td><td colspan='2' class='text-right'>20,768.00</td></tr>      </td>
  </tr>
  </tbody>


<tfoot>
 

  <tr class="bg-sky">
    <td colspan="8" class='text-center text-bold'>Total</td>
    <td colspan="2" class='text-right' ><b>21,868.00</b></td>
    <td colspan="1" class='text-bold text-center'>2.00</td>
        <td colspan="1" class='text-bold text-center'></td>
    <td colspan="1" class='text-right' ><b>3,278.00</b></td>
        <td colspan="1" class='text-right' ><b>0.00</b></td>
    <td colspan="2" class='text-right' ><b>21,978.00</b></td>
  </tr>
  <tr>
    <td colspan="14" class='text-right'><b>Subtotal</b></td>
    <td colspan="2" class='text-right' ><b>21,978.00</b></td>
  </tr>


  <tr>
    <td colspan="14" class='text-right'><b>Other Charges</b></td>
    <td colspan="2" class='text-right' ><b>3.30</b></td>
  </tr>
  
  <tr>
    <td colspan="14" class='text-right'><b>Discount on All(3.00 %)</b></td>
    <td colspan="2" class='text-right' ><b>659.44</b></td>
  </tr>
  
  <tr>
    <td colspan="14" class='text-right'><b>Grand Total</b></td>
    <td colspan="2" class='text-right' ><b>21,321.86</b></td>
  </tr>

  <tr>
    <td colspan="14" class='text-right'><b>Invoice Paid</b></td>
    <td colspan="2" class='text-right' ><b>21,321.86</b></td>
  </tr>
  <tr>
    <td colspan="14" class='text-right'><b>Invoice Due</b></td>
    <td colspan="2" class='text-right' ><b>0.00</b></td>
  </tr>

  <tr>
    <td colspan="14" class='text-right'><b>Previous Due</b></td>
    <td colspan="2" class='text-right' ><b>2,625.00</b></td>
  </tr>

  <tr>
    <td colspan="14" class='text-right'><b>Customer Total Due</b></td>
    <td colspan="2" class='text-right' ><b>2,625.00</b></td>
  </tr>

  <tr>
    <td colspan="16">
<span class='amt-in-word'>Amount in words: <i style='font-weight:bold;'>INR Twenty-One Thousand, Three Hundred and Twenty-One  Eighty-Six </i></span>  
</td>
  </tr>
  <tr>
    <td colspan="16">
    <span class='amt-in-word'>Note: <i style=''>notes</i></span>    
  </td>
    </tr>



      <!-- T&C & Bank Details & signatories-->
      <tr>
        <td colspan="16">
          <table width="100%" class="style_hidden fixed_table">
           
              <tr>
                <td colspan="16">
                  <span>
                    <table style="width: 100%;" class="style_hidden fixed_table">
                    
                        <!-- T&C & Bank Details -->
                        <tr>
                          <td colspan="16">
                            <span><b> Terms & Conditions</b></span><br>
                            <span style='font-size: 8px;'>1)no warranty for damaged or burnt goods.<br />
2) for warranty/repairs/replacement bring invoice copy.<br />
3)interest @24% will be charged if bills are not paid within the due date.<br />
4)we reserve lien on goods till full payment is made.<br />
5)Goods once sold will not be taken back.6)warranty at the sole discretion of the respective service center.<br />
7)cheque bouncing attracts an unconditional fine of Rs. 750.00.<br />
8)we recommend our customer&amp;#039;s to use legal softwares, we don&amp;#039;t support pirated software in any way.</span>
                          </td>
                          <!-- if UPI Exist then only show this Row -->
                        
                         <tr>
                          <td colspan='8' style="height:80px;">
                            <span><b> Customer Signature</b></span>
                          </td>
                          <td colspan='8'>
                            <span><b> Authorised Signatory</b></span><br>
                            
                          </td>
                        </tr>
                     
                    </table>
                  </span>
                </td>
              </tr>
           
          </table>
      </td>
      </tr>
      <!-- T&C & Bank Details & signatories End -->

            <tr>
        <td colspan="16" style="text-align: center;font-size: 8px;">
           This is footer text. You can set it from Site Settings.        </td>
      </tr>
      </tfoot>

</table>
<!-- <caption>
      <center>
        <span style="font-size: 11px;text-transform: uppercase;">
          This is Computer Generated Invoice
        </span>
      </center>
</caption> -->
</body>
</html>
