<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title><?php echo $config[0]['webtitle']; ?></title>
<meta name="keywords" content="<?php echo $config[0]['webkeys'];?>" />
<meta name="description" content="<?php echo $config[0]['webdesc'];?>" />
<link href="public/css/maincss.css" rel="stylesheet" type="text/css" />
<link href="public/js/jquery.lightbox.css" rel="stylesheet" type="text/css"/>


</head>
<body>

<!-- Flash -->
<div id="header">
  <!-- slide show -->
  <div id="headerimgs">
	<div id="headerimg1" class="headerimg"></div>
	<div id="headerimg2" class="headerimg"></div>
  </div>
  <!-- Logo -->
  <div id="headerbox">
	<div id="top">
	  <div class="top_link">
	    <ul>
		  <li><a href="#">Login</a></li>
		  <li><a onclick="window.external.AddFavorite(location.href, document.title)" style="cursor:hand">Add Favorite</a></li>
		  <li><a href="<?php echo base_url('index.php'); ?>">Home</a></li>
		</ul>
	  </div>
	</div>
	<div id="navbox">
	  <div id="logo"><a href="<?php echo base_url('index.php');?>"><img src="public/Uploads/weblogo/<?php echo $config[0]['weblogo'];?>" alt="<?php echo $config[0]['webname'];?>" /></a></div>
	  <div class="logo"></div>
	  
	  <div id="mainnavbox">
		<?php foreach ($cate as $vo): ?>
		  <?php if (!empty($vo['lmlogo'])): ?>
		    <div class="navbox nav_5">
			  <ul>
			    <?php 
					if(empty($vo['url'])) {
						$urll = base_url('index.php');
					} else { 
						$urll = base_url('index.php/'.$vo['url']); 
					}
				?>
				
				<li>
				  <a href="<?php echo $urll;?>" target="<?php echo $vo['target'];?>" title="<?php echo $vo['name']; ?>">
				    <img src="<?php echo 'public/Uploads/lmlogo/'. $vo['lmlogo'];?>" width="112" height="67" alt="<?php echo $vo['name'];?>" />
				  </a>
				</li>
				<?php foreach($cate as $vo2)
					{
						if($vo['id'] == $vo2['pid']) 
						{
							if(empty($vo2['url'])) 
							{
								echo "<li><a href='".base_url("index.php"). "' title='". $vo2['name']. "'>".$vo2['name']."</a></li>";
							} else {
								echo "<li><a href='".base_url("index.php/".$vo2['url'])."' title='".$vo2['name']."'>".$vo2['name']."</a></li>";
							}
						}
					}
				?>
			  </ul>
		    </div>
		  <?php endif; ?>
		<?php endforeach; ?>
	  </div>
	</div>

  </div> <!-- headerbox -->
  
  <!-- slider -->
  <div id="headernav-outer">
	<div id="headernav">
		<div id="back" class="btn"></div>
	<!--	<div id="controll" class="btn"></div> -->
		<div id="next" class="btn"></div>
	</div>
  </div>
  
</div> <!-- header -->
<!-- collections -->
<div class="showlist xz_show">
  <div class="line"><img src="public/images/left_line.jpg" /></div>
  <div class="typenav2"></div>
  <!-- On sales -->
  <?php foreach($dzgoods as $vo): ?>
	<dl class="show" style="height:280px;">
	  <dt>
	    <a href="<?php echo base_url('index.php/goods/showGoods/'.$vo['id']);?>">
		  <img src="<?php echo 'public/Uploads/goods/'.$vo['goods_pics'];?>" class="image" />
		</a>
	  </dt>
	  <dd>
	    <span><?php echo $vo['goods_name'];?>
		  <br/>Discount:&nbsp;&nbsp;<?php echo $vo['goods_dz']*10?> % &nbsp;&nbsp;$ <strong style="color:red"><?php echo $vo['goods_dzh'];?></strong>
		</span>
		<small></small>
	  </dd>
	</dl>
  <?php endforeach;?>
  <br/><br/>
</div> <!-- showlist xz_show -->

<!-- the lastest Goods  -->
<div class="showlist hs_show">
  <div class="line"><img src="public/images/left_line.jpg" /></div>
  <div class="typenav2"></div>
  <?php foreach($newgoods as $vo): ?>
	<dl class="show">
	  <dt>
	    <a href="<?php echo base_url("index.php/goods/showGoods/".$vo['id']);?>">
		  <img src="<?php echo 'public/Uploads/goods/'.$vo['goods_pics'];?>" class="image" />
		</a>
	  </dt>
	  <dd>
	    <span><?php echo $vo['goods_name'];?></span><small></small>
	  </dd>
	</dl>
  <?php endforeach;?>
</div><!-- the lastest Goods -->

<div class="con_bg">
  <div id="index_news">
	<div class="news_t"></div>
	<div class="newsbox">
      <dl class="new">
	    <dt><a href="<?php echo base_url('index.php/company');?>" target="_blank"><img src="public/images/event1.jpg" /></a></dt>
		<dd class="type">(Company)<span class="jquery-lightbox-mode-image">Culture</span></dd>
		<dd class="title">Lorem ipsum dolor sit amet</dd>
		<dd class="info">
		  <p>Honesty is a symbol of power... <br /><br/><span class="show STYLE2">
		  Neque porro quisquam est qui dolorem ipsum quia dolor sit amet...
		  </span><br />
		</dd>		
	  </dl>
      <dl class="new">
	    <dt><a href="<?php echo base_url('index.php/job');?>" target="_blank"><img src="public/images/event2.jpg" /></a></dt>
		<dd class="type">(Job)Job</dd>
		<dd class="title">Join Us</dd>
		<dd class="info">
			<p>Dare to control his dream to join us, you go side by side with....<br/>
			  <br />
			  <span class="STYLE2">consectetur, adipisci velit...</span><br />
			</p>
		</dd>		
	  </dl>
      <dl class="new">
	    <dt><a href="<?php echo base_url('index.php/news');?>" target="_blank"><img src="public/images/event3.jpg" /></a></dt>
		<dd class="type">(News)Story</dd>
		<dd class="title">Fusce feugiat</dd>
		<dd class="info">
			<p>Let you anytime and anywhere around to what happened...<br />
			<br />
			<span class="STYLE2">Vestibulum ante ipsum primis in faucibus orci luctus et ultrices ...</span><br />
			</p>
		</dd>		
	  </dl>
      <dl class="new">
	    <dt><a href="<?php echo base_url('index.php/news');?>" target="_blank"><img src="public/images/event4.jpg" /></a></dt>
		<dd class="type">(News)Industry</dd>
		<dd class="title">Fusce feugiat</dd>
		<dd class="info">
		  <p>The latest information about our industry<br />
		  <br />
		  <span class="STYLE2">raesent sit amet nulla rutrum, tempor nulla eget, sollicitudin ipsum....</span><br />
		  </p>
		</dd>		
	  </dl>
	  
    </div><!-- newsbox -->
	
  </div><!-- index_news -->

</div> <!-- con_bg -->

<div style="width:960px;overflow:auto;margin:5px auto;">
  <p><img src="public/images/map.png" width="350px" /><img src="public/images/cpzs.png" width="610" height="66" /></p>
  <div style="float:left;width:350px;height:340px;">
	<!-- map --> 
	<?php $this->load->view('public/map'); ?> 
  </div>
  <div style="float:left">
	<ul class="sty" style="list-style:none;background:#fff;height:330px;width:500px;padding:10px;padding-left:100px">
		<?php foreach($zs as $vo): ?>
		  <li>
			<a href="<?php echo base_url('index.php/news/showNews/'.$vo['id']);?>" target="_blank">&nbsp;&nbsp;<?php echo $vo['news_tit']; ?>...</a>
		  </li>
		<?php endforeach; ?>
	</ul>
  </div>
</div>

<!-- foot --> 
<?php $this->load->view('public/foot'); ?> 

<!-- Scripts -->  
<?php $this->load->view('includes/scripts'); ?> 

<!-- Scripts includes-->  
<?php $this->load->view('includes/index_js'); ?> 

</body>
</html>