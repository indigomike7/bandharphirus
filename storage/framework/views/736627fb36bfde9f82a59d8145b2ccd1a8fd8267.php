<?php $__env->startSection('title','Dashboard'); ?>

<?php $__env->startPush('css_or_js'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-12" style="height: 25px">
                    <label class="badge badge-soft-success float-right">
                        Software Version : 3.0
                    </label>
                </div>

                <div class="col-sm mb-2 mb-sm-0">
                    <h1 class="page-header-title"><?php echo e(trans('messages.Dashboard')); ?></h1>
                </div>

                <div class="col-sm-auto">
                    <a class="btn btn-primary" href="<?php echo e(route('admin.product.list', 'in_house')); ?>">
                        <i class="tio-premium-outlined mr-1"></i> <?php echo e(trans('messages.Products')); ?>

                    </a>
                </div>
            </div>
        </div>
        <!-- End Page Header -->

    <?php
        $array=[];
            for ($i=1;$i<=12;$i++){
                $from = date('Y-'.$i.'-01');
                $to = date('Y-'.$i.'-30');
                $array[$i]=\App\Model\Order::whereBetween('created_at', [$from, $to])->count();
            }
    ?>
    <!-- Stats -->
        <div class="row gx-2 gx-lg-3">
            <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
                <!-- Card -->
                <a class="card card-hover-shadow h-100" href="<?php echo e(route('admin.orders.list',['status'=>'all'])); ?>">
                    <div class="card-body">
                        <h6 class="card-subtitle">Total Orders</h6>

                        <div class="row align-items-center gx-2 mb-1">
                            <div class="col-6">
                                <span class="card-title h2"><?php echo e(\App\Model\Order::all()->count()); ?></span>
                            </div>

                            <div class="col-6">
                                <!-- Chart -->
                                <div class="chartjs-custom" style="height: 3rem;">
                                    <canvas class="js-chart"
                                            data-hs-chartjs-options='{
                                "type": "line",
                                "data": {
                                   "labels": ["Jan","Feb","Mar","April","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],
                                   "datasets": [{
                                    "data": [<?php echo e($array[1]); ?>,<?php echo e($array[2]); ?>,<?php echo e($array[3]); ?>,<?php echo e($array[4]); ?>,<?php echo e($array[5]); ?>,<?php echo e($array[6]); ?>,<?php echo e($array[7]); ?>,<?php echo e($array[8]); ?>,<?php echo e($array[9]); ?>,<?php echo e($array[10]); ?>,<?php echo e($array[11]); ?>,<?php echo e($array[12]); ?>],
                                    "backgroundColor": ["#377dff", "#377dff"],
                                    "borderColor": "#377dff",
                                    "borderWidth": 2,
                                    "pointRadius": 0,
                                    "pointHoverRadius": 0
                                  }]
                                },
                                "options": {
                                   "scales": {
                                     "yAxes": [{
                                       "display": false
                                     }],
                                     "xAxes": [{
                                       "display": false
                                     }]
                                   },
                                  "hover": {
                                    "mode": "nearest",
                                    "intersect": false
                                  },
                                  "tooltips": {
                                    "postfix": "",
                                    "hasIndicator": true,
                                    "intersect": false
                                  }
                                }
                              }'>
                                    </canvas>
                                </div>
                                <!-- End Chart -->
                            </div>
                        </div>
                        <!-- End Row -->

                        <span class="badge badge-soft-success">
                  <i class="tio-trending-up"></i> Jan - Dec
                </span>
                    </div>
                </a>
                <!-- End Card -->
            </div>

            <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
                <!-- Card -->
                <?php
                    $array=[];
                        for ($i=1;$i<=12;$i++){
                            $from = date('Y-'.$i.'-01');
                            $to = date('Y-'.$i.'-30');
                            $array[$i]=\App\Model\Order::where(['order_status'=>'delivered'])->whereBetween('created_at', [$from, $to])->count();
                        }
                ?>
                <a class="card card-hover-shadow h-100" href="<?php echo e(route('admin.orders.list',['status'=>'delivered'])); ?>">
                    <div class="card-body">
                        <h6 class="card-subtitle"><?php echo e(trans('messages.Delivered')); ?></h6>

                        <div class="row align-items-center gx-2 mb-1">
                            <div class="col-6">
                                <span
                                    class="card-title h2"><?php echo e(\App\Model\Order::where(['order_status'=>'delivered'])->count()); ?></span>
                            </div>

                            <div class="col-6">
                                <!-- Chart -->
                                <div class="chartjs-custom" style="height: 3rem;">
                                    <canvas class="js-chart"
                                            data-hs-chartjs-options='{
                                    "type": "line",
                                    "data": {
                                       "labels": ["Jan","Feb","Mar","April","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],
                                       "datasets": [{
                                        "data": [<?php echo e($array[1]); ?>,<?php echo e($array[2]); ?>,<?php echo e($array[3]); ?>,<?php echo e($array[4]); ?>,<?php echo e($array[5]); ?>,<?php echo e($array[6]); ?>,<?php echo e($array[7]); ?>,<?php echo e($array[8]); ?>,<?php echo e($array[9]); ?>,<?php echo e($array[10]); ?>,<?php echo e($array[11]); ?>,<?php echo e($array[12]); ?>],
                                        "backgroundColor": ["#377dff", "#377dff"],
                                        "borderColor": "#377dff",
                                        "borderWidth": 2,
                                        "pointRadius": 0,
                                        "pointHoverRadius": 0
                                      }]
                                    },
                                "options": {
                                   "scales": {
                                     "yAxes": [{
                                       "display": false
                                     }],
                                     "xAxes": [{
                                       "display": false
                                     }]
                                   },
                                  "hover": {
                                    "mode": "nearest",
                                    "intersect": false
                                  },
                                  "tooltips": {
                                    "postfix": "",
                                    "hasIndicator": true,
                                    "intersect": false
                                  }
                                }
                              }'>
                                    </canvas>
                                </div>
                                <!-- End Chart -->
                            </div>
                        </div>
                        <!-- End Row -->

                        <span class="badge badge-soft-success">
                  <i class="tio-trending-up"></i> Jan - Dec
                </span>
                    </div>
                </a>
                <!-- End Card -->
            </div>

            <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
                <!-- Card -->
                <?php
                    $array=[];
                        for ($i=1;$i<=12;$i++){
                            $from = date('Y-'.$i.'-01');
                            $to = date('Y-'.$i.'-30');
                            $array[$i]=\App\Model\Order::where(['order_status'=>'returned'])->whereBetween('created_at', [$from, $to])->count();
                        }
                ?>
                <a class="card card-hover-shadow h-100" href="<?php echo e(route('admin.orders.list',['status'=>'returned'])); ?>">
                    <div class="card-body">
                        <h6 class="card-subtitle"><?php echo e(trans('messages.Returned')); ?></h6>

                        <div class="row align-items-center gx-2 mb-1">
                            <div class="col-6">
                                <span
                                    class="card-title h2"><?php echo e(\App\Model\Order::where(['order_status'=>'returned'])->count()); ?></span>
                            </div>

                            <div class="col-6">
                                <!-- Chart -->
                                <div class="chartjs-custom" style="height: 3rem;">
                                    <canvas class="js-chart"
                                            data-hs-chartjs-options='{
                                  "type": "line",
                                    "data": {
                                       "labels": ["Jan","Feb","Mar","April","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],
                                       "datasets": [{
                                        "data": [<?php echo e($array[1]); ?>,<?php echo e($array[2]); ?>,<?php echo e($array[3]); ?>,<?php echo e($array[4]); ?>,<?php echo e($array[5]); ?>,<?php echo e($array[6]); ?>,<?php echo e($array[7]); ?>,<?php echo e($array[8]); ?>,<?php echo e($array[9]); ?>,<?php echo e($array[10]); ?>,<?php echo e($array[11]); ?>,<?php echo e($array[12]); ?>],
                                        "backgroundColor": ["#377dff", "#377dff"],
                                        "borderColor": "#377dff",
                                        "borderWidth": 2,
                                        "pointRadius": 0,
                                        "pointHoverRadius": 0
                                      }]
                                    },
                                "options": {
                                   "scales": {
                                     "yAxes": [{
                                       "display": false
                                     }],
                                     "xAxes": [{
                                       "display": false
                                     }]
                                   },
                                  "hover": {
                                    "mode": "nearest",
                                    "intersect": false
                                  },
                                  "tooltips": {
                                    "postfix": "",
                                    "hasIndicator": true,
                                    "intersect": false
                                  }
                                }
                              }'>
                                    </canvas>
                                </div>
                                <!-- End Chart -->
                            </div>
                        </div>
                        <!-- End Row -->
                        <span class="badge badge-soft-warning">
                  <i class="tio-trending-down"></i> Jan - Dec
                </span>
                    </div>
                </a>
                <!-- End Card -->
            </div>

            <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
                <!-- Card -->
                <?php
                    $array=[];
                        for ($i=1;$i<=12;$i++){
                            $from = date('Y-'.$i.'-01');
                            $to = date('Y-'.$i.'-30');
                            $array[$i]=\App\Model\Order::where(['order_status'=>'failed'])->whereBetween('created_at', [$from, $to])->count();
                        }
                ?>
                <a class="card card-hover-shadow h-100" href="<?php echo e(route('admin.orders.list',['status'=>'failed'])); ?>">
                    <div class="card-body">
                        <h6 class="card-subtitle"><?php echo e(trans('messages.Failed')); ?></h6>

                        <div class="row align-items-center gx-2 mb-1">
                            <div class="col-6">
                                <span
                                    class="card-title h2"><?php echo e(\App\Model\Order::where(['order_status'=>'failed'])->count()); ?></span>
                            </div>

                            <div class="col-6">
                                <!-- Chart -->
                                <div class="chartjs-custom" style="height: 3rem;">
                                    <canvas class="js-chart"
                                            data-hs-chartjs-options='{
                                    "type": "line",
                                    "data": {
                                       "labels": ["Jan","Feb","Mar","April","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],
                                       "datasets": [{
                                        "data": [<?php echo e($array[1]); ?>,<?php echo e($array[2]); ?>,<?php echo e($array[3]); ?>,<?php echo e($array[4]); ?>,<?php echo e($array[5]); ?>,<?php echo e($array[6]); ?>,<?php echo e($array[7]); ?>,<?php echo e($array[8]); ?>,<?php echo e($array[9]); ?>,<?php echo e($array[10]); ?>,<?php echo e($array[11]); ?>,<?php echo e($array[12]); ?>],
                                        "backgroundColor": ["#377dff", "#377dff"],
                                        "borderColor": "#377dff",
                                        "borderWidth": 2,
                                        "pointRadius": 0,
                                        "pointHoverRadius": 0
                                      }]
                                    },
                                "options": {
                                   "scales": {
                                     "yAxes": [{
                                       "display": false
                                     }],
                                     "xAxes": [{
                                       "display": false
                                     }]
                                   },
                                  "hover": {
                                    "mode": "nearest",
                                    "intersect": false
                                  },
                                  "tooltips": {
                                    "postfix": "",
                                    "hasIndicator": true,
                                    "intersect": false
                                  }
                                }
                              }'>
                                    </canvas>
                                </div>
                                <!-- End Chart -->
                            </div>
                        </div>
                        <!-- End Row -->

                        <span class="badge badge-soft-danger">
                  <i class="tio-trending-down"></i> Jan - Dec
                        </span>
                    </div>
                </a>
                <!-- End Card -->
            </div>
        </div>
        <!-- End Stats -->
        <div class="row gx-2 gx-lg-3">
            <div class="col-lg-12 mb-3 mb-lg-12">
                <!-- Card -->
                <div class="card h-100">
                    <!-- Body -->
                    <?php
                        $array=[];
                            for ($i=1;$i<=12;$i++){
                                $from = date('Y-'.$i.'-01');
                                $to = date('Y-'.$i.'-30');
                                $array[$i]=\App\Model\Order::where(['order_status'=>'delivered'])->whereBetween('created_at', [$from, $to])->sum('order_amount');
                            }
                    ?>
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-sm mb-2 mb-sm-0">
                                <div class="d-flex align-items-center">
                                    <?php ($this_month=\App\Model\Order::where(['order_status'=>'delivered'])->whereBetween('updated_at', [date('Y-m-01'), date('Y-m-30')])->sum('order_amount')); ?>
                                    <?php ($amount=0); ?>
                                    <span
                                        class="h1 mb-0"><?php $__currentLoopData = $array; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php ($amount+=$ar); ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php echo e(\App\CPU\BackEndHelper::usd_to_currency($amount)." ".\App\CPU\BackEndHelper::currency_symbol()); ?></span>
                                    <span class="text-success ml-2">
                                        <?php ($amount=$amount!=0?$amount:0.01); ?>
                                        <i class="tio-trending-up"></i> <?php echo e(round(($this_month/$amount)*100)); ?> %
                                    </span>
                                </div>
                            </div>

                            <div class="col-sm-auto align-self-sm-end">
                                <!-- Legend Indicators -->
                                <div class="row font-size-sm">
                                    <div class="col-auto">
                                        <h5 class="card-header-title">Monthly Earning</h5>
                                    </div>
                                </div>
                                <!-- End Legend Indicators -->
                            </div>
                        </div>
                        <!-- End Row -->

                        <!-- Bar Chart -->
                        <div class="chartjs-custom">
                            <canvas id="updatingData" style="height: 20rem;"
                                    data-hs-chartjs-options='{
                            "type": "bar",
                            "data": {
                              "labels": ["Jan","Feb","Mar","April","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],
                              "datasets": [{
                                "data": [<?php echo e($array[1]); ?>,<?php echo e($array[2]); ?>,<?php echo e($array[3]); ?>,<?php echo e($array[4]); ?>,<?php echo e($array[5]); ?>,<?php echo e($array[6]); ?>,<?php echo e($array[7]); ?>,<?php echo e($array[8]); ?>,<?php echo e($array[9]); ?>,<?php echo e($array[10]); ?>,<?php echo e($array[11]); ?>,<?php echo e($array[12]); ?>],
                                "backgroundColor": "#377dff",
                                "hoverBackgroundColor": "#377dff",
                                "borderColor": "#377dff"
                              },
                              {
                                "data": [<?php echo e($array[1]); ?>,<?php echo e($array[2]); ?>,<?php echo e($array[3]); ?>,<?php echo e($array[4]); ?>,<?php echo e($array[5]); ?>,<?php echo e($array[6]); ?>,<?php echo e($array[7]); ?>,<?php echo e($array[8]); ?>,<?php echo e($array[9]); ?>,<?php echo e($array[10]); ?>,<?php echo e($array[11]); ?>,<?php echo e($array[12]); ?>],
                                "backgroundColor": "#e7eaf3",
                                "borderColor": "#e7eaf3"
                              }]
                            },
                            "options": {
                              "scales": {
                                "yAxes": [{
                                  "gridLines": {
                                    "color": "#e7eaf3",
                                    "drawBorder": false,
                                    "zeroLineColor": "#e7eaf3"
                                  },
                                  "ticks": {
                                    "beginAtZero": true,
                                    "stepSize": <?php echo e($amount>1?20000:1); ?>,
                                    "fontSize": 12,
                                    "fontColor": "#97a4af",
                                    "fontFamily": "Open Sans, sans-serif",
                                    "padding": 10,
                                    "postfix": " <?php echo e(\App\CPU\BackEndHelper::currency_symbol()); ?>"
                                  }
                                }],
                                "xAxes": [{
                                  "gridLines": {
                                    "display": false,
                                    "drawBorder": false
                                  },
                                  "ticks": {
                                    "fontSize": 12,
                                    "fontColor": "#97a4af",
                                    "fontFamily": "Open Sans, sans-serif",
                                    "padding": 5
                                  },
                                  "categoryPercentage": 0.5,
                                  "maxBarThickness": "10"
                                }]
                              },
                              "cornerRadius": 2,
                              "tooltips": {
                                "prefix": " ",
                                "hasIndicator": true,
                                "mode": "index",
                                "intersect": false
                              },
                              "hover": {
                                "mode": "nearest",
                                "intersect": true
                              }
                            }
                          }'></canvas>
                        </div>
                        <!-- End Bar Chart -->
                    </div>
                    <!-- End Body -->
                </div>
                <!-- End Card -->
            </div>
        </div>

        <div class="row gx-2 gx-lg-3 mt-2">
            <div class="col-lg-6 mb-3 mb-lg-0">
                <div class="card">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h4><?php echo e(trans('messages.bestsellings')); ?></h4>
                    </div>
                    <div class="row">
                        <?php $__currentLoopData = $bestSellProduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $bestSell): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($bestSell->product): ?>
                                <div class="col-4 pt-2" style="cursor: pointer">
                                    <a href="<?php echo e(route('product',$bestSell->product->slug)); ?>" target="_blank" style="text-decoration: none;
                                        color: #8f919f;">
                                        <img style="vertical-align: middle;max-height: 100px" width="120"
                                             onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                             src="<?php echo e(\App\CPU\ProductManager::product_image_path('thumbnail')); ?>/<?php echo e($bestSell->product['thumbnail']); ?>"
                                             alt="">
                                        <div class="mt-3">
                                            <p class="p-2"> <?php echo e(strlen($bestSell->product['name']) > 10? substr($bestSell->product['name'], 0, 12).'...':$bestSell->product['name']); ?></p>
                                        </div>
                                    </a>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h4><?php echo e(trans('messages.new_selling')); ?></h4>
                    </div>
                    <div class="row">
                        <?php $__currentLoopData = $newSellingProduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $newSell): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($newSell->product): ?>
                                <div class="col-4 pt-2" style="cursor: pointer">
                                    <a href="<?php echo e(route('product',$newSell->product->slug)); ?>" target="_blank" style="text-decoration: none;
                                        color: #8f919f;">
                                        <img style="vertical-align: middle;max-height: 100px" width="120"
                                             onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                             src="<?php echo e(\App\CPU\ProductManager::product_image_path('thumbnail')); ?>/<?php echo e($newSell->product['thumbnail']); ?>"
                                             alt="">
                                        <div class="mt-3">
                                            <p class="p-2"> <?php echo e(strlen($newSell->product['name']) > 10? substr($newSell->product['name'], 0, 12).'...': $newSell->product['name']); ?></p>
                                        </div>
                                    </a>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
            <div class="row" style="margin-top: 20px">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5><?php echo e(trans('messages.Withdraw Request Table')); ?></h5>
                        </div>
                        <div class="card-body" style="padding: 0">
                            <div class="table-responsive">
                                <table id="datatable"
                                       class="table table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table"
                                       style="width: 100%">
                                    <thead class="thead-light">
                                    <tr>
                                        <th><?php echo e(trans('messages.SL#')); ?></th>
                                        <th><?php echo e(trans('messages.amount')); ?></th>
                                        
                                        <th><?php echo e(trans('messages.request_time')); ?></th>
                                        <th><?php echo e(trans('messages.status')); ?></th>
                                        <th style="width: 5px">Close</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $withdraw_req; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$wr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td scope="row"><?php echo e($k+1); ?></td>
                                            <td><?php echo e(\App\CPU\BackEndHelper::usd_to_currency($wr['amount'])); ?> <?php echo e(\App\CPU\currency_symbol()); ?></td>
                                            
                                            <td><?php echo e($wr->created_at); ?></td>
                                            <td>
                                                <?php if($wr->approved==0): ?>
                                                    <label class="badge badge-primary">Pending</label>
                                                <?php elseif($wr->approved==1): ?>
                                                    <label class="badge badge-success">Approved</label>
                                                <?php else: ?>
                                                    <label class="badge badge-danger">Denied</label>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if($wr->approved==0): ?>
                                                    <a href="<?php echo e(route('admin.sellers.withdraw_view',[$wr['id'],$wr->seller['id']])); ?>"
                                                    class="btn btn-primary btn-sm">
                                                    <?php echo e(trans('messages.View')); ?>

                                                    </a>
                                                <?php else: ?>
                                                    <label>complete</label>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            <?php echo e($withdraw_req->links()); ?>

                        </div>
                    </div>
                </div>
            </div>




        <?php $__env->stopSection(); ?>

        <?php $__env->startPush('script'); ?>
            <script src="<?php echo e(asset('public/assets/back-end')); ?>/vendor/chart.js/dist/Chart.min.js"></script>
            <script src="<?php echo e(asset('public/assets/back-end')); ?>/vendor/chart.js.extensions/chartjs-extensions.js"></script>
            <script
                src="<?php echo e(asset('public/assets/back-end')); ?>/vendor/chartjs-plugin-datalabels/dist/chartjs-plugin-datalabels.min.js"></script>
        <?php $__env->stopPush(); ?>


        <?php $__env->startPush('script_2'); ?>
            <script>
                // INITIALIZATION OF CHARTJS
                // =======================================================
                Chart.plugins.unregister(ChartDataLabels);

                $('.js-chart').each(function () {
                    $.HSCore.components.HSChartJS.init($(this));
                });

                var updatingChart = $.HSCore.components.HSChartJS.init($('#updatingData'));

                // CALL WHEN TAB IS CLICKED
                // =======================================================
                $('[data-toggle="chart-bar"]').click(function (e) {
                    let keyDataset = $(e.currentTarget).attr('data-datasets')

                    if (keyDataset === 'lastWeek') {
                        updatingChart.data.labels = ["Apr 22", "Apr 23", "Apr 24", "Apr 25", "Apr 26", "Apr 27", "Apr 28", "Apr 29", "Apr 30", "Apr 31"];
                        updatingChart.data.datasets = [
                            {
                                "data": [120, 250, 300, 200, 300, 290, 350, 100, 125, 320],
                                "backgroundColor": "#377dff",
                                "hoverBackgroundColor": "#377dff",
                                "borderColor": "#377dff"
                            },
                            {
                                "data": [250, 130, 322, 144, 129, 300, 260, 120, 260, 245, 110],
                                "backgroundColor": "#e7eaf3",
                                "borderColor": "#e7eaf3"
                            }
                        ];
                        updatingChart.update();
                    } else {
                        updatingChart.data.labels = ["May 1", "May 2", "May 3", "May 4", "May 5", "May 6", "May 7", "May 8", "May 9", "May 10"];
                        updatingChart.data.datasets = [
                            {
                                "data": [200, 300, 290, 350, 150, 350, 300, 100, 125, 220],
                                "backgroundColor": "#377dff",
                                "hoverBackgroundColor": "#377dff",
                                "borderColor": "#377dff"
                            },
                            {
                                "data": [150, 230, 382, 204, 169, 290, 300, 100, 300, 225, 120],
                                "backgroundColor": "#e7eaf3",
                                "borderColor": "#e7eaf3"
                            }
                        ]
                        updatingChart.update();
                    }
                })


                // INITIALIZATION OF BUBBLE CHARTJS WITH DATALABELS PLUGIN
                // =======================================================
                $('.js-chart-datalabels').each(function () {
                    $.HSCore.components.HSChartJS.init($(this), {
                        plugins: [ChartDataLabels],
                        options: {
                            plugins: {
                                datalabels: {
                                    anchor: function (context) {
                                        var value = context.dataset.data[context.dataIndex];
                                        return value.r < 20 ? 'end' : 'center';
                                    },
                                    align: function (context) {
                                        var value = context.dataset.data[context.dataIndex];
                                        return value.r < 20 ? 'end' : 'center';
                                    },
                                    color: function (context) {
                                        var value = context.dataset.data[context.dataIndex];
                                        return value.r < 20 ? context.dataset.backgroundColor : context.dataset.color;
                                    },
                                    font: function (context) {
                                        var value = context.dataset.data[context.dataIndex],
                                            fontSize = 25;

                                        if (value.r > 50) {
                                            fontSize = 35;
                                        }

                                        if (value.r > 70) {
                                            fontSize = 55;
                                        }

                                        return {
                                            weight: 'lighter',
                                            size: fontSize
                                        };
                                    },
                                    offset: 2,
                                    padding: 0
                                }
                            }
                        },
                    });
                });
            </script>
    <?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp-php-8.0.8\htdocs\bandharphirus.com-newdesign-2021-08-06\resources\views/admin-views/system/dashboard.blade.php ENDPATH**/ ?>