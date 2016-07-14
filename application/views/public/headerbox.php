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
	  <div id="logo"><a href="<?php echo base_url('index.php');?>"><img src="<?php echo base_url('public/Uploads/weblogo/'. $config[0]['weblogo']);?>" alt="<?php echo $config[0]['webname'];?>" /></a></div>
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
				    <img src="<?php echo base_url('public/Uploads/lmlogo/'. $vo['lmlogo']);?>" width="112" height="67" alt="<?php echo $vo['name'];?>" />
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

