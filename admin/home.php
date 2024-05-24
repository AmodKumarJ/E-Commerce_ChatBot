<?php
    session_start();

    if(empty($_SESSION['is_admin_login'])){
        echo "<script>location.href='index.php';</script>";
    }

    require_once '../include/connection.php';
    require_once './assets/pages/admin-link.php';
    require_once './assets/pages/admin-header.php';
?>
    
        <div id="layoutSidenav">
            <?php
                require_once './assets/pages/admin-sidebar.php';
            ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid p-4">
                        <h2>Dashboard</h1>
                        <div class="row mt-4">
                            <div class="col-lg-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Product</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="product.php" style="text-decoration: none;">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Users</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="user.php" style="text-decoration: none;">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Orders</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="order.php" style="text-decoration: none;">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Payments</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="payment.php" style="text-decoration: none;">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row my-4">
                            <div class="col-xl-6 col-md-6 p-1">
                                <div class="card p-2">
                                    <h6 class="my-2">Recent Products</h6>
                                    <table class="table table-borderless table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Image</th>
                                                <th>Product</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $resd6 = mysqli_query($conn, "SELECT * FROM product_master ORDER BY product_id DESC LIMIT 5");
                                            if (mysqli_num_rows($resd6) > 0) {
            
                                                $count = 1;
                                                while($rowd6 = mysqli_fetch_assoc($resd6)) {
                                                    
                                                    echo "<tr>"; 
                                                    echo "<th>".$count."</th>"; 
                                                    echo "<td><img src='assets/images/products/".$rowd6['product_image']."' class='mr-2' width='70' height='50'></td>";
                                                    echo "<td>".$rowd6['product_name']."</td>";
                                                    echo "<td>".date_format(date_create($rowd6['product_date_create']), 'd M, Y') . "</td>"; 
                                                    echo "</tr>"; 
                                                    $count++;
                                                }
                                            }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6 p-1">
                                <div class="card p-2">
                                    <h6 class="my-2">Recent payments</h6>
                                    <table class="table table-borderless table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Transaction Id</th>
                                                <th>Customer Name</th>
                                                <th>Status</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $resd7 = mysqli_query($conn, "SELECT * FROM payment_master ORDER BY payment_id DESC LIMIT 5");
                                            if (mysqli_num_rows($resd7) > 0) {
                                                $count = 1;
                                                while($rowd7 = mysqli_fetch_assoc($resd7)) {
                                                    
                                                    echo "<tr>"; 
                                                    echo "<th>".$count."</th>";  
                                                    echo "<td>".$rowd7['transaction_id']."</td>";
                                                    echo "<td>".$rowd7['card_holder_name']."</td>";
                                                    echo "<td>".$rowd7['payment_status']."</td>";
                                                    echo "<td>".date_format(date_create($rowd7['date_of_payment']), 'd M, Y h.i A') . "</td>"; 
                                                    echo "</tr>"; 

                                                    $count++;
                                                }
                                            }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    
<?php

    require_once './assets/pages/admin-footer.php';
?>
