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
                <h3>Wishlist</h3>
            </div>
        </div>
        
        <div class="table-responsive">
            <table class="table ps-table ps-table--whishlist">
                <thead>
                    <tr>
                        <th></th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>View</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($wishlist as $row) {
                        $link_name = $this->aayusmain->createHtmlName($row->name);
                        $link_cate = $this->aayusmain->createHtmlName($row->category);

                        $pro_view = '<a class="ps-product-link" href="'.base_url().'product-detail/'.$link_cate.'/'.$link_name.'/'.$row->pro_id.'">View Product</a>';
                        $img = 'default.jpg';
                        if ($row->photo_path!=null) {
                            $img = 'products/'.$row->photo_path.'-sma.jpg';
                        }
                        if ($row->status!=0) {
                            $pro_view = 'Disabled';
                        }
                    ?>
                    <tr id="wishlistRow<?=$row->wl_id?>">
                        <td><img src="<?=PHOTO_DOMAIN.$img?>" alt="<?=$row->name?>" height="50"></td>
                        <td><?=$row->name?></td>
                        <td><?=number_format($row->price,2)?></td>
                        <td><?=$pro_view?></td>
                        <td><div class="ps-remove" onclick="removeItem(<?=$row->wl_id?>);"></div></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    </div>
    <!-- JS Library-->
    <!-- ======================================================footer script ======================================== -->
    <?php $this->load->view('includes/acfootjs'); ?>
    <script type="text/javascript">
        function removeItem(id) {
            toastr["warning"]("<button type='button' id='confirmBtn' class='btn btn-danger btn-sm' style='width:40%;display:inline;margin:3px;'>Yes</button><button type='button' id='closeBtn' class='btn btn-default btn-sm' style='width:40%;display:inline;margin:3px;'>No</button>",'Do you want to remove this product?',{
                closeButton: true,
                allowHtml: true,
                onShown: function (toast) {
                  $("#confirmBtn").click(function(){
                    $.ajax({
                      type: "POST",
                      url: "<?=base_url()?>removeWishListItem",
                      data: 'id='+id,
                      success: function(result) {
                          var responsedata = $.parseJSON(result);
                          if (responsedata.status=='success') {
                            toastr.success(responsedata.message)
                            $('#wishlistRow'+id).remove();
                          }else{
                            toastr.error(responsedata.message)
                          }
                      },
                      error: function(result) {
                        toastr.error("Somthing went wrong :(")
                      }
                    });
                  });
                  $("#closeBtn").click(function(){
                    toastr.clear()
                  });
                }
            });
        }
    </script>
</body>

</html>