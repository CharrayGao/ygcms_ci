<!doctype html>
<<html>
<head>
<title><?php echo $config[0]['webname'];?></title>
<meta name="Keywords" content="<?php echo $config[0]['webkeys'];?>">
<meta name="Description" content="<?php echo $config[0]['webdesc'];?>">

<link type="text/css" href="<?php echo base_url('public/css/maincss.css');?>" rel="stylesheet"/>
<link type="text/css" href="<?php echo base_url('public/css/subpage.css');?>" rel="stylesheet" />
<link type="text/css" href="<?php echo base_url('public/css/public.css');?>" rel="stylesheet" />
<link type="text/css" href="<?php echo base_url('public/js/jquery.lightbox.css'); ?>" rel="stylesheet" />

</head>

<body class="body_about">
<!--  header -->
<?php $this->load->view('public/headerbox'); ?>

<!-- Main -->
<div id="Flashbox"></div>
<div class="subnav">
	<ul>
		<li class="index">Current : &nbsp;&nbsp;<a href="<?php echo base_url('index.php');?>">Home</a><span>></span></li>
		<li><a href="<?php echo base_url('index.php/company');?>">Company</a></li>
	</ul>
</div>
<div id="content">

	<!-- Company -->
	<div class="about_1" style="border:1px solid green; padding:10px; overflow:auto">
		<?php 
			if(!empty($company[0]['gspic']))
			{
				$imgs = explode('-', $company[0]['gspic']);
				$count = count($imgs) - 2;
				$img = $imgs[rand(0, $count)];
				echo '<img src="'.base_url('public/Uploads/gspic/'.$img).'" style="width:200px;height:200px; float:left;margin-right:10px;"/>';
			}
		?>
		<div style="line-height: 26px;text-indent:2em"><?php echo $company[0]['desc'];?></div>
	</div><!-- about_1 -->
	<div class="about_2" style="margin-top:10px;">
	  	<a name="desc"></a>
	  	<?php 
	  		if(!empty($company[0]['gspic']))
	  		{
	  			echo '<p style="background:#99cc99; height:25px;line-height:25px">&nbsp;&nbsp;Company Images</p>';
	  			
	  			$pics = rtrim($company[0]['gspic'], '-');
	  			$pics = explode('-', $pics);
	  			foreach ($pics as $pic)
	  			{
	  				echo '<img src="'.base_url('public/Uploads/gspic/'.$pic).'" width="226" height="200" style="border:2px solid #99cc99; margin:10px 10px 0 0; display:inline"/>';
	  			}
	  		}	  	
	  	?>
	</div><!-- about_2 -->
	<div class="about_2" style="margin-top:10px;">
		<a name="yuangong"></a>
		<!-- staff images -->
	  	<?php 
	  		if(!empty($company[0]['ygpic']))
	  		{
	  			echo '<p style="background:#99cc99; height:25px;line-height:25px">&nbsp;&nbsp;Our Team</p>';
	  			
	  			$pics = rtrim($company[0]['ygpic'], '-');
	  			$pics = explode('-', $pics);
	  			foreach ($pics as $pic)
	  			{
	  				echo '<img src="'.base_url('public/Uploads/ygpic/'.$pic).'" width="226" height="300" style="border:2px solid #99ccff; margin:10px 10px 0 0; display:inline"/>';
	  			}
	  		}	  	
	  	?>		
	</div><!-- about_2 -->
	<!-- Honour -->
	<div class="about_3" style="margin-top:10px;">
		<!-- staff images -->
	  	<?php 
	  		if(!empty($company[0]['honour']))
	  		{
	  			echo '<p style="background:#669999; height:25px;line-height:25px">&nbsp;&nbsp;Honour</p>';
	  			
	  			$pics = rtrim($company[0]['honour'], '-');
	  			$pics = explode('-', $pics);
	  			foreach ($pics as $pic)
	  			{
	  				echo '<img src="'.base_url('public/Uploads/rypic/'.$pic).'" width="226" height="300" style="border:2px solid #669999; margin:10px 10px 0 0; display:inline"/>';
	  			}
	  		}	  	
	  	?>				
	</div><!-- about_3 -->
	
	<!-- Map -->
	<div style="margin-top:40px; width:960px; overflow:auto;"><a name="map"></a>
		<p style="background: #cccccc;height:25px; line-height:25px;">&nbsp;&nbsp;Map</p>
		<div style="float:left">
			<div style="width:620px; height: 210px; margin-top:10px">
				<?php $this->load->view('public/map');?>
			</div>		
		</div>
		<div style="width: 280px;height:220px;float:right;padding-top:10px;padding-left:-20px;background:url('<?php echo base_url('public/images/lianxi.jpg');?>') no-repeat; background-position:bottom">
			<h1 style="font-size: 20px;"><?php echo $company[0]['name'];?></h1>
			<ul style="margin-top: 4px;">
				<li style="line-height: 22px;"><p style="line-height: 26px;"><?php echo $company[0]['gywm'];?></p></li>
			</ul>
		</div>
	</div><!-- Map -->

</div><!-- content -->

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
