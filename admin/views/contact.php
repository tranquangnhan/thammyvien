<div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">

    
                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <h4 class="mt-0 header-title">Contact</h4>
                                    <p class="text-muted font-14 mb-3">
                                    This is contact.
                                    </p>

                                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                                        <thead>
                                        <tr>
                                        <th width="3%">STT</th>
                                        <th width="15%">Tên KH</th>
                                        <th width="10%">SĐT</th>
                                        <th width="20%">Hỗ trợ</th>
                                        <th width="40%">Tin nhắn</th>
                                        <th >ID sản phẩm</th>
                                        <th >Tên SP</th>
                                        
                                        </tr>
                                        </thead>


                                        <tbody>
                                        <?php
                                        require_once "models/product.php"; 
                                        $pro = new Model_product();
                                        $stt = 1;
                                            foreach ($listcontact as $key) {
                                                if($key['subject'] == 2){
                                                    $sub = 'Chăm sóc khách hàng';
                                                }else{
                                                    $sub = 'Sản phẩm mới';
                                                }
                                                $infosp = $pro->showOnePhone($key['idsp']);
                                                echo '<tr>
                                                <td >'.$stt++.'</td>
                                                <td>'.$key['name'].'</td>
                                                <td >'.$key['phone'].'</td>
                                                <td>'.$sub.'</td>
                                                <td >'.$key['messeges'].'</td>
                                                <td >'.$key['idsp'].'</td>
                                                <td >'.$infosp['name'].'</td>
                                                </tr>';
                                            }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->


                        
                    </div> <!-- container-fluid -->

                </div> <!-- content -->


            </div>
    