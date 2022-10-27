<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title><?php echo $this->lang->line('title').' | '.$this->lang->line('Login'); ?></title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <base href="<?php echo base_url(); ?>" />
  <link rel="shortcut icon" href="<?php echo base_url('images/favicon/favicon.ico'); ?>" type="image/x-icon"/>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo base_url('plugins/bootstrap/css/bootstrap.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('plugins/icon/font-awesome-4.7.0/css/font-awesome.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('plugins/theme/css/AdminLTE.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('plugins/bootstrap_validation/css/bootstrapValidator.min.css'); ?>" />
  <link rel="stylesheet" href="<?php echo base_url('plugins/theme/css/animate.min.css'); ?>" />
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <script src="<?php echo base_url('plugins/jQuery/jquery-2.2.3.min.js'); ?>"></script>
	<script src="<?php echo base_url('plugins/bootstrap/js/bootstrap.min.js'); ?>"></script>
	<script src="<?php echo base_url('plugins/bootstrap_validation/js/bootstrapValidator.min.js'); ?>"></script>
</head>
<body class="hold-transition">