<!doctype html>
<<html>
<head>
<meta charset="UTF-8">
<title><?php echo $config[0]['webname'];?></title>
<meta name="Keywords" content="<?php echo $config[0]['webkeys'];?>">
<meta name="Description" content="<?php echo $config[0]['webdesc'];?>">

<link type="text/css" href="<?php echo base_url('public/css/maincss.css');?>" rel="stylesheet"/>
<link type="text/css" href="<?php echo base_url('public/css/subpage.css');?>" rel="stylesheet" />
<link type="text/css" href="<?php echo base_url('public/css/public.css');?>" rel="stylesheet" />
<link type="text/css" href="<?php echo base_url('public/js/jquery.lightbox.css'); ?>" rel="stylesheet" />

</head>
<body class="body_show13">
<!--  header -->
<?php $this->load->view('public/headerbox'); ?>

<!-- Main -->
<div id="Flashbox"></div>
<div style="width:960px; margin:0 auto;">
	<ul class="subnav">
		<a name="goods"></a><a name="center"></a>
		<li clas="index">Current:<?php echo str_repeat(" ", 2);?><a href="<?php echo base_url('index.php');?>">Home</a><span>></span></li>
		<li><a href="<?php echo base_url('index.php/goods');?>">Goods</a><span>></span></li>
		<li><?php echo $goods[0]['goods_name'];?></li>
	</ul>
</div>

<div id="sb_title" class="sb_show">
	<h2><?php echo $goods[0]['goods_name'];?></h2>
</div>

<div class="view_title">
  <?php if(!empty($goods)):?>
	<div class="title_left" style="width:100%;border:1px solid #ccc">
	  <dl class="title_name">
	  	<dt>
			Name: 
			<?php 
				echo $goods[0]['goods_name'];
				if($goods[0]['goods_dz']>0)
				{
					echo '<img src="'.base_url('public/images/tj.gif').'"/>';
				}
			?>
		</dt>
	  	<dd><br/>
	  	Catalogue: <?php echo $goods[0]['goods_class'];?>&nbsp;&nbsp;
	  	ID: <?php echo $goods[0]['goods_num'];?><br>
	  	Added Time: <?php echo mdate('%d - %m - %Y', $goods[0]['goods_addtime']);?>
	  	| Storge: <?php echo $goods[0]['goods_nums'];?><br/>
	  	<?php 
	  		if($goods[0]['market_price'] != 0.00)
	  		{
	  			echo "Market Price &nbsp;&nbsp;<del>$".$goods[0]['market_price']."</del>";
	  		}
	  	?>
	  	| Our origin price: $<?php echo $goods[0]['shop_price'];?><br/>
	  	Now 
	  	<?php 
	  		if($goods[0]['goods_dz']>0)
	  		{
	  			echo "<span style='color:green;font-size:14px'>Discount</span>";
	  			
	  		} else {
	  			echo "Origin";
	  		}	  	
	  	?><br/>
	  	Discount:&nbsp;<?php echo $goods[0]['goods_dz']*10;?>% : <strong style="color:red">$<?php echo $goods[0]['goods_dzh']?></strong>&nbsp;<br/><br/>
	  	Description:<span style="line-height:25px;border-bottom:1px solid #ccc"><?php echo $goods[0]['goods_desc'];?></span><br/><br/>
	  	</dd>
	  </dl>	
	</div>
  </div> <!-- view_title - if clause -->
  <div id="Showlistbox" class="listbox">
  	<div id="bigPic">
  		<?php 
  			$p = rtrim($goods[0]['goods_pics'], '-');
  			$p = explode('-', $p);
  			$b = 'block';
  			foreach ($p as $pic)
  			{
  				echo '<img style="display:'.$b.';opacity:1;z-index:1;width:720px;height:540px" src="'. base_url('public/Uploads/goods/'.$pic).'"/>';
  				$b = 'none';
  			}
  		?>
  	</div><!-- bigPic -->
  	<div id="smallPic">
  		<ul id="thumbs">
  			<?php 
  				$pics = rtrim($goods[0]['goods_pics'], '-');
  				$pics = explode('-', $pics);
  				$i = 1;
  				$a = 'active';
  				foreach ($pics as $pic)
  				{
  					echo '<li class="'.$a. '" rel="'.$i.'"><img src="'. base_url('/public/Uploads/goods/'.$pic).'" title="'.$goods[0]['goods_name'].'"/></li>';
  					$i++;
  					$a = '';
  				}
  			?>
  		</ul>
  	</div><!-- smallPic -->
  </div> <!-- Showlistbox -->
  <?php else:?>
     <?php $this->load->view('public/nodata');?>
</div> <!-- view_title - else clause -->
   
  <?php endif;?>



<!-- foot --> 
<?php $this->load->view('public/foot'); ?> 

<!-- Scripts -->  
<?php $this->load->view('includes/scripts'); ?> 

<script type="text/javascript">
var currentImage;
var currentIndex = -1;
var interval;
var myTimer;

function showImage(index)
{
	if(index<$('#bigPic img').length) {
		var indexImage = $('#bigPic img')[index];
		if(currentImage) {
			if(currentImage != indexImage) {
				$(currentImage).css('z-index', 2);
				clearTimeout(myTimer);
				$(currentImage).fadeOut(250, function() {
					myTimer = setTimeout("showNext()", 3000);
					$(this).css({'display':'none', 'z-index':1});
				});
			}
		}
		$(indexImage).css({'display':'block','opacity':1});
		currentImage = indexImage;
		currentIndex = index;
		$('#thumbs li').removeClass('active');
		$($('#thumbs li')[index]).addClass('active');
	}
}

function showNext() {
	var len = $("#bigPic img").length;
	var next = currentIndex<(len-1) ? currentIndex+1 : 0;

	showImage(next);
}

$(document).ready(function(){
	$('.buttons').hover(function(event){
			$(this).addClass('hover');

			var $txt = $(this).text();
			$('<span class="showtip">change to '+$txt+'see </span>').appendTo($(this));
		}, function(){
			$(this).removeClass('hover');
			$('.showtip').remove();
		});
	
	$('.lightbox').lightbox();

	$('.prview').addClass('cur2');

	myTimer = setTimeout("showNext()", 3000);
	showNext();
	$('#thumbs li').bind('click', function(e) {
			var count = $(this).attr('rel');
			showImage(parseInt(count)-1);
		});
	
});

</script>

</body>
</html>
