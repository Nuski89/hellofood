<section class="content-header">
	<h1>
		Dashboard
		<small>Version 2.0</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Dashboard</li>
	</ol>
</section>
<section class="content" >
	<div class="row">
		<div class="col-md-3 col-sm-6 col-xs-12 animated zoomIn">
			<div class="info-box">
				<span class="info-box-icon bg-aqua"><i class="fa fa-list-ol" aria-hidden="true"></i></span>
				<div class="info-box-content">
					<span class="info-box-text"><?php echo $this->lang->line('products'); ?></span>
					<span class="info-box-number"><?php echo $this->lang->line('total'); ?> <span class="counter"><?php echo $product_arr['total']; ?></span></span>
                    <span class="info-box-number">Active <span class="counter"><?php echo $product_arr['active']; ?></span></span>
                    <span class="info-box-number">Deactive <span class="counter"><?php echo $product_arr['deactive']; ?></span></span>
				</div>
			</div>
		</div>
		<div class="col-md-3 col-sm-6 col-xs-12 animated zoomIn">
			<div class="info-box">
				<span class="info-box-icon bg-green"><i class="fa fa-shopping-cart" aria-hidden="true"></i></span>
				<div class="info-box-content">
					<span class="info-box-text"><?php echo $this->lang->line('sales_module'); ?> <?php echo date("F Y"); ?></span>
					<!-- <span class="info-box-number"><?php //echo $this->lang->line('total'); ?> <span class="counter"><?php //echo to_currency($sale_arr['total']); ?></span></span> -->
					<!-- <span class="info-box-number">Pending <span class="counter"> <?php //echo to_currency($sale_arr['pending']); ?></span></span> -->
					<span class="info-box-number"><?php echo $this->lang->line('sales_module'); ?> <span class="counter"><?php echo to_currency($sale_arr['sales']); ?></span></span>
					<span class="info-box-number"><?php echo $this->lang->line('return'); ?> <span class="counter"><?php echo to_currency($sale_arr['return_']); ?></span></span>
					<span class="info-box-number"><?php echo $this->lang->line('void'); ?> <span class="counter"><?php echo to_currency($sale_arr['void']); ?></span></span>
							
				</div>
			</div>
		</div>

		<div class="clearfix visible-sm-block"></div>
		<div class="col-md-3 col-sm-6 col-xs-12 animated zoomIn">
			<div class="info-box">
				<span class="info-box-icon bg-red"><i class="fa fa-credit-card" aria-hidden="true"></i></span>
				<div class="info-box-content">
					<span class="info-box-text"><?php echo $this->lang->line('expense_module'); ?></span>
					<span class="info-box-number"><?php echo $this->_['app']['company_currency_code']; ?> <span class="counter">10,200</span></span>
				</div>
			</div>
		</div>
		<div class="col-md-3 col-sm-6 col-xs-12 animated zoomIn">
			<div class="info-box">
				<span class="info-box-icon bg-yellow"><i class="fa fa-users" aria-hidden="true"></i></span>
				<div class="info-box-content">
					<span class="info-box-text"><?php echo $this->lang->line('employee_module'); ?></span>
					<span class="info-box-number"><?php echo $this->lang->line('total'); ?> <span class="counter"><?php echo $employee_arr['total']; ?></span></span>
                    <span class="info-box-number">Active <span class="counter"><?php echo $employee_arr['active'];?></span></span>
                    <span class="info-box-number">Deactive <span class="counter"><?php echo $employee_arr['deactive']; ?></span></span>
				</div>
			</div>
		</div>
	</div>
	<div class="box box-color animated zoomIn">
	    <div class="box-body">
                <div class="col-md-2 text-center">
                    <div id="totalRevenue" style="margin-top: 70px">
                        <h3><i class="fa fa-bolt"></i></h3>
                        <h3><?php echo $this->lang->line('total'); ?>&nbsp;Revenue</h3>
                        <h3 class="counter"><?php echo json_encode($bar_arr['total_revenue']); ?></h3>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="chart">
                        <!-- Sales Chart Canvas -->
                        <canvas id="line-chart" style="height: 350px; width:100%;"></canvas>
                    </div><!-- /.chart-responsive -->

                </div><!-- /.col -->
                <div class="col-md-2 text-center">
                    <div id="netProfit" style="margin-top: 70px">
                        <h3><i class="fa fa-bolt"></i></h3>
                        <h3>Net &nbsp;Profit</h3>
                        <h3 class="counter"><?php echo json_encode($bar_arr['total_return']); ?></h3>
                    </div>
                </div>
        </div>
        <div class="box-footer">
            <div class="row">
                <div class="col-sm-2 col-xs-6">
                    <div class="description-block border-right">
                        <h5 class="description-header"><?php echo $this->_['app']['company_currency_code']; ?> <span class="counter"><?php echo json_encode($bar_arr['total_sales']); ?></span></h5>
                        <span class="description-text"><?php echo $this->lang->line('total').' '.$this->lang->line('sales_module'); ?> </span>
                    </div><!-- /.description-block -->
                </div><!-- /.col -->
                <div class="col-sm-2 col-xs-6">
                    <div class="description-block border-right">
                        <h5 class="description-header"><?php echo $this->_['app']['company_currency_code']; ?> <span class="counter"><?php echo json_encode($bar_arr['total_void']); ?></span></h5>
                        <span class="description-text"><?php echo $this->lang->line('total'); ?> void</span>
                    </div><!-- /.description-block -->
                </div>
                <div class="col-sm-2 col-xs-6">
                    <div class="description-block border-right">
                        <h5 class="description-header"><?php echo $this->_['app']['company_currency_code']; ?> <span class="counter"><?php echo json_encode($bar_arr['total_return']); ?></span></h5>
                        <span class="description-text"><?php echo $this->lang->line('total'); ?> return</span>
                    </div><!-- /.description-block -->
                </div><!-- /.col -->
                <div class="col-sm-2 col-xs-6">
                    <div class="description-block">
                        <h5 class="description-header"><?php echo $this->_['app']['company_currency_code']; ?> <span class="counter"><?php echo json_encode($bar_arr['total_tax']); ?></span></h5>
                        <span class="description-text"><?php echo $this->lang->line('total'); ?> tax</span>
                    </div><!-- /.description-block -->
                </div><!-- /.col -->
                <div class="col-sm-2 col-xs-6">
                    <div class="description-block">
                        <h5 class="description-header"><?php echo $this->_['app']['company_currency_code']; ?> <span class="counter"><?php echo json_encode($bar_arr['total_discount']); ?></span></h5>
                        <span class="description-text"><?php echo $this->lang->line('total'); ?> discount</span>
                    </div><!-- /.description-block -->
                </div><!-- /.col -->
                <div class="col-sm-2 col-xs-6">
                    <div class="description-block">
                        <h5 class="description-header"><span class="counter"><?php echo json_encode($bar_arr['total_item']); ?></span></h5>
                        <span class="description-text"><?php echo $this->lang->line('number_of_sales'); ?></span>
                    </div><!-- /.description-block -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<div class="box box-color animated zoomIn">
			    <div class="box-body">
                    <canvas id="donut-chart-area-one" />
			    </div>
			    <!-- <div class="overlay" id="overlay_1"><i class="fa fa-refresh fa-spin color"></i></div> -->
			</div>
		</div>
		<div class="col-md-4">
			<div class="box box-color animated zoomIn">
			    <div class="box-body">
                    <canvas id="donut-chart-area-two" />
			    </div>
			    <!-- <div class="overlay" id="overlay_1"><i class="fa fa-refresh fa-spin color"></i></div> -->
			</div>
		</div>
        <div class="col-md-4">
            <div class="box box-color animated zoomIn">
                <div class="box-body">
                    <canvas id="donut-chart-area-three" />
                </div>
                <!-- <div class="overlay" id="overlay_1"><i class="fa fa-refresh fa-spin color"></i></div> -->
            </div>
        </div>
	</div>
</section>
<script type="text/javascript" src="plugins/chartjs/Chart.bundle.js"></script>
<script type="text/javascript" src="plugins/chartjs/utils.js"></script>
<script src="plugins/counter/waypoints.min.js"></script>
<script src="plugins/counter/jquery.counterup.min.js"></script>

<script>
new Chart(document.getElementById("line-chart"), {
  type: 'line',
  data: {
    labels: <?php echo json_encode($bar_arr['month']); ?>,
    datasets: [{
        tension: 0.000001,
        data: <?php echo json_encode($bar_arr['sales']); ?>,
        label: "Total Sales",
        //borderColor: window.chartColors.red,
        backgroundColor: window.chartColors.green,
        fill: false
      }, {
        tension: 0.000001,
        data: <?php echo json_encode($bar_arr['void']); ?>,
        label: "Total void",
        //borderColor: window.chartColors.green,
        backgroundColor: window.chartColors.red,
        fill: false
      }, {
        tension: 0.000001,
        data: <?php echo json_encode($bar_arr['return']); ?>,
        label: "Total return",
        //borderColor: window.chartColors.orange,
        backgroundColor: window.chartColors.orange,
        fill: false
      }, {
        tension: 0.000001,
        data: <?php echo json_encode($bar_arr['tax']); ?>,
        label: "Total tax",
        //borderColor: window.chartColors.orange,
        backgroundColor: window.chartColors.blue,
        fill: false
      }, {
        tension: 0.000001,
        data: <?php echo json_encode($bar_arr['discount']); ?>,
        label: "Total discount",
        //borderColor: window.chartColors.orange,
        backgroundColor: window.chartColors.yellow,
        fill: false
      }
    ]
  },
  options: {
    title: {
        display: false,
        text: 'asasasa'

    }
  }
});


new Chart(document.getElementById("donut-chart-area-one"), {
    type: 'doughnut',
    data: {
        datasets: [{
            data: [133, 86, 52, 51, 50],
            backgroundColor: [
                window.chartColors.red,
                window.chartColors.orange,
                window.chartColors.purple,
                window.chartColors.green,
                window.chartColors.blue,
            ],
            label: 'Dataset 1'
        }],
        labels: [
            "Appetizers",
            "Sandwiches",
            "Special Sushi",
            "Smoothies",
            "Main Entrees Rice"
        ]
    },
    options: {
        responsive: true,
        legend: {
            position: 'top',
        },
        title: {
            display: true,
            text: 'BEST SELLING CATEGORY'
        },
        animation: {
            animateScale: true,
            animateRotate: true
        }
    }
});


new Chart(document.getElementById("donut-chart-area-two"), {
    type: 'doughnut',
    data: {
        datasets: [{
            data: [50, 100, 20, 85, 10],
            backgroundColor: [
                window.chartColors.red,
                window.chartColors.orange,
                window.chartColors.purple,
                window.chartColors.green,
                window.chartColors.blue,
            ],
            label: 'Dataset 2'
        }],
        labels: [
            "Shrimp Bite Cutlet",
            "Nasi Goreng Chicken",
            "Submarine Full",
            "Crispy Sushi Roll",
            "Lassi"
        ]
    },
    options: {
        responsive: true,
        legend: {
            position: 'top',
        },
        title: {
            display: true,
            text: 'BEST SELLING PRODUCTS'
        },
        animation: {
            animateScale: true,
            animateRotate: true
        }
    }
});


new Chart(document.getElementById("donut-chart-area-three"), {
    type: 'doughnut',
    data: {
        datasets: [{
            data: [30, 50, 100, 70, 35],
            backgroundColor: [
                window.chartColors.red,
                window.chartColors.orange,
                window.chartColors.purple,
                window.chartColors.green,
                window.chartColors.blue,
            ],
            label: 'Dataset 2'
        }],
        labels: [
            "Nasi Goreng Chicken",
            "Ice Cream",
            "Lassi",
            "Dum Biryani",
            "Chicken Bite Cutlet"
        ]
    },
    options: {
        responsive: true,
        legend: {
            position: 'top',
        },
        title: {
            display: true,
            text: 'TOP 5 PRODUCTS OF THE MONTH'
        },
        animation: {
            animateScale: true,
            animateRotate: true
        }
    }
});
</script>

<script>
    jQuery(document).ready(function($) {
        $('.counter').counterUp({
            delay: 10,
            time: 1000
        });
    });
</script>
