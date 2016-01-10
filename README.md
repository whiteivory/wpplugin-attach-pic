# wpplugin-attach-pic
A wordpress plugin which allows you to attach a picture when you post and you can require that picture in the front-end.

If you want to attach a picture when you post a post and use it in the front-end html decoration as a accessory for each post seperately, try this plugin.

##instruction
1\ Add the directory in [root]\wordpress\wp-contents\plugins\
2\ Add the picture you want to add in the [themeroot]\(this can be in everywhere you want quote in the html <img src>.
3\ Write a post and select the particular picID.
4\ Then you can modify the front end code in the wp template like this
			<?php
				$t= get_the_ID();
				$meta_value = get_post_meta( $t, '_my_meta_value_key', true );
				 ?>
			<?php if($meta_value!=null):?>
			<img src="/wordpress/wp-content/themes/twentyeleven/images/attached-pic/<?php echo $meta_value.".jpg";?>" width="128" height="128" />
			<?php endif;?>
			
##todo
1\ Encapsulate the front-end code to be a wp do_action mode.
2\ Optimize the metabox code to be more hommization which allow user to upload instead of hardcode.
