<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<!--[if IE 7]><html class="ie ie7"><![endif]-->
<!--[if IE 8]><html class="ie ie8"><![endif]-->
<!--[if IE 9]><html class="ie ie9"><![endif]-->
<html lang="en">

<head>
   
    <!-- ================================================== head ================================================= -->
    <?php $this->load->view('includes/achead'); ?>

    <!--HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!--WARNING: Respond.js doesn't work if you view the page via file://-->
    <!--[if lt IE 9]><script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script><script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script><![endif]-->
    <style type="text/css">
        .attrcls{
            margin: 0 5px 0 0; 
        }
        .colored{
            width: 18px;
            height: 18px;
            margin:auto;
            display:inline-block;
            border: 1px solid #e6e6e6;
            vertical-align: middle;
            border-radius: 18px; 
        }
        .otherVal{
            width: 18px;
            height: 18px;
            border: 1px solid #e6e6e6;
            margin:auto;
            padding: 2px;
        }    
    </style>
</head>
<!--[if IE 7]><body class="ie7 lt-ie8 lt-ie9 lt-ie10"><![endif]-->
<!--[if IE 8]><body class="ie8 lt-ie9 lt-ie10"><![endif]-->
<!--[if IE 9]><body class="ie9 lt-ie10"><![endif]-->

<body class="ps-loading">
    <?php $this->load->view('includes/account_header'); ?>
    <!--include ../partials/module/subscribe-popup-->
    <div class="ps-template-3">
        <div class="ps-hero mb-20">
            <div class="container">
                <h3>Orders</h3>
            </div>
        </div>
        <div class="ps-content"> 
            <div class="table-responsive">
                <table class="table ps-order-table">
                    <thead>
                        <tr>
                            <th>Code</th>
                            <th>Cart Total</th>
                            <th>Del. Charge</th>
                            <th>Discount</th>
                            <th>Order Total</th>
                            <th>Paid Total</th>
                            <th>Balance</th>
                            <th>Pay. Method</th>
                            <th>Pay. Status</th>
                            <th>Order Status</th>
                            <th>Date</th>
                            <th>Pay</th>
                            <th>View</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $pay = array('2'=>'Success' , '0'=>'Pending' , '-1'=>'Canceled' , '-2'=>'Failed' , '-3'=>'Chargedback');
                        foreach ($orders as $row) {
                            $paymethod = 'Total paid';
                            $payment = 'Paid';
                            $payment_status = $row->payment_status;
                            $color = 'dangerr';
                            if ($row->payment_method==2) {
                                $paymethod = 'COD';
                            }
                            if ($payment_status==2) {$color = 'successs';}else if($payment_status==0){$color = 'warningg';}
                            $cart_total = floatval($row->cart_total);
                            $del_charge = floatval($row->del_charge);
                            $discount = floatval($row->discount);
                            $paid_total = floatval($row->paid_total);
                            $order_total = ($cart_total+$del_charge)-$discount;
                            $balance = $order_total-$paid_total;
                            if (0<$balance) {
                                $payment = '<a href="javascript:payorder('.$row->order_id.');" class="paybtn" title="Pay Balance"><i class="fa fa-credit-card"></i></a>';
                            }
                        ?>
                         <pre><?php print_r($orders); ?></pre>
                        <tr class="mainRow<?=$row->order_id?> <?=$color?>">
                            <td><?=$row->order_code?></td>
                            <td><?=number_format($cart_total,2)?></td>
                            <td><?=number_format($del_charge,2)?></td>
                            <td><?=number_format($discount,2)?></td>
                            <td><?=number_format($order_total,2)?></td>
                            <td><?=number_format($paid_total,2)?></td>
                            <td><?=number_format($balance,2)?></td>
                            <td><?=$paymethod?></td>
                            <td><?=$pay[$row->payment_status]?></td>
                            <td><?=$row->status?></td>
                            <td><?=$row->order_date?></td>
                            <td><?=$payment?></td>
                            <td><span class="clicker" title="View Order" order-id="<?=$row->order_id?>">+</span></td>
                        </tr>
                        <?php } ?>
                        <!-- <tr class="showclass">
                            <td colspan="12">
                                Mohd Waseem, 51/2,Kandy Road, Thihariya, Kalagedihena, Western Province, Sri Lanka, 0775113223
                            </td>
                        </tr>
                        <tr class="showclass">
                            <td><img class="img-rounded" src="http://localhost/hexstyle/photos/products/acb389df057b2c54b2639d8af7d13f5f-sma.jpg" alt="" height="32"></td>
                            <td colspan="4">Libas men ads </td>
                            <td colspan="2">1400.00</td>
                            <td>1</td>
                            <td colspan="2">1400</td>
                            <td colspan="2"><a href="#">View Product</a></td>
                        </tr>
                        <tr class="showclass attrVals">
                            <td colspan="12">
                                <span class="attrcls">Size : <span class="otherVal">XS</span></span>
                                <span class="attrcls">Color : <span class="colored" style="background: #f60303"></span></span>
                            </td>
                        </tr> -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- JS Library-->
    <!-- ======================================================footer script ======================================== -->
    <?php $this->load->view('includes/acfootjs'); ?>
    <script type="text/javascript">


        function view_order(id) {
            $.ajax({
              type: "POST",
              url: "<?=base_url()?>view_order",
              data: 'order_id='+id,
              success: function(result) {
                var responsedata = $.parseJSON(result);
                if (responsedata.status=='error') {
                    toastr["error"](responsedata.message)
                }else{
                    var tbody = '';
                    if (responsedata.address) {
                        tbody +='<tr class="showclass"><td colspan="13">'+responsedata.address['fname']+' '+responsedata.address['lname']+' '+responsedata.address['address']+' '+responsedata.address['city_name']+' '+responsedata.address['region_name']+' '+responsedata.address['nicename']+' '+responsedata.address['phone']+' '+responsedata.address['order_email']+'</td><tr>';
                    }
                    if (responsedata.products) {
                        var img = 'default.jpg';
                        var imgalt = '';
                        for (var i = 0; i < responsedata.products.length; i++) {
                            var link_name = createHtmlName(responsedata.products[i]['name']);
                            var link_cate = createHtmlName(responsedata.products[i]['category']);

                            if (responsedata.products[i]['photo_path']!=null) {
                                img = 'products/'+responsedata.products[i]['photo_path']+'-sma.jpg';
                                imgalt = responsedata.products[i]['photo_title'];
                            }else{
                                imgalt = responsedata.products[i]['name'];
                            }

                            tbody +='<tr class="showclass"><td><img class="img-rounded" src="<?=PHOTO_DOMAIN?>'+img+'" alt="'+imgalt+'" height="32"></td>'+
                                    '<td colspan="5">'+responsedata.products[i]['name']+'</td>'+
                                    '<td colspan="2">'+responsedata.products[i]['billed_unit_price']+'</td>'+
                                    '<td>'+responsedata.products[i]['qty']+'</td>'+
                                    '<td colspan="2">'+responsedata.products[i]['subtotal']+'</td>'+
                                    '<td colspan="2"><a href="<?=base_url()?>product-detail/'+link_cate+'/'+link_name+'/'+responsedata.products[i]['pro_id']+'" target="_blank">View Product</a></td><tr>';
                            if (0<responsedata.products[i]['attributes'].length) {
                                tbody +='<tr class="showclass attrVals"><td colspan="13">';
                                for (var j = 0; j < responsedata.products[i]['attributes'].length; j++) {
                                    if (responsedata.products[i]['attributes'][j]['type']==4||responsedata.products[i]['attributes'][j]['type']==3) {
                                        tbody +='<span class="attrcls">'+responsedata.products[i]['attributes'][j]['attribute']+' : <span class="colored" style="background: '+responsedata.products[i]['attributes'][j]['value']+'"></span></span>';
                                    }else{
                                        tbody +='<span class="attrcls">'+responsedata.products[i]['attributes'][j]['attribute']+' : <span class="otherVal">'+responsedata.products[i]['attributes'][j]['value']+'</span></span>';
                                    }
                                }
                                tbody +='</td></tr>';
                            }
                        }
                        $('.mainRow'+id).after(tbody);
                        $( ".showclass" ).show( "slow" );
                    }
                }
              },
              error: function(result) {
                toastr["error"]('Somthing went wrong :(');
              }
            });
        }

        function payorder(id) {
            toastr["info"]("<button type='button' id='confirmBtn' class='btn btn-default btn-sm' style='width:40%;display:inline;margin:3px;'>Yes</button><button type='button' id='closeBtn' class='btn btn-default btn-sm' style='width:40%;display:inline;margin:3px;'>No</button>",'would you like to pay the balance?',{
                closeButton: true,
                allowHtml: true,
                onShown: function (toast) {
                  $("#confirmBtn").click(function(){
                    $.ajax({
                        type: "POST",
                        url: "<?=base_url()?>pay-order",
                        data: 'order_id='+id,
                        success: function(result) {
                            var responsedata = $.parseJSON(result);
                            if(responsedata.status=='error'){
                                toastr["error"](responsedata.message)
                            }else{
                                sendToMerchant(responsedata);
                            }
                        },
                        error: function(result) {
                            toastr["error"]('Error :'+result)
                        }
                    });
                  });
                  $("#closeBtn").click(function(){
                    toastr.clear()
                  });
                }
            });  
        }

        function sendToMerchant(data) {
            $('<form>', {
                "method": "POST",
                "html": data,
                "action": 'https://www.payhere.lk/pay/checkout'
            }).appendTo(document.body).submit();
        }

        $(".clicker").on('click', function () {
            var id = $(this).attr('order-id');
            if ($(this).hasClass("open")) {
                $(this).removeClass('open');
                $('.showclass').remove();
            }else{
                $(".clicker").removeClass('open');
                $('.showclass').remove();
                $(this).addClass('open');
                view_order(id);
            }
        });

        function createHtmlName(string){
            string = string.toLowerCase();
            string = string.replace(/[^a-zA-Z0-9_-]/g, '-');
            string = string.replace("(", "");
            string = string.replace(")", "");
            string = string.replace("---","-");
            string = string.replace("--","-");
            return string;
        }
    </script>
</body>

</html>