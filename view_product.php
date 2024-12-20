<?php 
 $products = $conn->query("SELECT * FROM `products`  where md5(id) = '{$_GET['id']}' ");
 if($products->num_rows > 0){
     foreach($products->fetch_assoc() as $k => $v){
         $$k= $v;
     }
    $upload_path = base_app.'/uploads/product_'.$id;
    $img = "";
    if(is_dir($upload_path)){
        $fileO = scandir($upload_path);
        if(isset($fileO[2]))
            $img = "uploads/product_".$id."/".$fileO[2];
        // var_dump($fileO);
    }
    $inventory = $conn->query("SELECT * FROM inventory where product_id = ".$id);
    $inv = array();
    while($ir = $inventory->fetch_assoc()){
        $inv[] = $ir;
    }
 }
?>
<section class="py-5 h-100 ">
    <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center">
            <!-- This is for the carousel -->
            <div class="col-md-6">
                <div class="main-carousel">
                    <?php foreach ($fileO as $k => $img):
                        if (in_array($img, array('.', '..'))) continue; ?>
                        <div>
                            <img class="card-img-top" src="<?php echo validate_image('uploads/product_' . $id . '/' . $img) ?>" alt="Image <?php echo $k; ?>" />
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="thumbnail-carousel mt-2">
                    <?php foreach ($fileO as $k => $img):
                        if (in_array($img, array('.', '..'))) continue; ?>
                        <div>
                            <img class="view-image img-thumbnail <?php echo $k == 2 ? 'active' : ''; ?>" 
                                src="<?php echo validate_image('uploads/product_' . $id . '/' . $img) ?>" 
                                alt="Thumbnail <?php echo $k; ?>" />
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="col-md-6 overflow-scroll-y">
                <!-- <div class="small mb-1">SKU: BST-498</div> -->
                <h1 class="display-5 fw-bolder"><?php echo $product_name ?></h1>
                <div class="fs-5 mb-5">
                ₹ <span id="price"><?php echo $inv[0]['price'] ?></span>
                <br>
                <span><small><b>Available stock:</b> <span id="avail"><?php echo $inv[0]['quantity'] ?></span></small></span>
                </div>
                <div class="fs-5 mb-5 d-flex justify-content-start">
                    <?php foreach($inv as $k => $v): ?>
                        <span><button class="btn btn-sm btn-flat btn-outline-dark m-2 p-size <?php echo $k == 0 ? "active":'' ?>" data-id="<?php echo $k ?>"><?php echo $v['size'] ?></button></span>
                    <?php endforeach; ?>
                </div>
                <form action="" id="add-cart">
                <div class="d-flex">
                    <input type="hidden" name="price" value="<?php echo $inv[0]['price'] ?>">
                    <input type="hidden" name="inventory_id" value="<?php echo $inv[0]['id'] ?>">
                    <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1" style="max-width: 3rem" name="quantity" />
                    <a href="https://api.whatsapp.com/send?phone=917947117361&text=&app_absent=0" class="btn btn-outline-dark flex-shrink-0" target="_blank" rel="noopener noreferrer">
                        <i class="bi-cart-fill me-1"></i>
                        Buy Now
                    </a>

                </div>
                </form>
                <p class="lead"><?php echo stripslashes(html_entity_decode($description)) ?></p>
            </div>
        </div>
    </div>
</section>
<!-- Related items section-->
<section class="py-5 bg-light">
    <div class="container px-4 px-lg-5 mt-5">
        <h2 class="fw-bolder mb-4">Related products</h2>
        <div class="row gx-4 gx-lg-5 row-cols-1 row-cols-md-3 row-cols-xl-4 justify-content-center">
        <?php 
            $products = $conn->query("SELECT * FROM `products` where status = 1 and (category_id = '{$category_id}' or sub_category_id = '{$sub_category_id}') and id !='{$id}' order by rand() limit 4 ");
            while($row = $products->fetch_assoc()):
                $upload_path = base_app.'/uploads/product_'.$row['id'];
                $img = "";
                if(is_dir($upload_path)){
                    $fileO = scandir($upload_path);
                    if(isset($fileO[2]))
                        $img = "uploads/product_".$row['id']."/".$fileO[2];
                    // var_dump($fileO);
                }
                $inventory = $conn->query("SELECT * FROM inventory where product_id = ".$row['id']);
                $_inv = array();
                while($ir = $inventory->fetch_assoc()){
                    $_inv[$ir['size']] = number_format($ir['price']);
                }
        ?>
            <div class="col mb-5">
                <div class="card  product-item">
                    <!-- Product image-->
                    <img class="card-img-top w-100" src="<?php echo validate_image($img) ?>" alt="..." />
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-start">
                            <!-- Product name-->
                            <h6 class="fw-bolder"><?php echo $row['product_name'] ?></h6>
                            <!-- Product price-->
                            <?php foreach($_inv as $k=> $v): ?>
                                <span><b><?php echo $k ?>: </b>₹<?php echo $v ?></span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center">
                            <a class="btn btn-flat btn-secondary w-100" href=".?p=view_product&id=<?php echo md5($row['id']) ?>">View Product</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>
<script>
    var inv = $.parseJSON('<?php echo json_encode($inv) ?>');
    $(function(){
        $('.view-image').click(function(){
            var _img = $(this).find('img').attr('src');
            $('#display-img').attr('src',_img);
            $('.view-image').removeClass("active")
            $(this).addClass("active")
        })
        $('.p-size').click(function(){
            var k = $(this).attr('data-id');
            $('.p-size').removeClass("active")
            $(this).addClass("active")
            $('#price').text(inv[k].price)
            $('[name="price"]').val(inv[k].price)
            $('#avail').text(inv[k].quantity)
            $('[name="inventory_id"]').val(inv[k].id)

        })

        $('#add-cart').submit(function(e){
            e.preventDefault();
            if('<?php echo $_settings->userdata('id') ?>' <= 0){
                uni_modal("","login.php");
                return false;
            }
            start_loader();
            $.ajax({
                url:'classes/Master.php?f=add_to_cart',
                data:$(this).serialize(),
                method:'POST',
                dataType:"json",
                error:err=>{
                    console.log(err)
                    alert_toast("an error occured",'error')
                    end_loader()
                },
                success:function(resp){
                    if(typeof resp == 'object' && resp.status=='success'){
                        alert_toast("Product added to cart.",'success')
                        $('#cart-count').text(resp.cart_count)
                    }else{
                        console.log(resp)
                        alert_toast("an error occured",'error')
                    }
                    end_loader();
                }
            })
        })
    })
</script>