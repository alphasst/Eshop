<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4>View Order</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/home') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Orders</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" id="transaction_modal" data-backdrop="static" data-keyboard="false">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="user_name">Order Tracking</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card card-info">
                                            <!-- form start -->
                                            <form class="form-horizontal " id="order_tracking_form" action="<?= base_url('admin/orders/update-order-tracking/'); ?>" method="POST" enctype="multipart/form-data">
                                                <input type="hidden" name="order_id" id="order_id">
                                                <input type="hidden" name="order_item_id" id="order_item_id">
                                                <div class="card-body pad">
                                                    <div class="form-group ">
                                                        <label for="courier_agency">Courier Agency</label>
                                                        <input type="text" class="form-control" name="courier_agency" id="courier_agency" placeholder="Courier Agency" />
                                                    </div>
                                                    <div class="form-group ">
                                                        <label for="tracking_id">Tracking Id</label>
                                                        <input type="text" class="form-control" name="tracking_id" id="tracking_id" placeholder="Tracking Id" />
                                                    </div>
                                                    <div class="form-group ">
                                                        <label for="url">URL</label>
                                                        <input type="text" class="form-control" name="url" id="url" placeholder="URL" />
                                                    </div>
                                                    <div class="form-group">
                                                        <button type="reset" class="btn btn-warning">Reset</button>
                                                        <button type="submit" class="btn btn-success" id="submit_btn">Save</button>
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-center">
                                                    <div class="form-group" id="error_box">
                                                    </div>
                                                </div>
                                                <!-- /.card-body -->
                                            </form>
                                        </div>
                                        <!--/.card-->
                                    </div>
                                    <!--/.col-md-12-->
                                </div>
                                <!-- /.row -->

                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <!-- The time line -->
                    <section class="time-line-box text-center">
                        <div class="swiper-wrapper col-12">
                            <?php
                            $status = json_decode($order_detls[0]['status']);
                            $status_wise_class = [
                                'awaiting' => ['fa fa-xs fa-history', 'bg-red'],
                                'received' => ['fa fa-xs fa-level-down-alt', 'bg-indigo'],
                                'processed' => ['fa fa-xs fa-people-carry ', 'bg-navy'],
                                'shipped' => ['fa fa-xs fa-shipping-fast ', 'bg-yellow'],
                                'delivered' => ['fa fa-xs fa-user-check ', 'bg-success'],
                                'cancelled' => ['fa fa-xs fa-times-circle ', 'bg-red'],
                                'returned' => ['fa fa-xs fa-level-up-alt ', 'bg-orange'],
                            ];
                            foreach ($status as $row) {
                            ?>
                                <div class="swiper-slide">
                                    <div class="max-auto col-md-6 offset-md-3">
                                        <div class="<?= $status_wise_class[$row[0]][1] ?> pt-2 pb-2 rounded"> <span class="fa-lg"><i class="<?= $status_wise_class[$row[0]][0] ?>"></i></span></div>
                                    </div>
                                    <div class="timestamp m-1"><small class="date"><i class="fas fa-clock"></i>&nbsp;<?= strtoupper($row[1]) ?> </small> </div>
                                    <div class="status text-bold"><span> <?= strtoupper($row[0]) ?> </span></div>
                                </div>
                            <?php } ?>

                        </div>
                    </section>
                </div>
                
                <!--/.col-md-12-->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>