<nav class="navbar navbar-expand-lg navbar-light bg-black">
    <div class="container-fluid px-4 px-lg-5">
        <button class="navbar-toggler btn btn-sm  bg-transparent border-0 py-2" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <!-- <span class="navbar-toggler-icon "></span> -->
             <i class="bi bi-list text-white fs-1"></i>
        </button>
        <a class="navbar-brand col-md-2 col-5" href="./">
            <img src="<?php echo validate_image($_settings->info('logo')) ?>"  class="img-fluid w-75 d-inline-block align-top " alt="" loading="lazy">
            <?php echo $_settings->info('short_name') ?>
        </a>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item"><a class="nav-link text-capitalize fs-5 text-white fw-semibold" aria-current="page" href="./">Home</a></li>
                <?php 
                $cat_qry = $conn->query("SELECT * FROM categories where status = 1 ");
                while($crow = $cat_qry->fetch_assoc()):
                    $sub_qry = $conn->query("SELECT * FROM sub_categories where status = 1 and parent_id = '{$crow['id']}' ");
                    if($sub_qry->num_rows <= 0):
                ?>
                <li class="nav-item"><a class="nav-link fs-5 text-white fw-semibold" aria-current="page" href="./?p=products&c=<?php echo md5($crow['id']) ?>"><?php echo $crow['category'] ?></a></li>
                <?php else: ?>
                <li class="nav-item dropdown">
                    <a class="nav-link fs-5 text-white fw-semibold text-capitalize dropdown-toggle" id="navbarDropdown<?php echo $crow['id'] ?>" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                        <?php echo $crow['category'] ?>
                    </a>
                    <ul class="dropdown-menu border border-dark pb-0 border-bottom-0 bg-secondary" aria-labelledby="navbarDropdown<?php echo $crow['id'] ?>">
                        <?php while($srow = $sub_qry->fetch_assoc()): ?>
                        <li><a class="dropdown-item px-4 text-capitalize border-bottom border-dark border-1" href="./?p=products&c=<?php echo md5($crow['id']) ?>&s=<?php echo md5($srow['id']) ?>"><?php echo $srow['sub_category'] ?></a></li>
                        <?php endwhile; ?>
                    </ul>
                </li>
                <?php endif; ?>
                <?php endwhile; ?>
                <li class="nav-item"><a class="nav-link fs-5 text-white fw-semibold" href="./?p=about">About</a></li>
            </ul>

            <!-- Search form -->
            <form class="form-inline" id="search-form">
                <div class="input-group gap-1">
                    <input class="form-control py-3 bg-transparent border-secondary rounded text-white fs-6 px-4 form" type="search" placeholder="Search" aria-label="Search" name="search" value="<?php echo isset($_GET['search']) ? $_GET['search'] : "" ?>" aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <button class="btn rounded btn-secondary px-3 btn-sm m-0" type="submit" id="button-addon2"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </form>

            <div class="d-flex d-none align-items-center">
                <?php if(!isset($_SESSION['userdata']['id'])): ?>
                <button class="btn  btn-outline-dark ml-2" id="login-btn" type="button">Login</button>
                <?php else: ?>
                <a class="text-dark mr-2 nav-link" href="./?p=cart">
                    <i class="bi-cart-fill me-1"></i>
                    Cart
                    <span class="badge bg-dark text-white ms-1 rounded-pill" id="cart-count">
                        <?php 
                        if(isset($_SESSION['userdata']['id'])):
                            $count = $conn->query("SELECT SUM(quantity) as items from `cart` where client_id =" . $_settings->userdata('id'))->fetch_assoc()['items'];
                            echo ($count > 0 ? $count : 0);
                        else:
                            echo "0";
                        endif;
                        ?>
                    </span>
                </a>
                <a href="./?p=my_account" class="text-dark nav-link"><b>Hi, <?php echo $_settings->userdata('firstname') ?>!</b></a>
                <a href="logout.php" class="text-dark nav-link"><i class="fa fa-sign-out-alt"></i>Logout</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>

<script>
    $(function(){
        $('#login-btn').click(function(){
            uni_modal("", "login.php")
        });
        
        $('#navbarResponsive').on('show.bs.collapse', function () {
            $('#mainNav').addClass('navbar-shrink')
        });
        
        $('#navbarResponsive').on('hidden.bs.collapse', function () {
            if($('body').offset.top == 0)
                $('#mainNav').removeClass('navbar-shrink')
        });
    });

    $('#search-form').submit(function(e){
        e.preventDefault();
        var sTxt = $('[name="search"]').val();
        if(sTxt != '')
            location.href = './?p=products&search=' + sTxt;
    });
</script>
