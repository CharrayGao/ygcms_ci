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

</head>

<body class="body_contact">
<!--  header -->
<?php $this->load->view('public/headerbox'); ?>

<!-- Main -->
<div id="Flashbox"></div>
<div class="subnav">
	<ul>
		<li class="index">Current : &nbsp;&nbsp;<a href="<?php echo base_url('index.php');?>">Home</a><span>></span></li>
		<li><a href="<?php echo base_url('index.php/job');?>">Job</a></li>
	</ul>
</div>

<div id="sb_title" class="sb_faq">
	<h2>Join Us</h2>
</div>

<div id="content">
<?php if(!empty($job)):?>
	<?php foreach ($job as $vo):?>
		<p><img src="<?php echo base_url('public/Uploads/jobs/'.$vo['job_pics']);?>" title="<?php echo $vo['job_name'];?>"></p>
	<?php endforeach;?>
	
	<div class="pagination"><?php echo $page;?></div>
<?php else:?>
	<?php $this->load->view('public/nodata');?>
<?php endif;?>
</div>


<!-- foot --> 
<?php $this->load->view('public/foot'); ?> 

<!-- Scripts -->  
<?php $this->load->view('includes/scripts'); ?> 

<script type="text/javascript">
$(document).ready(function(){
	$('.lightbox').lightbox();
});

</script>

</body>
</html>