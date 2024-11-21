<?php 
$title = "Your Pets Deserve The Best";
$sub_title = "Explore our products for your pet.";
if(isset($_GET['c']) && isset($_GET['s'])){
    $cat_qry = $conn->query("SELECT * FROM categories where md5(id) = '{$_GET['c']}'");
    if($cat_qry->num_rows > 0){
        $title = $cat_qry->fetch_assoc()['category'];
    }
 $sub_cat_qry = $conn->query("SELECT * FROM sub_categories where md5(id) = '{$_GET['s']}'");
    if($sub_cat_qry->num_rows > 0){
        $sub_title = $sub_cat_qry->fetch_assoc()['sub_category'];
    }
}
elseif(isset($_GET['c'])){
    $cat_qry = $conn->query("SELECT * FROM categories where md5(id) = '{$_GET['c']}'");
    if($cat_qry->num_rows > 0){
        $title = $cat_qry->fetch_assoc()['category'];
    }
}
elseif(isset($_GET['s'])){
    $sub_cat_qry = $conn->query("SELECT * FROM sub_categories where md5(id) = '{$_GET['s']}'");
    if($sub_cat_qry->num_rows > 0){
        $title = $sub_cat_qry->fetch_assoc()['sub_category'];
    }
}
?>
<!--This is for the Header section-->
<header class="bg-dark" id="main-header position-relative">
        <div class="text-center text-white">
            <img class="img-fluid w-100" style="height: 70vh!important; object-fit:cover; object-position: top;" src="<?php echo base_url . $_settings->info('cover'); ?>" alt="">
            <div class="position-absolute top-50 start-50 translate-middle">
                <h1 class="display-1 text-secondary fw-bolder"><?php echo $title ?></h1>
                <p class="lead fw-normal text-dark mb-0"><?php echo $sub_title ?></p>
            </div>
        </div>
    </header>
<!--End Header Section-->
<section class="py-5">
    <div class="container-fluid px-4 px-lg-5 mt-5">
    <?php 
                if(isset($_GET['search'])){
                    echo "<h4 class='text-center'><b>Search Result for '".$_GET['search']."'</b></h4>";
                }
            ?>
        
        <div class="row gx-4 gx-lg-5 row-cols-1 row-cols-md-3 row-cols-xl-4 justify-content-center">

            <?php 
                $whereData = "";
                if(isset($_GET['search']))
                    $whereData = " and (product_name LIKE '%{$_GET['search']}%' or description LIKE '%{$_GET['search']}%')";
                elseif(isset($_GET['c']) && isset($_GET['s']))
                    $whereData = " and (md5(category_id) = '{$_GET['c']}' and md5(sub_category_id) = '{$_GET['s']}')";
                elseif(isset($_GET['c']))
                    $whereData = " and md5(category_id) = '{$_GET['c']}' ";
                elseif(isset($_GET['s']))
                    $whereData = " and md5(sub_category_id) = '{$_GET['s']}' ";
                $products = $conn->query("SELECT * FROM `products` where status = 1 {$whereData} order by rand() ");
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
                    $inv = array();
                    while($ir = $inventory->fetch_assoc()){
                        $inv[$ir['size']] = number_format($ir['price']);
                    }
            ?>
            <div class="row mb-5 px-3">
                <div class="card col-md-12 p-0 product-item">
                    <!-- Product image-->
                    <img class="card-img-top img-fluid" src="<?php echo validate_image($img) ?>" loading="lazy" alt="..." />
                    <!-- Product details-->
                    <div class="card-body text-start">
                        <!-- <div class="text-center"> -->
                            <!-- Product name-->
                            <h6 class="fw-bold">Product :<?php echo $row['product_name'] ?></h6>
                            <!-- Product price-->
                            <?php foreach($inv as $k=> $v): ?>
                                <p class="mb-1"><b> size :<?php echo $k ?>: </b>₹<?php echo $v ?></s>
                            <?php endforeach; ?>
                        <!-- </div> -->
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer text-center bg-transparent border-top-0">
                        <div class="text-center">
                            <a class="btn btn-secondary w-100"href=".?p=view_product&id=<?php echo md5($row['id']) ?>">View Product</a>
                        </div>

                        <div class="">
                            <a href=".?p=view_product&id=<?php echo md5(string : $row['id'])?>">View Product</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
            <?php 
                if($products->num_rows <= 0){
                    echo "<h4 class='text-center'><b>No Product Listed.</b></h4>";
                }
            ?>
        </div>
    </div>
</section>