  <aside class="main-sidebar">
	<section class="sidebar">
		<div class="user-panel">
			<div class="pull-left image">
				<img src="<?php echo base_url('images/user_icon/'.$this->_['employee_img_path']); ?>" class="user-image img-bordered-sm" alt="User Image">
			</div>
			<div class="pull-left info">
				<p><?php echo $this->_['employee_name']; ?></p>
				<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
			</div>
		</div>
		<ul class="sidebar-menu">
			<li class="header">MAIN NAVIGATION</li>
			<?php if($this->_['group_name']=='Owner'){ ?>
				<li class="treeview">
					<a href="<?php echo site_url('dashboard'); ?>"><i class="fa fa-dashboard fa-lg color"></i><span> Dashboard</span></a>
				</li>
				<li class="treeview">
					<a href="<?php echo site_url('product'); ?>"><i class="fa fa-shopping-bag fa-lg color"></i><span> Products</span></a>
				</li>
				<li class="treeview">
					<a href="#"><i class="fa fa-users fa-lg color"></i><span> People</span></a>
					<ul class="treeview-menu">
						<li><a href="<?php echo site_url('employee'); ?>"><i class="fa fa-circle-o color"></i> All Employees</a></li>
						<li><a href="<?php echo site_url('supplier'); ?>"><i class="fa fa-circle-o color"></i> All Suppliers</a></li>
						<li><a href="<?php echo site_url('customer'); ?>"><i class="fa fa-circle-o color"></i> All Customers</a></li>
					</ul>
				</li>
				<li class="treeview">
					<a href="<?php echo site_url('sales'); ?>"><i class="fa fa-calendar-check-o fa-lg color"></i><span> Sales</span></a>
				</li>
				<li class="treeview">
					<a href="<?php echo site_url('expense'); ?>"><i class="fa fa-arrow-circle-o-down fa-lg color"></i><span> Expenses</span></a>
				</li>
				<!-- <li class="treeview">
					<a href="<?php //echo site_url('receiving'); ?>"><i class="fa fa-shopping-bag fa-lg color"></i><span>  Receiving </span></a>
				</li>  -->
				<li class="treeview">
					<a href="<?php echo site_url('pos'); ?>"><i class="fa fa-shopping-basket fa-lg color"></i><span>  POS Terminal 1</span></a>
				</li> 
				<li class="treeview">
					<a href="<?php echo site_url('pos/layout_2'); ?>"><i class="fa fa-shopping-basket fa-lg color"></i><span>  POS Terminal 2</span></a>
				</li>
				<li class="treeview">
					<a href="#"><i class="fa fa-file-text-o fa-lg color"></i><span> Reports</span></a>
					<ul class="treeview-menu">
						<li><a href="<?php echo site_url('reports/products_report'); ?>"><i class="fa fa-circle-o color"></i> Products Report</a></li>
						<li><a href="<?php echo site_url('reports/employees_report'); ?>"><i class="fa fa-circle-o color"></i> Employees Statements</a></li>
						<li <?php echo ($this->uri->segment(2) == "suppliers_report" ? 'class="active"' : ""); ?>><a href="<?php echo site_url('reports/suppliers_report'); ?>"><i class="fa fa-circle-o color"></i> Suppliers Statements</a></li>
						<li <?php echo ($this->uri->segment(2) == "customers_report" ? 'class="active"' : ""); ?>><a href="<?php echo site_url('reports/customers_report'); ?>"><i class="fa fa-circle-o color"></i> Customers Statements</a></li>
						<li <?php echo ($this->uri->segment(2) == "sales_report" ? 'class="active"' : ""); ?>><a href="<?php echo site_url('reports/sales_report'); ?>"><i class="fa fa-circle-o color"></i> Sales Report</a></li>
						<li <?php echo ($this->uri->segment(2) == "expenses_report" ? 'class="active"' : ""); ?>><a href="<?php echo site_url('reports/expenses_report'); ?>"><i class="fa fa-circle-o color"></i> Expenses Report</a></li>
					</ul>
				</li>
				<li class="treeview">
					<a href="#"><i class="fa fa-cogs fa-lg color"></i><span> Settings</span></a>
					<ul class="treeview-menu">
						<li><a href="<?php echo site_url('company'); ?>"><i class="fa fa-circle-o color"></i> Company Settings</a></li>
						<li><a href="<?php echo site_url('branch'); ?>"><i class="fa fa-circle-o color"></i> Branch Settings</a></li>
					</ul>
				</li>
			<?php }else{ ?>
				<li class="treeview">
					<a href="<?php echo site_url('dashboard'); ?>"><i class="fa fa-dashboard fa-lg color"></i><span> Dashboard</span></a>
				</li>
				<li class="treeview">
					<a href="<?php echo site_url('pos'); ?>"><i class="fa fa-shopping-basket fa-lg color"></i><span>  POS Terminal 1</span></a>
				</li> 
				<li class="treeview">
					<a href="<?php echo site_url('pos/layout_2'); ?>"><i class="fa fa-shopping-basket fa-lg color"></i><span>  POS Terminal 2</span></a>
				</li>
			<?php } ?>
		</ul>
	</section>
</aside>
<div class="content-wrapper">