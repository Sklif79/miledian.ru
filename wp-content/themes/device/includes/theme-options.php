<?php
 
$settings = 'theme_mods_'.get_current_theme();

$defaults = array( 

    'sl' => 'yes'
   
);


add_option($settings, $defaults, '', 'yes');

add_action('admin_init', 'register_theme_settings');
function register_theme_settings() {
	global $settings;
	register_setting($settings, $settings);
}
add_action('admin_menu', 'mytheme_add_admin');
function mytheme_add_admin() {
	add_submenu_page('themes.php', 'Консоль шаблона Device', 'Консоль шаблона Device', 'edit_pages', 'theme-options', 'theme_settings_admin');
}

function theme_settings_admin() { ?>
<?php theme_options_css_js(); ?>

<div class="wrap">
  <?php
	global $settings, $defaults;
	if(get_theme_mod('reset')) {
		echo '<div class="updated fade" id="message"><p>Настройки <strong>сброшены</strong></p></div>';
		update_option($settings, $defaults);
	} elseif($_REQUEST['updated'] == 'true') {
		echo '<div class="updated fade" id="message"><p>Настройки <strong> сохранены </strong></p></div>';
	}
	screen_icon('options-general');
?>
   <h2>Настройка темы Device</h2>
  <br /><br />
  <div class="metabox-holder">
   <div class="postbox">
     
   <h3>ПАРА СЛОВ ОТ ГУДВИНА</h3>
 <div class="inside">

 <p>Спасибо, что Вы выбрали тему от GoodwinPress.Ru. Вы находитесь в консоли темы, где можно настроить некоторые опции шаблона без вмешательства в код. </p>
<p>
ВАЖНО: в том случае, если Вы захотите сменить шаблон, перед деактивацией темы обязательно нажмите кнопку <b>Сбросить настройки</b>, чтобы удалить все данные от настроек шаблона из Вашей базы данных. Это необходимо для того, чтобы последующие шаблоны работали корректно. Впрочем, это относится не только к моим темам, но и к любым другим, где настройка производится через встроенную консоль.</p>
  </div>
  </div>
    </div>
    <div style="clear:both;"></div>
  <form method="post" action="options.php">
    <?php settings_fields($settings);  ?>
   
    <div class="metabox-holder">
    
      
    
        <div class="postbox">
        <h3>
          Настройка слайдера
        </h3>
        <div class="inside">
  <p>
         1. В шаблоне реализован слайдер для вывода последних записей из какой-либо одной рубрики. Вы можете включить или выключить слайдер по желанию. После включения его нужно настроить ниже.
          <br/>
            <select name="<?php echo $settings; ?>[sl]">
              <option style="padding-right:10px;" value="yes" <?php selected('yes', get_theme_mod('sl')); ?>>Включить</option>
              <option style="padding-right:10px;" value="no" <?php selected('no', get_theme_mod('sl')); ?>>Выключить</option>
            </select>
            <span style="margin-left:10px; color: #999999;">
           По-умолчанию: включено
            </span> 
          </p>
          <p>
           2. Здесь впишите ID номер рубрики для слайдера. Для того, чтобы узнать его, активируйте плагин Reveal IDs (приложен к теме) и посмотрите ID номер на странице рубрик, а потом впишите в это поле. Например, <i>33</i>
            <br/>
              <input type="text" name="<?php echo $settings; ?>[sliderid]" value="<?php echo get_theme_mod('sliderid'); ?>" size="35" />
          </p>
                 <p>
         3. Выберите количество записей в слайдере. 
            <br/>
            <select name="<?php echo $settings; ?>[count]">
              <option style="padding-right:10px;" value="1" <?php selected('1', get_theme_mod('count')); ?>>1</option>
              <option style="padding-right:10px;" value="2" <?php selected('2', get_theme_mod('count')); ?>>2</option>
              <option style="padding-right:10px;" value="3" <?php selected('3', get_theme_mod('count')); ?>>3</option>
              <option style="padding-right:10px;" value="4" <?php selected('4', get_theme_mod('count')); ?>>4</option>
              <option style="padding-right:10px;" value="5" <?php selected('5', get_theme_mod('count')); ?>>5</option>
              <option style="padding-right:10px;" value="6" <?php selected('6', get_theme_mod('count')); ?>>6</option>
              <option style="padding-right:10px;" value="7" <?php selected('7', get_theme_mod('count')); ?>>7</option>
              <option style="padding-right:10px;" value="8" <?php selected('8', get_theme_mod('count')); ?>>8</option>
              <option style="padding-right:10px;" value="9" <?php selected('9', get_theme_mod('count')); ?>>9</option>
              <option style="padding-right:10px;" value="10" <?php selected('10', get_theme_mod('count')); ?>>10</option>
            </select>
          
          <span style="margin-left:10px; color: #999999;">
           Рекомендуется не более 5, чтобы не перегружать сайт.
            </span> 
             </p>
             
                  </div>
      </div> 
           
    
      
       <div class="postbox">
        <h3>
          Текстовый блок на Главной
        </h3>
        <div class="inside">
  <p>
         Текстовый блок на Главной позволяет вывести любой текст над слайдером. Используйте его для приветствия посетителям или краткого представления сайта, себя или своего продукта, миссии сайта и т.п.  
          
 
          
           <p>
            Текст (разрешен html):
             <br/>
             <textarea name="<?php echo $settings; ?>[intro_text]" cols=88 rows=10><?php echo stripslashes(get_theme_mod('intro_text')); ?></textarea>
            
               </p>
        </div>
      </div> 
   
      
       <div class="postbox">
        <h3>
       Подписка на RSS
        </h3>
        <div class="inside">
  <p>
        Впишите свой id на feedburner.google.com в это поле, что активировать подписку на ваш rss фид по электронной почте. Если у Вас до сих пор нет своего аккаунта на feedburner, Вы можете зарегистрироваться на <a href=" feedburner.google.com" target="_blank"> feedburner.google.com</a>. Адрес своего фида и его id Вы найдете на вкладке  Edit Feed Details внутри своего аккаунта.
          
 
          
           <p>
             <input type="text" name="<?php echo $settings; ?>[rss]" value="<?php echo stripslashes(get_theme_mod('rss')); ?>" size="35" />
    
             <span style="margin-left:10px; color: #999999;">
           Например, id это goodwinpress в http://feeds.feedburner.com/goodwinpress
            </span> 
               </p>
        </div>
      </div> 
      
      
       <div class="postbox">
        <h3>
      Нижний блок с виджетами
        </h3>
        <div class="inside">
        <p>
        Вы можете включить дополнительный блок в подвале с 3 виджетами.
          <br/>
            <select name="<?php echo $settings; ?>[bottom]">
              <option style="padding-right:10px;" value="yes" <?php selected('yes', get_theme_mod('bottom')); ?>>Включить</option>
              <option style="padding-right:10px;" value="no" <?php selected('no', get_theme_mod('bottom')); ?>>Выключить</option>
            </select>
            <span style="margin-left:10px; color: #999999;">
           По-умолчанию: включено
            </span> 
          </p>
         
        
        </div>
      </div>
      
        
      <p class="submit">
        <input type="submit" class="button-primary" value="Сохранить" />
        <input type="submit" class="button-highlighted" name="<?php echo $settings; ?>[reset]" value="Сбросить настройки" />
      </p>
    </div>   
  </form>
</div>
<?php }

function theme_options_css_js() {
echo <<<CSS

<style type="text/css">
	.metabox-holder { 
		width: 700px; float: left;
		margin: 0; padding: 0 10px 0 0;
		line-height:26px;
	}

	.metabox-holder .postbox .inside {
		padding: 0 10px;
		}
		
	input, textarea, select {
		margin: 5px 0 5px 0;
		padding: 1px;

	}
	.small {
	font-family:Calibri, Arial;
	font-size:9px;
	}
</style>

CSS;
echo <<<JS

<script type="text/javascript">
jQuery(document).ready(function($) {
	$(".fade").fadeIn(1000).fadeTo(1000, 1).fadeOut(1000);
});
</script>

JS;
}
?>
