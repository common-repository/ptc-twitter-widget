<?php
/*
Plugin Name: PTC Twitter Widget

Plugin URI: https://wordpress.org/plugins/ptc-twitter-widget/

Description: PTC Twitter Widget - Display your PTC Twitter Widget on your website.

Version: 1.0

Author: vivan jakes

Author URI: https://wordpress.org/support/profile/personaltrainercertification


*/

class ptctwtwgt_Twitter_widget{

    

    public $option;

    
    public function __construct() {

        //you can run delete_option method to reset all data

        //delete_option('TWT_ptctwtwgtter_widget_plugin_option');

        $this->option = get_option('ptctwtwgt_twitter_widget_plugin_option');

        $this->ptctwtwgt_twitter_widget_register_settings_and_fields();

    }

    

    public  function ptctwtwgt_add_twitter_widget_tools_option_page(){

        add_options_page('PTC Twitter Widget', 'PTC Twitter Widget ', 'administrator', __FILE__, array('ptctwtwgt_Twitter_widget','ptctwtwgt_twitter_widget_tools_option'));

    }

    

    public function ptctwtwgt_twitter_widget_tools_option(){

?>



<div class="back-bg">
<h2 class="top-style">PTC Twitter Widget Setting</h2>

  <form method="post" action="options.php" enctype="multipart/form-data">

    <?php settings_fields('ptctwtwgt_twitter_widget_plugin_option'); ?>

    <?php do_settings_sections(__FILE__); ?>

    <p class="submit">

      <input name="submit" type="submit" class="button-success" value="Save Changes"/>

    </p>

  </form>

</div>

<?php

    }

    public function ptctwtwgt_twitter_widget_register_settings_and_fields(){

        register_setting('ptctwtwgt_twitter_widget_plugin_option', 'ptctwtwgt_twitter_widget_plugin_option',array($this,'ptctwtwgt_twitter_widget_validate_settings'));

        add_settings_section('ptctwtwgt_twitter_widget_main_section', 'Settings', array($this,'ptctwtwgt_twitter_widget_main_section_cb'), __FILE__);

        //Start Creating Fields and Options

        //sidebar image

        //add_settings_field('sidebarImage', 'Sidebar Image', array($this,'sidebarImage_settings'),__FILE__,'ptctwtwgt_twitter_widget_main_section');

       
        //pageURL

        add_settings_field('pageURL', 'Twitter Profile Name', array($this,'MainpageURL_settings'), __FILE__,'ptctwtwgt_twitter_widget_main_section');

        //pageID

        add_settings_field('pageid', 'Twitter Data Widget ID', array($this,'Mainpageid_settings'), __FILE__,'ptctwtwgt_twitter_widget_main_section');

            //alignment option

         add_settings_field('alignment', 'Alignment Position', array($this,'main_pos_settings'),__FILE__,'ptctwtwgt_twitter_widget_main_section');

  
 		//marginTop

        add_settings_field('marginTop', 'Margin Top', array($this,'marTop_settings'), __FILE__,'ptctwtwgt_twitter_widget_main_section');

        //width

        add_settings_field('width', 'Width', array($this,'Fullwidth_settings'), __FILE__,'ptctwtwgt_twitter_widget_main_section');

        //height

        add_settings_field('height', 'Height', array($this,'Fullheight_settings'), __FILE__,'ptctwtwgt_twitter_widget_main_section');

        //color_scheme option

        add_settings_field('color_scheme', 'Color Theme', array($this,'Page_color_scheme_settings'),__FILE__,'ptctwtwgt_twitter_widget_main_section');

         //header option

        add_settings_field('header', 'Display Header', array($this,'page_heading_settings'),__FILE__,'ptctwtwgt_twitter_widget_main_section');

        //footer option

        add_settings_field('footer', 'Display Footer', array($this,'page_footer_settings'),__FILE__,'ptctwtwgt_twitter_widget_main_section');

        //border option

        add_settings_field('border', 'Display Border', array($this,'page_border'),__FILE__,'ptctwtwgt_twitter_widget_main_section');

         //scrollbar option

        add_settings_field('scrollbar', 'Display scrollbar', array($this,'page_scrollbar'),__FILE__,'ptctwtwgt_twitter_widget_main_section');

        //linkcolor option

        add_settings_field('linkcolor', 'Display Linkcolor', array($this,'page_link_color'),__FILE__,'ptctwtwgt_twitter_widget_main_section');

         

        //jQuery option

        

    }

    public function ptctwtwgt_twitter_widget_validate_settings($plugin_option){

        return($plugin_option);

    }

    public function ptctwtwgt_twitter_widget_main_section_cb(){

        //optional

    }



    //marTop_settings

    public function marTop_settings() {

        if(empty($this->option['marginTop'])) $this->option['marginTop'] = "100";

        echo "<input name='ptctwtwgt_twitter_widget_plugin_option[marginTop]' type='text' value='{$this->option['marginTop']}' />";

    }

     //MainpageURL_settings

    public function MainpageURL_settings() {

        if(empty($this->option['pageURL']))
		 
		
		
		$this->option['pageURL'] = "";

        echo "<input name='ptctwtwgt_twitter_widget_plugin_option[pageURL]' type='text' value='{$this->option['pageURL']}' />";

    }

    //Mainpageid_settings

    public function Mainpageid_settings() {

        if(empty($this->option['pageid'])) 
		
		$this->option['pageid'] = "";

        echo "<input name='ptctwtwgt_twitter_widget_plugin_option[pageid]' type='text' value='{$this->option['pageid']}' />";

    }   

   

    //Fullwidth_settings

    public function Fullwidth_settings() {

        if(empty($this->option['width'])) $this->option['width'] = "292";

        echo "<input name='ptctwtwgt_twitter_widget_plugin_option[width]' type='text' value='{$this->option['width']}' />";

    }

    //Fullheight_settings

    public function Fullheight_settings() {

        if(empty($this->option['height'])) $this->option['height'] = "300";

        echo "<input name='ptctwtwgt_twitter_widget_plugin_option[height]' type='text' value='{$this->option['height']}' />";

    }

    //Page_color_scheme_settings

    public function Page_color_scheme_settings(){

        if(empty($this->option['color_scheme'])) $this->option['color_scheme'] = "light";

        $items = array('light','dark');

        echo "<select name='ptctwtwgt_twitter_widget_plugin_option[color_scheme]'>";

        foreach($items as $item_color){

            $selected = ($this->option['color_scheme'] === $item_color) ? 'selected = "selected"' : '';

            echo "<option value='$item_color' $selected>$item_color</option>";

        }

        echo "</select>";

    }

   

    //alignment_settings

    public function main_pos_settings(){

        if(empty($this->option['alignment'])) $this->option['alignment'] = "left";

        $items = array('left','right');

        echo "<select name='ptctwtwgt_twitter_widget_plugin_option[alignment]'>";

        foreach($items as $item){

            $selected = ($this->option['alignment'] === $item) ? 'selected = "selected"' : '';

            echo "<option value='$item' $selected>$item</option>";

        }

        echo "</select>";

    }

  

      //page_heading_settings

    public function page_heading_settings(){

        if(empty($this->option['header'])) $this->option['header'] = "header";

        $items = array('header','noheader');

        echo "<select name='ptctwtwgt_twitter_widget_plugin_option[header]'>";

        foreach($items as $header){

            $selected = ($this->option['header'] === $header) ? 'selected = "selected"' : '';

            echo "<option value='$header' $selected>$header</option>";

        }

        echo "</select>";

    }



      //page_footer_settings

    public function page_footer_settings(){

        if(empty($this->option['footer'])) $this->option['footer'] = "footer";

        $items = array('footer','nofooter');

        echo "<select name='ptctwtwgt_twitter_widget_plugin_option[footer]'>";

        foreach($items as $footer){

            $selected = ($this->option['footer'] === $footer) ? 'selected = "selected"' : '';

            echo "<option value='$footer' $selected>$footer</option>";

        }

        echo "</select>";

    }



          //page_border

    public function page_border(){

        if(empty($this->option['border'])) $this->option['border'] = "true";

        $items = array('true','false');

        echo "<select name='ptctwtwgt_twitter_widget_plugin_option[border]'>";

        foreach($items as $border){

            $selected = ($this->option['border'] === $border) ? 'selected = "selected"' : '';

            echo "<option value='$border' $selected>$border</option>";

        }

        echo "</select>";

    }



        //scroll_settings

    public function page_scrollbar(){

        if(empty($this->option['scrollbar'])) $this->option['scrollbar'] = "scrollbar";

        $items = array('scrollbar','noscrollbar');

        echo "<select name='ptctwtwgt_twitter_widget_plugin_option[scrollbar]'>";

        foreach($items as $scrollbar){

            $selected = ($this->option['scrollbar'] === $scrollbar) ? 'selected = "selected"' : '';

            echo "<option value='$scrollbar' $selected>$scrollbar</option>";

        }

        echo "</select>";

    }



    //page_link_color

    public function page_link_color() {

        if(empty($this->option['linkcolor'])) $this->option['linkcolor'] = "#2EA2CC";

        echo "<input name='ptctwtwgt_twitter_widget_plugin_option[linkcolor]' type='text' value='{$this->option['linkcolor']}' />";

          

    }

}

add_action('admin_menu', 'ptctwtwgt_twitter_widget_trigger_option_function');



function ptctwtwgt_twitter_widget_trigger_option_function(){

    ptctwtwgt_Twitter_widget::ptctwtwgt_add_twitter_widget_tools_option_page();

} 



add_action('admin_init','ptctwtwgt_twitter_widget_trigger_create_object');

function ptctwtwgt_twitter_widget_trigger_create_object(){

    new ptctwtwgt_Twitter_widget();

}

add_action('wp_footer','ptctwtwgt_twitter_widget_add_content_in_footer');

function ptctwtwgt_twitter_widget_add_content_in_footer(){

    

    $o = get_option('ptctwtwgt_twitter_widget_plugin_option');

    extract($o);

$print_twitter = '';
if($pageURL == ''){
$print_twitter.='<div class="error_kudos">Please Fill Out The PTC Twitter Widget Configuration First</div>';	
} else {

$print_twitter .= '<a class="twitter-timeline"

  href="https://twitter.com/'.$pageURL.'"

  data-widget-id="'.$pageid.'"

  data-theme="'.$color_scheme.'"

  data-link-color="'.$linkcolor.'"

  data-chrome="'.$header.' '.$footer.' '.$scrollbar.' '.$border.'" 

  width="'.$width.'"

  height="'.$height.'">

</a>

  

</a>';
}

$sidebarImgURL = plugins_url('assets/twitter-icon.png', __FILE__ );



?>

<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

<?php if($alignment=='left'){?>

<style type="text/css">

div.twt_area_left{

	left: -<?php echo trim($width+10);?>px; 

	top: <?php echo $marginTop;?>px; 

	z-index: 10000; 

	height:<?php echo trim($height+30);?>px;

	-webkit-transition: all .5s ease-in-out;

	-moz-transition: all .5s ease-in-out;

	-o-transition: all .5s ease-in-out;

	transition: all .5s ease-in-out;

	}

div.twt_area_left.showdiv{

	left:0;

	}	

div.twt_inner_area_left{

	text-align: left;

	width:<?php echo trim($width);?>px;

	height:<?php echo trim($height);?>px;

	}

div.twt_area_left .contacticonlink {		

	right: -32px;

    text-align: right;

}

</style>

<div id="TWT_twitter_widget_display">

  <div id="twt-area1" class="twt_area_left">
 <a class="opent" id="twlink" href="javascript:;"><img class="outer" style="top: 0px;right:-30px;" src="<?php echo $sidebarImgURL;?>" alt=""> </a>
 
    <div id="twt-area2" class="twt_inner_area_left"> 
   		<?php echo $print_twitter; ?> </div>
    <div style="font-size: 9px; color: #808080; font-weight: normal; font-family: tahoma,verdana,arial,sans-serif; line-height: 1.28; text-align: left; direction: ltr;padding:3px 3px 0px; position:absolute;bottom:0px;left:0px;"><a href="https://www.nationalcprassociation.com/blog/" target="_blank" style="color: #808080;">Resources</a></div> 

  </div>
  

</div>

<?php } else { ?>
<style type="text/css">

div.twt_area_right{

	right: -<?php echo trim($width+10);?>px;

	top: <?php echo $marginTop;?>px;

	z-index: 10000; 

	height:<?php echo trim($height+30);?>px;

	-webkit-transition: all .5s ease-in-out;

	-moz-transition: all .5s ease-in-out;

	-o-transition: all .5s ease-in-out;

	transition: all .5s ease-in-out;

	}

div.twt_area_right.showdiv{

	right:0;

	}	

div.twt_inner_area_right{

	text-align: left;

	width:<?php echo trim($width);?>px;

	height:<?php echo trim($height);?>px;

	}

div.twt_area_right .contacticonlink {		

	left: -32px;

    text-align: left;

}		

</style>
<div id="TWT_twitter_widget_display">

  <div id="twt-area1" class="twt_area_right">
  
 <a class="open tw_link_right" id="twlink" href="javascript:;"><img class="outer" style="top: 0px;left:-30px;" src="<?php echo $sidebarImgURL;?>" alt=""></a>
 
    <div id="twt-area2" class="twt_inner_area_right"> <?php echo $print_twitter; ?> </div>

    <div style="font-size: 9px; color: #808080; font-weight: normal; font-family: tahoma,verdana,arial,sans-serif; line-height: 1.28; text-align: right; direction: ltr;padding:3px 3px 0px; position:absolute;bottom:0px;right:0px;"><a href="https://www.nationalcprassociation.com/blog/" target="_blank" style="color: #808080;">Resources</a></div>

  </div>

</div>
<?php } ?>


<script type="text/javascript">

jQuery(document).ready(function() {
jQuery('#twlink').click(function(){
	jQuery(this).parent().toggleClass('showdiv');
});});
</script>
<?php

}

add_action( 'wp_enqueue_scripts', 'register_ptctwtwgt_twitter_widget_styles' );

add_action( 'admin_enqueue_scripts', 'register_ptctwtwgt_twitter_widget_styles' );

 function register_ptctwtwgt_twitter_widget_styles() {

    wp_register_style( 'ptctwtwgt_twitter_widget_style', plugins_url( 'assets/twit_main.css' , __FILE__ ) );

    wp_enqueue_style( 'ptctwtwgt_twitter_widget_style' );

        wp_enqueue_script('jquery');

 }