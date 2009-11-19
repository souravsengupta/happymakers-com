<?php 
// $Id: node.tpl.php,v 1.1 2008/10/01 03:26:19 babu Exp $ 
?>

<!-- start node.tpl.php -->
<div id="node-<?php print $node->nid; ?>" class="node <?php print $node_classes; ?>">
  <?php print $picture ?>

  <?php if ($page == 0): ?>
  <h2 class="title"><a href="<?php print $node_url ?>" title="<?php print $title ?>"><?php print $title ?></a></h2>
  <?php endif; ?>

  <div class="meta">
    <?php if ($submitted): ?>
    <span class="submitted"><?php print $submitted ?></span>
    <?php endif; ?>
  </div>

  <div class="content">
    <?php print $content ?>
  </div>
  

  
  <?php
  global $user;
  //print_r($user);
  if( ($node->uid == $user->uid) && $node->type == 'product')
  {
    if($node->field_isactive[0]['value'] == 1)
     {
  
  ?>
<h3>Potential Buyers</h3>
 <?php   

//    print views_embed_view('allbiduser', 'page_1', $node->nid);
		
        print views_embed_view('allbiduser', 'page_1', $node->nid);

     }
     else
     {
         $awardeduid = $node->field_awardedbuyer[0]['uid'] ;
         $awardeduser = user_load($awardeduid);
		print "<br /> Product is removed from listing and awarded to [".  $awardeduser->name . "] <br />";
		
	}
}

  ?>
  

  <?php if ($terms): ?>
  <div class="terms">
    <?php print $terms; ?>
  </div>
  <?php endif;?>
  
  <?php if ($links): ?>
  <div class="links">
    <?php print $links; ?>
  </div>
  <?php endif; ?>

  <?php if ($node_bottom && !$teaser): ?>
  <div id="node-bottom">
    <?php print $node_bottom; ?>
  </div>
  <?php endif; ?>


<?php
global $user;
$result=db_query("SELECT nid FROM node WHERE uid='$user->uid' AND type='product'");
if( (arg(0) == 'node') && $node->type == 'product')
{
$check="fales";
if( ($node->nid != 586))
{
	$prodnode = node_load($node->nid);
	if($prodnode->field_isactive[0]['value'] != 0)
	{
	if($user->uid!=$node->uid)
	{
	
	?>
	<p>
	<a href="/shop/node/131/<?php echo $node->uid; ?>/<?php print $node->nid; ?>"> Love to have! </a>
	</p><br />
	
	
<?php

}
	}
}
		if($user->uid==1)
	{
		if(ctype_digit(arg(1)))	
		{
			print views_embed_view('pmlist', 'page_1', array(arg(1)));   
		}
	}
	
		if($user->uid==24)
	{
		if(ctype_digit(arg(1)))	
		{
			print views_embed_view('pmlist', 'page_1', array(arg(1)));   
		}
	}
	else if($node->uid==$user->uid)
	{
		if(ctype_digit(arg(1)))	
		{
			print views_embed_view('pmlist', 'page_1', array(arg(1)));   
		}
	}
	
	else if($row=db_fetch_array($result))
	{}
	else if(ctype_digit(arg(1)))	
		{
			print views_embed_view('pmlist2', 'page_1', array(arg(1)), array($user->uid));
		}
	
	if($user->uid==1)
	{
		if(ctype_digit(arg(1)))	
		{
			print views_embed_view('feedback', 'page_1', array(arg(1)));   
		}
	}
	if($user->uid==24)
	{
		if(ctype_digit(arg(1)))	
		{
			print views_embed_view('feedback', 'page_1', array(arg(1)));   
		}
	}
	else if($node->uid==$user->uid)
	{
		if(ctype_digit(arg(1)))	
		{
			print views_embed_view('feedback', 'page_1', array(arg(1)));   
		}
	}
	print views_embed_view('BuyerFeedback', 'page_1', array($node->nid));
}
?>
	
</div>

