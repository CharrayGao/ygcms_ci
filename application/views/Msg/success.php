<!doctype html>
<<html>
<head>
<title><?php echo $config[0]['webname'];?>->Jobs</title>
<meta name="Keywords" content="<?php echo $config[0]['webkeys'];?>">
<meta name="Description" content="<?php echo $config[0]['webdesc'];?>">

<link type="text/css" href="<?php echo base_url('public/css/maincss.css');?>" rel="stylesheet"/>
<link type="text/css" href="<?php echo base_url('public/css/subpage.css');?>" rel="stylesheet" />
<link type="text/css" href="<?php echo base_url('public/css/public.css');?>" rel="stylesheet" />
<link type="text/css" href="<?php echo base_url('public/js/jquery.lightbox.css'); ?>" rel="stylesheet" />

<style type="text/css">
.inp{
	width:200px; font-size:12px; height:20px; line-height:20px; font-family:Arial, Helvetica, sans-serif;
}
.invalid {
	color: red;
}
</style>
</head>
<body class="body_show6">
<!--  header -->
<?php $this->load->view('public/headerbox'); ?>

<!-- Main -->
<div id="Flashbox"></div>
<div class="subnav">
	<ul>
		<li class="index">Current : &nbsp;&nbsp;<a href="<?php echo base_url('index.php');?>">Home</a><span>></span></li>
		<li><a href="<?php echo base_url('index.php/job');?>">Feedback</a></li>
	</ul>
</div>

<div id="sb_title" class="sb_show">
	<h2>Feedback</h2>
</div>

<div id="content">
	<div id="Showlistbox" style="border:1px solid:#ccc">
	
		<h3>Your feedback was successfully submitted! </h3><br/><br><br>
		
		<h3>Thank you so much! </h3><br><br><br>
		
		<h3>We will send you a email to answer your questions.</h3><br><br>
		<br>
	
		<h4><?php echo anchor('msg', 'Say other words again!');?></h4><br><br>

	</div><!-- Showlistbox -->


</div><!-- content -->


<!-- foot --> 
<?php $this->load->view('public/foot'); ?> 

<!-- Scripts -->  
<script src="<?php echo base_url('public/js/jquery.min.js');?>" type="text/javascript"></script>

</body>
</html>

