<!doctype html>
<html>
<head>
<title><?php echo $config[0]['webname'];?>->News</title>
<meta name="Keywords" content="<?php echo $config[0]['webkeys'];?>">
<meta name="Description" content="<?php echo $config[0]['webdesc'];?>">

<link type="text/css" href="<?php echo base_url('public/css/maincss.css');?>" rel="stylesheet"/>
<link type="text/css" href="<?php echo base_url('public/css/subpage.css');?>" rel="stylesheet" />
<link type="text/css" href="<?php echo base_url('public/css/public.css');?>" rel="stylesheet" />
<link type="text/css" href="<?php echo base_url('public/js/jquery.lightbox.css'); ?>" rel="stylesheet" />

<style type="text/css">
p a:link, p a:visited {color:blue}
</style>
</head>
<body class="body_faq">
<!--  header -->
<?php $this->load->view('public/headerbox'); ?>

<!-- Main -->
<div id="Flashbox"></div>
<div class="subnav">
	<ul>
		<li class="index">Current : &nbsp;&nbsp;<a href="<?php echo base_url('index.php');?>">Home</a><span>></span></li>
		<li><a href="<?php echo base_url('index.php/news');?>">News</a><span>></span></li>
		<li><?php echo $news[0]['news_tit'];?>
	</ul>
</div>

<div id="sb_title" class="sb_faq">
	<h2><?php echo $news[0]['news_tit'];?></h2>
</div>

<div id="content">
	<div style="overflow:hidden;">
		<?php if(!empty($news)):?>
			<?php foreach ($news as $vo):?>
				<dl class="faq">
					<dt>
						  <span style="width:150px;display:block;float:left;"><?php echo $vo['news_class']?></span>
						  <?php echo $vo['news_tit']?>&nbsp;&nbsp;
						  <span style="font-size:12px">
						    <?php echo mdate('%d - %m - %Y', $vo['add_time']);?>
						  </span>
						</a>
					</dt>
					<dd style="padding-left: 10px">
					  	<p>
					  		News : <?php echo $vo['news_con'];?>
					  	</p>
					</dd>
				</dl>
			<?php endforeach;?>
			<p style="text-align:center">
				<a href="javascript:void(0)" style="color:#996633" onclick="window.print()">Print</a>&nbsp;&nbsp;|&nbsp;&nbsp;
				<a href="javascript:void(0)" onclick="history.back(0)">Back</a>
			</p>

		<?php else:?>
			<?php $this->load->view('public/nodata');?>
		<?php endif;?>
	</div>

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

