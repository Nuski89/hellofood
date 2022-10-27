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
            <div class="col-md-2 text-center color">
                <div id="totalRevenue" style="margin-top: 50px">
                    <h3><i class="fa fa-bolt color"></i></h3>
                    <h3>TOTAL&nbsp;SALSE <br><small id="sea_cargo">0.00</small></h3>
                </div>
            </div>
            <div class="col-md-8">
                <div id="overall_performance" style="height:300px"></div>
            </div>
            <div class="col-md-2 text-center color">
                <div id="netProfit" style="margin-top: 50px">
                    <h3><i class="fa fa-bolt color"></i></h3>
                    <h3>NET&nbsp;PROFIT <br><small id="air_cargo">0.00</small></h3>
                    
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
        <!-- <div class="overlay" id="overlay_1"><i class="fa fa-refresh fa-spin color"></i></div> -->
    </div>  
    <div class="row">
        <div class="col-md-6">
            <div class="box box-color animated zoomIn">
                <div class="box-body">
                    <div id="hrm_container"></div>
                </div>
                <!-- <div class="overlay" id="overlay_1"><i class="fa fa-refresh fa-spin color"></i></div> -->
            </div>  
        </div>
        <div class="col-md-6">
            <div class="box box-color animated zoomIn">
                <div class="box-body">
                    <div id="product_container"></div>
                </div>
                <!-- <div class="overlay" id="overlay_1"><i class="fa fa-refresh fa-spin color"></i></div> -->
            </div>  
        </div>
    </div>
</section>
<!-- <script type="text/javascript" src="plugins/chartjs/Chart.bundle.js"></script>
<script type="text/javascript" src="plugins/chartjs/utils.js"></script> -->
<script src="plugins/counter/waypoints.min.js"></script>
<script type="text/javascript" src="plugins/highchart/highcharts.js"></script>
<script type="text/javascript" src="plugins/highchart/modules/exporting.js"></script>
<script type="text/javascript" src="plugins/highchart/modules/no-data-to-display.js"></script>
<script src="plugins/counter/jquery.counterup.min.js"></script>
<script type="text/javascript">
Number.prototype.formatMoney = function (c, d, t) {
  var n = this,
    c = isNaN(c = Math.abs(c)) ? 2 : c,
    d = d == undefined ? "." : d,
    t = t == undefined ? "," : t,
    s = n < 0 ? "-" : "",
    i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "",
    j = (j = i.length) > 3 ? j % 3 : 0;
  return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
};
var line_arr = <?php echo json_encode($bar_arr); ?>;
// $('#sea_cargo').html(parseFloat(line_arr['SEA']).formatMoney('2','.', ','));
// $('#air_cargo').html(parseFloat(line_arr['AIR']).formatMoney('2','.', ','));
Highcharts.setOptions({
    lang: {
        thousandsSep: ','
    }
});

Highcharts.chart('overall_performance', {
    chart: {
        type: 'spline'
    },
    title: {
        text: 'Overall Performance '+<?php echo date('Y'); ?>,
        x: -20 //center
    },
    plotOptions: {
        spline: {
            marker: {
                enabled: true
            }
        }
    },
    xAxis: {
        categories: line_arr['month'],
        labels: {
            rotation: 0
        },
        gridLineColor: '#F0F0F0',
        gridLineWidth: 1
    },
    yAxis: {
        title: {
            text: 'Amount [ LKR ]'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:2px">{series.name}: </td>' +
                ' <td style="padding:2px"><b>{point.y:,.0f}</b></td></tr>',
        footerFormat: '</table>',
        shared: false,
        useHTML: true
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
        }
    },
    series: [{
        name: 'Sales',
        data: line_arr['sales']
    }, {
        name: 'Void',
        data: line_arr['void']
    }, {
        name: 'Return',
        data: line_arr['return']
    }, {
        name: 'Tax',
        data: line_arr['tax']
    }, {
        name: 'Discount',
        data: line_arr['discount']
    }]
});


jQuery(document).ready(function($) {
    $('.counter').counterUp({
        delay: 10,
        time: 1000
    });
});
</script>
