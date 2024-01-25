<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Invoice</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@5.15.2/css/all.min.css">
    <style>
        /* Add your custom styles here */
    </style>
    <style type="text/css">
        body {
            font-family: arial;
            font-size: 12px;
            /*font-weight: bold;*/
            padding-top: 15px;
        }

        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
</head>

<body onload="window.print();"><!--   -->

    <table width="98%" align="center">
        <tr>
            <td align="center">
                <span>
                    <strong>Khush Fashion Palace</strong><br>
                    AP: Ankali<br>
                    Belgaum -591201 <br>
                    GST Number: GSTIN123456780<br> VAT Number: VAT123<br> Phone: 9999999999,8888888888<br>
                </span>
            </td>
        </tr>
        <tr>
            <td align="center"><strong>-----------------Invoice-----------------</strong></td>
        </tr>
        <tr>
            <td>
                <table width="100%">
                    <tr>
                        <td width="40%">Invoice</td>
                        <td><b>#SL0041</b></td>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td>Chris Moris</td>
                    </tr>
                    <tr>
                        <td>Mobile</td>
                        <td>845457454545</td>
                    </tr>
                    <tr>
                        <td>Seller</td>
                        <td>Admin</td>
                    </tr>
                    <tr>
                        <td>Date:14-01-2024</td>
                        <td style="text-align: right;">Time:01:43 pm</td>
                    </tr>
                </table>

            </td>
        </tr>
        <tr>
            <td>

                <table width="100%" cellpadding="0" cellspacing="0">
                    <thead>
                        <tr style="border-top-style: dashed;border-bottom-style: dashed;border-width: 0.1px;">
                            <th style="font-size: 11px; text-align: left;padding-left: 2px; padding-right: 2px;">#</th>
                            <th style="font-size: 11px; text-align: left;padding-left: 2px; padding-right: 2px;">
                                Description</th>
                            <th style="font-size: 11px; text-align: left;padding-left: 2px; padding-right: 2px;">Price
                            </th>
                            <th style="font-size: 11px; text-align: center;padding-left: 2px; padding-right: 2px;">
                                Quantity</th>
                            <th style="font-size: 11px; text-align: right;padding-left: 2px; padding-right: 2px;">
                                Discount</th>
                            <th style="font-size: 11px; text-align: right;padding-left: 2px; padding-right: 2px;">Total
                            </th>
                        </tr>
                    </thead>
                    <tbody style="border-bottom-style: dashed;border-width: 0.1px;">
                        <tr>
                            <td style='padding-left: 2px; padding-right: 2px;' valign='top'>1</td>
                            <td style='padding-left: 2px; padding-right: 2px;'>Lee Jacket</td>
                            <td style='padding-left: 2px; padding-right: 2px;'>1100.00</td>
                            <td style='text-align: center;padding-left: 2px; padding-right: 2px;'>1.00</td>
                            <td style='text-align: right;padding-left: 2px; padding-right: 2px;'>0.00</td>
                            <td style='text-align: right;padding-left: 2px; padding-right: 2px;'>1100.00</td>
                        </tr>
                        <tr>
                            <td style='padding-left: 2px; padding-right: 2px;' valign='top'>2</td>
                            <td style='padding-left: 2px; padding-right: 2px;'>Armany jacket</td>
                            <td style='padding-left: 2px; padding-right: 2px;'>2750.00</td>
                            <td style='text-align: center;padding-left: 2px; padding-right: 2px;'>1.00</td>
                            <td style='text-align: right;padding-left: 2px; padding-right: 2px;'>0.00</td>
                            <td style='text-align: right;padding-left: 2px; padding-right: 2px;'>2750.00</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <!-- <tr><td colspan="5"><hr></td></tr>    -->
                        <tr>
                            <td style=" padding-left: 2px; padding-right: 2px;" colspan="5" align="right">

                                Before Tax
                            </td>
                            <td style=" padding-left: 2px; padding-right: 2px;" align="right">3619.05</td>
                        </tr>
                        <tr class="block">
                            <td style=" padding-left: 2px; padding-right: 2px;" colspan="5" align="right">Tax Amount
                            </td>
                            <td style=" padding-left: 2px; padding-right: 2px;" align="right">230.95</td>
                        </tr>
                        <!-- <tr >
      <td style=" padding-left: 2px; padding-right: 2px;" colspan="4" align="right">Subtotal</td>
      <td style=" padding-left: 2px; padding-right: 2px;" align="right">3850.00</td>
     </tr> -->
                        <!-- <tr>
 <td style=' padding-left: 2px; padding-right: 2px;' colspan='4' align='right'>Tax Amt</td>
 <td style=' padding-left: 2px; padding-right: 2px;' align='right'>230.95</td>
 </tr> -->
                        <tr>
                            <td style=" padding-left: 2px; padding-right: 2px;" colspan="5" align="right">Other
                                Charges</td>
                            <td style=" padding-left: 2px; padding-right: 2px;" align="right">0.00</td>
                        </tr>


                        <!-- <tr><td style="border-bottom-style: dashed;border-width: 0.1px;" colspan="5"></td></tr>   -->
                        <tr>
                            <td style=" padding-left: 2px; padding-right: 2px;font-weight: bold;" colspan="5"
                                align="right">Total</td>
                            <td style=" padding-left: 2px; padding-right: 2px;font-weight: bold;" align="right">3850.00
                            </td>
                        </tr>

                        <tr>
                            <td style=" padding-left: 2px; padding-right: 2px;font-weight: bold;" colspan="5"
                                align="right">Total Discount</td>
                            <td style=" padding-left: 2px; padding-right: 2px;font-weight: bold;" align="right">0.00
                            </td>
                        </tr>

                        <!-- change_return_status -->
                        <tr>
                            <td style=" padding-left: 2px; padding-right: 2px;" colspan="5" align="right">Paid
                                Payment</td>
                            <td style=" padding-left: 2px; padding-right: 2px;" align="right">3850.00</td>
                        </tr>
                        <tr>
                            <td style=" padding-left: 2px; padding-right: 2px;" colspan="5" align="right">Change
                                Return</td>
                            <td style=" padding-left: 2px; padding-right: 2px;" align="right">0.00</td>
                        </tr>


                        <tr>
                            <td style=" padding-left: 2px; padding-right: 2px;" colspan="5" align="right">Previous
                                Due</td>
                            <td style=" padding-left: 2px; padding-right: 2px;" align="right">0.00</td>
                        </tr>

                        <tr>
                            <td style=" padding-left: 2px; padding-right: 2px;" colspan="5" align="right">Customer
                                Due</td>
                            <td style=" padding-left: 2px; padding-right: 2px;" align="right">0.00</td>
                        </tr>


                        <tr>
                            <td colspan="6" style="text-align: center;">
                                <b> This is footer text. You can set it from Site Settings.</b>
                            </td>
                        </tr>


                        <tr>
                            <td colspan="6" align="center">

                                <div style="display:inline-block;vertical-align:middle;line-height:16px !important;">

                                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAJEAAACRCAIAAABMus10AAAABnRSTlMA/wD/AP83WBt9AAAACXBIWXMAAA7EAAAOxAGVKw4bAAACfElEQVR4nO3dy27iMABA0WHU//9luqzEwpJl53HCPdsWCL2ycIOdvN7v979Q/l99AJlWM0/NPDXz1MxTM0/NPDXz1MxTM0/NPDXz1MxTM0/NPDXz1MxTM0/NPD8rD369XruOY2y8aOXjMD5+eXyQU7+80coynMaZp2aemnlq5lmag3zYuLx1PBdYmSlMHeRp72hK48xTM0/NPDXz7JyDfJj61D1ue874TMfU697kHTXOPDXz1MxTM8+Bc5DjTH2BsjLpuKfGmadmnpp5auYh5yBT04qN50FuonHmqZmnZp6aeQ6cg9zk433jQoybvKPGmadmnpp5aubZOQc5bVPJ2Mo2mfFT3UTjzFMzT808NfO8bvK//ZTnndqY0jjz1MxTM0/NPAdeH2RlIcbGi3qctvNl42GMNc48NfPUzFMzz87zIFfNMsaPnbLyFk47pdI489TMUzNPzTznXR9k4+6Vle9iNp6tuGqi1Djz1MxTM0/NPJfti1n5puae1wc57bLvjTNPzTw189TMc+C12lfOOEydBxF/uqJx5qmZp2aemnmesC/muFUbG5eotib1q9XMUzNPzTwPvG/uymNXvgM67a/ROPPUzFMzT8085H1zp6YVG6cGp012xhpnnpp5auapmef5982deqGNx9ya1Pypmadmnpp5nn/PuilXLTOd0jjz1MxTM0/NPOQcZONVPDZuAt742LHGmadmnpp5auYh75u78nm+cWpw1ZaixpmnZp6aeWrmecJ9c4/bNTN+qqlnbm/uV6uZp2aemnnI64N8ucaZp2aemnlq5qmZp2aemnlq5qmZp2aemnlq5qmZp2aemnlq5qmZp2aemnl+AbMYBjaWkjGNAAAAAElFTkSuQmCC"
                                        alt="QR Code" />
                                </div>

                            </td>
                        </tr>

                    </tfoot>
                </table>
            </td>
        </tr>
    </table>
    <center>
        {{-- <div class="row no-print">
  <div class="col-md-12">
  <div class="col-md-2 col-md-offset-5 col-xs-4 col-xs-offset-4 form-group">
    <button type="button" id="" class="btn btn-block btn-success btn-xs" onclick="window.print();" title="Print">Print</button>
       </div>
   </div>
   </div> --}}

    </center>
</body>

</html>
