<link href="/themes/campus20ans/css/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css" />

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>  
<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
<script src="/themes/campus20ans/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-43857095-1', 'campus-clermont.net');
  ga('send', 'pageview');

</script>
</script><script type="text/javascript" src="/onair/js/whatsup.js"></script>

<?php

/**
 * @file
 * Bartik's theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template normally located in the
 * modules/system directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/campus.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 * - $hide_site_name: TRUE if the site name has been toggled off on the theme
 *   settings page. If hidden, the "element-invisible" class is added to make
 *   the site name visually hidden, but still accessible.
 * - $hide_site_slogan: TRUE if the site slogan has been toggled off on the
 *   theme settings page. If hidden, the "element-invisible" class is added to
 *   make the site slogan visually hidden, but still accessible.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['header']: Items for the header region.
 * - $page['featured']: Items for the featured region.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['triptych_first']: Items for the first triptych.
 * - $page['triptych_middle']: Items for the middle triptych.
 * - $page['triptych_last']: Items for the last triptych.
 * - $page['footer_firstcolumn']: Items for the first footer column.
 * - $page['footer_secondcolumn']: Items for the second footer column.
 * - $page['footer_thirdcolumn']: Items for the third footer column.
 * - $page['footer_fourthcolumn']: Items for the fourth footer column.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 * @see campus_process_page()
 * @see html.tpl.php
 */
?>
<div id="page-wrapper"><div id="page">

  <div id="header" class="<?php print $secondary_menu ? 'with-secondary-menu': 'without-secondary-menu'; ?>"><div class="section clearfix">
	<div id="logo">
		<a href="/" title="Home" rel="Accueil">
			<img src="/themes/campus20ans/images/Radio-campus-logo-noir.png" alt="Accueil">
		</a>
	</div>
	<div id="search-box-head">
	<?php
	  $block = module_invoke('search', 'block_view', 'search');
	  print render($block); 
	?>
	</div>
	
	<div id="player">
		<a href="/onair/podcast/player/?live=true" target="_blank"  title="Écouter le streaming de Radio Campus">
        	<span style="font-size: 150%">▶</span> écouter le direct
        	</a>
        	<!-- onclick="window.open('/onair/podcast/player/?live=true','_blank','toolbar=0, location=1, directories=0, status=0, scrollbars=1, resizable=1, copyhistory=0, menuBar=0, width=1024, height=910');return(false)" -->
        	<div id="onair" onclick="loop_reload();return(false)">♫ <span class="jp-title"></span></div>
        		
	</div>

	<div id="podcast"><?php 
		$diff = 0;
		if (intval(date("G")) < 8)
		   $diff = 1;
		$date = strftime("%Y-%m-%d", mktime(0, 0, 0, date('m'), date('d')-$diff, date('y'))); ?>
		<a href="/onair/podcast/player/?date=<?php echo $date;?>" target="_blank" title="Écouter les podcasts de Radio Campus">
        	▶ réécouter les émissions
        	</a>
	</div>
	<div id="menutop" class="navigation">
		<?php print render($page['help']); ?>
	</div> <!-- /#main-menu -->

	
	<div id="traittop">
	
	</div>

   

    

    <?php if ($secondary_menu): ?>
      <div id="secondary-menu" class="navigation">
        <?php print theme('links__system_secondary_menu', array(
          'links' => $secondary_menu,
          'attributes' => array(
            'id' => 'secondary-menu-links',
            'class' => array('links', 'inline', 'clearfix'),
          ),
          'heading' => array(
            'text' => t('Secondary menu'),
            'level' => 'h2',
            'class' => array('element-invisible'),
          ),
        )); ?>
      </div> <!-- /#secondary-menu -->
    <?php endif; ?>

  </div></div> <!-- /.section, /#header -->

  <?php if ($messages): ?>
    <div id="messages"><div class="section clearfix">
      <?php print $messages; ?>
    </div></div> <!-- /.section, /#messages -->
  <?php endif; ?>

  <?php if ($page['featured']): ?>
    <div id="featured"><div class="section clearfix">
      <?php print render($page['featured']); ?>
    </div></div> <!-- /.section, /#featured -->
  <?php endif; ?>

  <div id="main-wrapper" class="clearfix"><div id="main" class="clearfix">
	 <?php print render($page['header']); ?>

    <?php if ($page['sidebar_first']): ?>
      <div id="sidebar-first" class="column sidebar"><div class="section">
        <?php print render($page['sidebar_first']); ?>
      </div></div> <!-- /.section, /#sidebar-first -->
    <?php endif; ?>

    <div id="content" class="column"><div class="section">
      <?php if ($page['highlighted']): ?><div id="highlighted"><?php print render($page['highlighted']); ?></div><?php endif; ?>
      <a id="main-content"></a>
      <?php if ($is_front):?>
      <?php
      $view = views_get_view('messages_principaux');

      $result_view = $view->preview('block');


      if (count($view->result) == 0) {
      $emissions_query =  db_select('node', 'n');
      $emissions_query->join('field_data_field_jour', 'fdfj', 'n.nid = fdfj.entity_id');
      $emissions_query->join('field_data_field_heure', 'fdfh', 'n.nid = fdfh.entity_id');
      $emissions_query->join('field_data_field_frequence', 'fdff', 'n.nid = fdff.entity_id');
      $emissions_query->join('field_data_field_en_cours', 'fdec', 'n.nid = fdec.entity_id');
      $emissions_query->leftJoin('field_data_field_sous_titre_emission', 'fdfste', 'n.nid = fdfste.entity_id');
      $emissions_query->join('field_data_field_duree', 'fdfd', 'n.nid = fdfd.entity_id');
      $emissions_query->join('field_data_field_frequence', 'fdffr', 'n.nid = fdffr.entity_id');
      $emissions_query->join('field_data_field_semaines', 'fdfs', 'fdffr.field_frequence_value = 1 or n.nid = fdfs.entity_id');
      $emissions = $emissions_query->fields('n')
                 ->fields('fdfj')
                 ->fields('fdfh')
                 ->fields('fdff')
                 ->fields('fdfste')
                 ->fields('fdfd')
                 ->fields('n')
                 ->orderBy('field_jour_value', 'ASC')
                 ->orderBy('field_heure_value', 'ASC')
                 ->orderBy('field_semaines_value', 'ASC')
                 ->condition('type', 'emission' ,'=')
		 ->condition('field_en_cours_value', '1' ,'=')
		 ->distinct()
                 ->execute()
                 ->fetchAll();

                 $aujourdhui = date('D');
                 $demain = date('D', strtotime('+1 day'));
                 $hier = date('D', strtotime('-1 day'));
       ?>

      <h1 class="title" id="page-title" style="padding-top:20px;">
          Grille des programmes         </h1>
          <span id="lunclick" class="pointeur <?php if ($aujourdhui == "Mon") echo 'aujourdhui'; ?>">lundi</span>
          
          <span id="marclick" class="pointeur <?php if ($aujourdhui == "Tue") echo 'aujourdhui'; ?>">mardi</span>
          
          <span id="merclick" class="pointeur <?php if ($aujourdhui == "Wed") echo 'aujourdhui'; ?>">mercredi</span>
          
          <span id="jeuclick" class="pointeur <?php if ($aujourdhui == "Thu") echo 'aujourdhui'; ?>">jeudi</span>
          
          <span id="venclick" class="pointeur <?php if ($aujourdhui == "Fri") echo 'aujourdhui'; ?>">vendredi</span>
          
          <span id="samclick" class="pointeur <?php if ($aujourdhui == "Sat") echo 'aujourdhui'; ?>">samedi</span>
          
          <span id="dimclick" class="pointeur <?php if ($aujourdhui == "Sun") echo 'aujourdhui'; ?>">dimanche</span>
          
          <script>
		$( "#lunclick" ).click(function() {
		  $("#proglun").css("visibility","visible");
		  $("#progmar").css("visibility","hidden");
		  $("#progmer").css("visibility","hidden");
		  $("#progjeu").css("visibility","hidden");
		  $("#progven").css("visibility","hidden");
		  $("#progsam").css("visibility","hidden");
		  $("#progdim").css("visibility","hidden");
		  
		  $(".pointeur").removeClass("pointeuractif");
		  $(this).addClass("pointeuractif");
		});
		$( "#marclick" ).click(function() {
		  $("#proglun").css("visibility","hidden");
		  $("#progmar").css("visibility","visible");
		  $("#progmer").css("visibility","hidden");
		  $("#progjeu").css("visibility","hidden");
		  $("#progven").css("visibility","hidden");
		  $("#progsam").css("visibility","hidden");
		  $("#progdim").css("visibility","hidden");
		  
		  $(".pointeur").removeClass("pointeuractif");
		  $(this).addClass("pointeuractif");
		});
		$( "#merclick" ).click(function() {
		  $("#proglun").css("visibility","hidden");
		  $("#progmar").css("visibility","hidden");
		  $("#progmer").css("visibility","visible");
		  $("#progjeu").css("visibility","hidden");
		  $("#progven").css("visibility","hidden");
		  $("#progsam").css("visibility","hidden");
		  $("#progdim").css("visibility","hidden");
		  
		  $(".pointeur").removeClass("pointeuractif");
		  $(this).addClass("pointeuractif");
		});
		$( "#jeuclick" ).click(function() {
		  $("#proglun").css("visibility","hidden");
		  $("#progmar").css("visibility","hidden");
		  $("#progmer").css("visibility","hidden");
		  $("#progjeu").css("visibility","visible");
		  $("#progven").css("visibility","hidden");
		  $("#progsam").css("visibility","hidden");
		  $("#progdim").css("visibility","hidden");
		  
		  $(".pointeur").removeClass("pointeuractif");
		  $(this).addClass("pointeuractif");
		});
		$( "#venclick" ).click(function() {
		  $("#proglun").css("visibility","hidden");
		  $("#progmar").css("visibility","hidden");
		  $("#progmer").css("visibility","hidden");
		  $("#progjeu").css("visibility","hidden");
		  $("#progven").css("visibility","visible");
		  $("#progsam").css("visibility","hidden");
		  $("#progdim").css("visibility","hidden");
		  
		  $(".pointeur").removeClass("pointeuractif");
		  $(this).addClass("pointeuractif");
		});
		$( "#samclick" ).click(function() {
		  $("#proglun").css("visibility","hidden");
		  $("#progmar").css("visibility","hidden");
		  $("#progmer").css("visibility","hidden");
		  $("#progjeu").css("visibility","hidden");
		  $("#progven").css("visibility","hidden");
		  $("#progsam").css("visibility","visible");
		  $("#progdim").css("visibility","hidden");
		  
		  $(".pointeur").removeClass("pointeuractif");
		  $(this).addClass("pointeuractif");
		});
		$( "#dimclick" ).click(function() {
		  $("#proglun").css("visibility","hidden");
		  $("#progmar").css("visibility","hidden");
		  $("#progmer").css("visibility","hidden");
		  $("#progjeu").css("visibility","hidden");
		  $("#progven").css("visibility","hidden");
		  $("#progsam").css("visibility","hidden");
		  $("#progdim").css("visibility","visible");
		  
		  $(".pointeur").removeClass("pointeuractif");
		  $(this).addClass("pointeuractif");
		});
		
		$("document").ready(function() {
		var ladate=new Date();
		var tab_jour=new Array("dim", "lun", "mar", "mer", "jeu", "ven", "sam");
        		$("#"+ tab_jour[ladate.getDay()] +"click").trigger('click');
    		});
	  </script>

          <div id="texte_grille">
	  <div style="position: absolute; bottom: 0; left: 0;">
          	<div style="width:220px;padding-bottom:5px; height:105px; padding-top:5px;">
          	<div style="width:85px;padding-right:5px;float:left;"><img src="/themes/campus20ans/images/legende-playlist.png" alt="playlist" width="80px"></div>
          	<span style="display:block;float:left;width:130px;">La Playlist Collective prend le relais entre minuit et 6h du matin, mais aussi entre les émissions.</span>
          	</div>
          	<div style="width:270px;padding-bottom:5px;">
          	<div style="width:60px;padding-right:10px;float:left;"><img src="/themes/campus20ans/images/legende-CF.png" alt="RC" width="25px"></div>
          	<span> émission Radio Campus France</span>
          	</div>
          	<div style="width:270px;padding-bottom:10px;">
          	<div style="width:60px;padding-right:10px;float:left;"><img src="/themes/campus20ans/images/legende-BIM.png" alt="BIM" width="25px"></div>
          	<span>bimensuelles</span>
          	</div>
          	<!-- div style="width:270px;padding-bottom:0px;text-align:center;">
          	<a href="/themes/campus20ans/images/grille-fev-juin-2015.pdf" target="_blank" alt="lien grille">télécharger la grille en pdf</a> (février-juin 2015)
          	</div -->
	  </div>
          </div>

          <div id="prog">
            <?php
                $tab_jour = array("lun", "mar", "mer", "jeu", "ven", "sam", "dim");
                $tab_jour_en = array("Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun");
                $tab_jour_full = array("lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi", "dimanche");
                
                for($i_day = 0; $i_day != 7; ++ $i_day) {
            ?>
          <div id="prog<?php echo $tab_jour[$i_day];?>">
          	<?php
          	if ($aujourdhui == $tab_jour_en[$i_day])
		  echo "<h3>À l'antenne aujourd'hui&nbsp;:</h3>";
          	if ($demain == $tab_jour_en[$i_day])
		  echo "<h3>À l'antenne demain&nbsp;:</h3>";
          	if ($hier == $tab_jour_en[$i_day])
		  echo "<h3>À l'antenne hier&nbsp;:</h3>";
          	$bim=0;
          	$last=-1;
          	$lastresult = "";
		foreach (  $emissions as $emission){
			if (($emission->field_jour_value == ($i_day + 1) && $emission->field_heure_value != "0") || ($emission->field_jour_value == (($i_day+1)%7+1) && $emission->field_heure_value == "0")):
                                
				$result = '<a href="node/'. $emission->nid .'"><div class="emission">';
				if ($emission->field_frequence_value == "1"):
					$bim=0;
				endif;	
				if ($emission->field_frequence_value != "3" and $bim=="0"):
					$mens=0;
				endif;				
				if (/*($bim == 0 and $mens == 0) ||*/ $last != $emission->field_heure_value):
					$result .= '<div class="sepem"></div>';
					$result .= '<div class="progh"><img src="/themes/campus20ans/images/heure/';
					$result .= $emission->field_heure_value;
					if ($emission->field_frequence_value == "2"):
						$result .= "Bim";
						$bim=10;
					endif;
                                        if (substr((string)$emission->title,0,4) == "100%"):
						$result .= "100";
					endif;							
					if ($emission->title == "Campus club"):
						$result .= "CF";
					endif;							
					if ($emission->title == "Beats in space"):
						$result .= "CF";
					endif;
					if ($emission->title == "Univox"):
						$result .= "CF";
					endif;					

					if ($emission->field_duree_value != "1h")
					  $result .=  "+".$emission->field_duree_value;
					$result .=  '.png" alt="';
					$result .=  $emission->field_heure_value;
					$result .=  ' heure" width="110px"></div>';
					if ($emission->field_frequence_value == "3"):						
						$result .=  '<div class="mensuel">Les mensuelles du '.$tab_jour_full[$i_day].'&thinsp;:</div>';
						$mens=3;
					endif;
					
					
				else: 
					
					if ($bim=10):
						$bim=0;
					endif;
					if ($mens=="3"):						
						
					endif;						
					$result .=  '<div class="progh"></div>';
				endif;
				$result .=  '<div class="detail_emission">';
				$result .=  "<b>";
				$result .=  $emission->title;
				$result .=  "</b><br><span style=\"font-size: 70%;\">";
				$result .=  $emission->field_sous_titre_emission_value;
				$result .=  "</span></div>";
				$result .=  "</div></a>";
				$last = $emission->field_heure_value;
				if (!($emission->field_jour_value == 1 && $emission->field_heure_value == 0))
                                    echo $result;
                                else
                                    $lastresult = $result;
			endif;
		}
                echo $lastresult;
		?>			
          </div> <?php } ?>
          </div>
            <script>
		   (function($){
			   $(window).load(function(){
			      $("#proglun").mCustomScrollbar();
			      $("#progmar").mCustomScrollbar();
			      $("#progmer").mCustomScrollbar();
			      $("#progjeu").mCustomScrollbar();
			      $("#progven").mCustomScrollbar();
			      $("#progsam").mCustomScrollbar();
			      $("#progdim").mCustomScrollbar();
			   });
			})(jQuery);
	</script>
      <?php }
	  else {
	    echo '<div id="message_principal">'.$result_view."</div>"; ?>
            <script>
		   (function($){
			   $(window).load(function(){
			      $("#message_principal").mCustomScrollbar();
			   });
			})(jQuery);
	</script>	
	
	  <?php }
	else:?>
      <?php print render($title_prefix); ?>
      <?php if ($title): ?>
        <h1 class="title" id="page-title">
          <?php print $title; ?>
        </h1>
      <?php endif; ?>
      <?php print render($title_suffix); ?>
      <?php if ($tabs): ?>
        <div class="tabs">
          <?php print render($tabs); ?>
        </div>
      <?php endif; ?>
      
      <?php if ($action_links): ?>
        <ul class="action-links">
          <?php print render($action_links); ?>
        </ul>
      <?php endif; ?>
      
      <?php print render($page['content']); ?>
      <?php print $feed_icons; ?>
      <?php endif;?>
      	
    </div></div> <!-- /.section, /#content -->

    <?php if ($page['sidebar_second']): ?>
      <div id="sidebar-second" class="column sidebar"><div class="section">
        <?php print render($page['sidebar_second']); ?>
      </div></div> <!-- /.section, /#sidebar-second -->
    <?php endif; ?>
            <script>
		   (function($){
			   $(window).load(function(){
			      $("#block-views-bons-plans-venir-block").mCustomScrollbar();
			      $("#block-aggregator-feed-1").mCustomScrollbar();
			      $("#aggregator").mCustomScrollbar();
			      $("#block-block-3").mCustomScrollbar();

			   });
			})(jQuery);
	</script>

	  <?php if ($is_front) { ?>
    <div id="strip-styles">
        <div id="title-strip">
        les 100% <br />
        musique
        </div>
        <ul>
        <?php
                $styles = array("metal" => "Métal", "rock" => "Rock", "chanson" => "Chanson", "hip-hop" => "Hip Hop", "rdw" => "Reggae Dub World", "electro" => "Electro", "jazz" => "Jazz", "pop" => "Pop");

                foreach($styles as $nb => $style) {
                    echo '<li class="style-'.$nb.'"><a href="http://www.campus-clermont.net/onair/100p/?style='.$style.'"><span class="circle-style">100%</span> '.$style.'</a></li>';
                }
        ?>
        </ul>
    
    </div>
  <?php } /* is_front */ ?>
	
  </div></div> <!-- /#main, /#main-wrapper -->

  <?php if ($page['triptych_first'] || $page['triptych_middle'] || $page['triptych_last']): ?>
    <div id="triptych-wrapper"><div id="triptych" class="clearfix">
      <?php print render($page['triptych_first']); ?>
      <?php print render($page['triptych_middle']); ?>
      <?php print render($page['triptych_last']); ?>
    </div></div> <!-- /#triptych, /#triptych-wrapper -->
  <?php endif; ?>
  


  <div id="footer-wrapper"><div class="section">

    <?php if ($page['footer_firstcolumn'] || $page['footer_secondcolumn'] || $page['footer_thirdcolumn'] || $page['footer_fourthcolumn']): ?>
      <div id="footer-columns" class="clearfix">
        <?php print render($page['footer_firstcolumn']); ?>
        <?php print render($page['footer_secondcolumn']); ?>
        <?php print render($page['footer_thirdcolumn']); ?>
        <?php print render($page['footer_fourthcolumn']); ?>
      </div> <!-- /#footer-columns -->
    <?php endif; ?>

    <?php if ($page['footer']): ?>
      <div id="footer" class="clearfix">
      	<div id="traitbottom">
      	</div>
        <?php print render($page['footer']); ?>
      </div> <!-- /#footer -->
    <?php endif; ?>

  </div></div> <!-- /.section, /#footer-wrapper -->

</div></div> <!-- /#page, /#page-wrapper -->