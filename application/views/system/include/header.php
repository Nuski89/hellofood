<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<base href="<?php echo base_url(); ?>" />
	<link rel="shortcut icon" href="images/favicon/favicon.ico" type="image/x-icon"/>
	<link rel="apple-touch-icon" sizes="57x57" href="<?php echo base_url('images/favicon/')?>/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="<?php echo base_url('images/favicon/')?>/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url('images/favicon/')?>/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url('images/favicon/')?>/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url('images/favicon/')?>/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url('images/favicon/')?>/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url('images/favicon/')?>/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url('images/favicon/')?>/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url('images/favicon/')?>/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo base_url('images/favicon/')?>/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url('images/favicon/')?>/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url('images/favicon/')?>/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('images/favicon/')?>/favicon-16x16.png">
	<link rel="manifest" href="<?php echo base_url('images/favicon/')?>/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="<?php echo base_url('images/favicon/')?>/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
	<title><?php echo $this->lang->line('title').' | '.$title; ?></title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
	<?php foreach(get_css_files() as $css_file) { ?>
		<link rel="stylesheet" rev="stylesheet" href="<?php echo $css_file['path'].'?'.APPLICATION_VERSION;?>" media="<?php echo $css_file['media'];?>" />
	<?php } ?>
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<script type="text/javascript">
		var SITE_URL= "<?php echo site_url(); ?>";
	</script>
	<?php foreach(get_js_files() as $js_file) { ?>
		<script src="<?php echo $js_file['path'].'?'.APPLICATION_VERSION;?>" type="text/javascript" language="javascript" charset="UTF-8"></script>
	<?php } ?>
</head>
<body class="hold-transition skin-blue sidebar-mini <?php echo($this->uri->segment(1) == "reports" ? "" :"sidebar-collapse"); ?>">
<div id="preloader"></div>
<div class="wrapper">
	<header class="main-header">
		<a href="<?php echo site_url(); ?>" class="logo navbar-fixed-top">
			<span class="logo-mini"><i class="fa fa-home" aria-hidden="true"></i></span>
			<span class="logo-lg"><b><?php echo $this->_['app']['company_name']; ?></b></span>
		</a>

		<nav class="navbar navbar-fixed-top">
			<a class="sidebar-toggle fa-lg" data-toggle="offcanvas" role="button">
				<span class="sr-only ">Toggle navigation</span>
			</a>
			<ul class="nav navbar-nav">
				<li>
					<a class="btn btn-flat" onclick="toggleFullScreen()"><i class="fa fa-arrows-alt fa-lg" aria-hidden="true"></i></a>
				</li>
				<?php if (LANUAGE_STATUS) { ?>
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="images/flags/<?php echo $this->lang->line('LnImage'); ?>" class="flag" alt="language">&nbsp;&nbsp;<?php echo $this->_['language']; ?>&nbsp;<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li class="flat-box"><a href="<?php echo site_url('dashboard/set_language/english'); ?>"><img src="images/flags/en.png" class="flag" alt="language"> English</a></li>
						<li class="flat-box"><a href="<?php echo site_url('dashboard/set_language/francais'); ?>"><img src="images/flags/fr.png" class="flag" alt="language"> Français</a></li>
						<li class="flat-box"><a href="<?php echo site_url('dashboard/set_language/portuguese'); ?>"><img src="images/flags/pr.png" class="flag" alt="language"> Portuguese</a></li>
						<li class="flat-box"><a href="dashboard/set_language/spanish"><img src="images/flags/sp.png" class="flag" alt="language"> Spanish</a></li>
						<li class="flat-box"><a href="<?php echo site_url('dashboard/set_language/arabic'); ?>"><img src="images/flags/ar.png" class="flag" alt="language"> العربية</a></li>
						<li class="flat-box"><a href="<?php echo site_url('dashboard/set_language/danish'); ?>"><img src="images/flags/da.png" class="flag" alt="language"> Danish</a></li>
						<li class="flat-box"><a href="<?php echo site_url('dashboard/set_language/turkish'); ?>"><img src="images/flags/tr.png" class="flag" alt="language"> Turkish</a></li>
						<li class="flat-box"><a href="<?php echo site_url('dashboard/set_language/greek'); ?>"><img src="images/flags/gr.png" class="flag" alt="language"> Greek</a></li>
					</ul>
				</li>
				<?php } ?>
			</ul>
			<div class="navbar-custom-menu">
				<ul class="nav navbar-nav">
					<li class="dropdown user user-menu">
						<a class="dropdown-toggle" data-toggle="dropdown">
							<img src="<?php echo base_url('images/user_icon/'.$this->_['employee_img_path']); ?>" class="user-image img-bordered-sm" alt="User Image">
							<span class="hidden-xs"><?php echo $this->_['employee_name']; ?></span>
						</a>
						<ul class="dropdown-menu animated fadeIn">
								<li class="user-header">
									<img src="<?php echo base_url('images/user_icon/'.$this->_['employee_img_path']); ?>" class="img-circle img-bordered-sm" alt="User Image">
									<p><?php echo $this->_['employee_name']; ?></p>
								</li>
								<li class="user-footer">
									<div class="pull-left">
										<a href="<?php echo site_url('profile'); ?>" class="btn btn-default btn-flat color">Profile</a>
										<a class="btn btn-default btn-flat color" href="<?php echo base_url(); ?>"> Web </a>
									</div>
									<div class="pull-right">
										<a href="<?php echo site_url('/login/logout'); ?>" class="btn btn-default btn-flat"><i class="fa fa-power-off color" aria-hidden="true"></i></a>
									</div>
								</li>
						</ul>
					</li>
					<li>
						<a href="<?php echo site_url('/login/logout'); ?>" class="btn btn-flat"><i class="fa fa-power-off" aria-hidden="true"></i></a>
					</li>
					<li>
						<a data-toggle="control-sidebar"><i class="fa fa-cogs" aria-hidden="true"></i></a>
					</li>
				</ul>
			</div>
		</nav>
</header>
