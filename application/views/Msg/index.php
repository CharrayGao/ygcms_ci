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
		<li><a href="<?php echo base_url('index.php/msg');?>">Feedback</a></li>
	</ul>
</div>

<div id="sb_title" class="sb_show">
	<h2>Feedback</h2>
</div>

<div id="content">
	<div id="Showlistbox" style="border:1px solid:#ccc">
	  <?php echo form_open('msg');?>
	  <table width="100%" border="0" cellpadding="0" cellspacing="6">
	    <tr>
	      <td width="14%" align="right">Name</td>
	      <td width="86%">
	        <input name="m_name" type="text" class="inp" maxlength="24" value="<?php echo set_value('m_name');?>" />
	        <span class="invalid">*<?php echo form_error('m_name','<strong>','</strong>');?></span>
	      </td>
	    </tr>
	    <tr>
	      <td align="right">Telephone</td>
	      <td>
	        <input name="m_tel" type="text" class="inp" maxlength="40" value="<?php echo set_value('m_tel');?>"/>
	        <span class="invalid">*<?php echo form_error('m_tel','<strong>','</strong>');?></span>
	      </td>
	    </tr> 
	    <tr>
	      <td align="right">Email</td>
	      <td>
	        <input name="m_email" type="text" class="inp" maxlength="40" value="<?php echo set_value('m_email');?>"/>
	        <span class="invalid">*<?php echo form_error('m_email','<strong>','</strong>');?></span>
	      </td>
	    </tr>
	    <tr>
	      <td align="right">Title</td>
	      <td>
	        <input name="m_tit" type="text" class="inp" style="width:300px" maxlength="50" value="<?php echo set_value('m_tit');?>"/>
	        <span class="invalid">*<?php echo form_error('m_tit','<strong>','</strong>');?></span>
	      </td>
	    </tr>
	    <tr>
	      <td align="right">Content</td>
	      <td>
	        <textarea rows="10" cols="80" id="elm5" name="m_con" class="check" "><?php echo set_value('m_con');?></textarea>
	        <br/><br/>
	        <span name="checkInfo"><strong style="color:red;">*Within 1000</strong></span><br>
	        <span class="invalid"><?php echo form_error('m_con','<strong>','</strong>');?></span>
	      </td>
	    </tr>
	    <tr>
	      <td align="right">&nbsp</td>
	      <td align="left">
	        <input type="submit" value="Submit" />
	        <input type="reset" value="Reset" />	        
	      </td>
	    </tr>	  	  
	  </table>	
	  </form>
	</div><!-- Showlistbox -->


</div><!-- content -->


<!-- foot --> 
<?php $this->load->view('public/foot'); ?> 

<!-- Scripts -->  
<script src="<?php echo base_url('public/js/jquery.min.js');?>" type="text/javascript"></script>
<script src="<?php echo base_url('public/art/jquery.artDialog.js?skin=green');?>" type="text/javascript"></script>
<script src="<?php echo base_url('public/art/plugins/iframeTools.js');?>" type="text/javascript"></script>
<script src="<?php echo base_url('public/xheditor/xheditor-1.2.2.min.js');?>" type="text/javascript"></script>
<script src="<?php echo base_url('public/xheditor/xheditor_lang/en.js');?>" type="text/javascript"></script>

<script>
// editor
$('#elm5').xheditor({tools:'Cut,Copy,Paste,Pastetext,|,Source,Fullscreen'});

$(document).ready(function(){

	$(".showlist dt").hover(function(){
			$(this).toggleClass('hover');
			$(this).fadeTo('slow', 0.5);
		}, function(){
			$(this).removerClass('hover');
			$(this).fadeTo('slow', 1.0);
		});
});

</script>

</body>
</html>
