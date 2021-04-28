<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package MyVitrine_Theme
 */

get_header();

$user = wp_get_current_user();
var_dump($user);

echo admin_url('admin-ajax.php');
?>

<h1><?= $user->display_name ?></h1>

<form action="#" method="POST"></form>

<form>
        <input type="text" name="message" id="">
        <button id="click">Envoyer</button>
    </form>



<script>
      jQuery('#click').click(function(e){
            e.preventDefault();
            let form_infos = 
            jQuery.ajax({
                  url: '<?= admin_url('admin_ajax.php') ?>',
                  method: 'POST',
                  data: {
                        'action': 'update_user_infos',
                        'form infos' : 
                  },
                  success:function(){
                        alert("j'ai réussi");
                  },
                  error:function(){
                        alert("j'ai tout cassé");
                  }
            })
      })
</script>

<?php
if(isset($user->user_pass)){
      echo $user->user_pass;
}else{
      echo "error";
}


get_footer();