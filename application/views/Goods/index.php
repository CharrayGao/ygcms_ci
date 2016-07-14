<!doctype html>
<html>
<head>
<title><?php echo $config[0]['webname'];?>->Goods</title>
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
<body class="body_show6">
<!--  header -->
<?php $this->load->view('public/headerbox'); ?>

<!-- Main -->
<div id="Flashbox"></div>
<div style="width:960px; margin:0 auto;">
	<ul class="subnav">
		<a name="goods"></a><a name="center"></a>
		<li clas="index">Current:<?php echo str_repeat(" ", 2);?><a href="<?php echo base_url('index.php');?>">Home</a><span>></span></li>
		<li><a href="<?php echo base_url('index.php/goods');?>">Goods</a></li>
	</ul>
</div>

<div id="sb_title" class="sb_show">
	<h2>Goods</h2>
</div>

<div id="content">
<!-- Goods -->
<div id="Showlistbox">
	<?php if(!empty($goods)):?>
		<?php foreach($goods as $vo):?>
			<dl class="showlist" style="text-align:center;height:400px;">
				<dt>
				  <a href="<?php echo base_url('index.php/Goods/showGoods/'.$vo['id'])?>">
				  	<img src="<?php echo base_url('public/Uploads/goods/'. $vo['goods_pics']);?>" alt="<?php echo $vo['goods_name'];?>" />
				  </a>
				</dt>
				<dd>
				  <strong style="font-size:14px;text-align:center;line-height:25px;"><?php echo $vo['goods_name'];?></strong>
				  <?php echo str_repeat(" ", 2). $vo['goods_num'];?>
				</dd>
				<dd>
				  Our Origin Price &nbsp;<del>$<?php echo $vo['shop_price'].str_repeat(" ", 2);?></del>&nbsp;&nbsp;Current Price&nbsp; 
				  <strong style="font-size:12px;color:red">$<?php echo $vo['goods_dzh']?></strong>
				</dd>
			</dl>
		<?php endforeach;?>
	<?php else:?>
		<?php $this->load-view('public/nodata');?>
	<?php endif;?>
</div><!-- Showlistbox -->
<div class="pagination"><?php echo $page;?></div>

</div><!-- content -->

<!-- foot --> 
<?php $this->load->view('public/foot'); ?> 

<!-- Scripts -->  
<?php $this->load->view('includes/scripts'); ?> 


<script type="text/javascript">
$(document).ready(function(){
	$(".showlist dt").hover(function(){
			$(this).toggleClass('hover');
			$(this).fadeTo("slow", 0.5);
		}, 
		function(){
			$(this).removeClass('hover');
			$(this).fadeTo("slow", 1.0);
		});
	$('.lightbox').lightbox();
	
});

</script>
</body>
</html>