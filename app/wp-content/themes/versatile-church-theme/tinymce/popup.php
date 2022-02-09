<?php



// loads the shortcodes class, wordpress is loaded with it

require_once( 'shortcodes.class.php' );



// get popup type

$popup = trim( $_GET['popup'] );

$shortcode = new church_shortcodes( $popup );



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head></head>

<body>

<div id="church-popup">



	<div id="church-shortcode-wrap">

		

		<div id="church-sc-form-wrap">

		

			<div id="church-sc-form-head">

			

				<?php echo $shortcode->popup_title; ?>

			

			</div>

			<!-- /#church-sc-form-head -->

			

			<form method="post" id="church-sc-form">

			

				<table id="church-sc-form-table">

				

					<?php echo $shortcode->output; ?>

					

					<tbody>

						<tr class="form-row">

							<?php if( ! $shortcode->has_child ) : ?><td class="label">&nbsp;</td><?php endif; ?>

							<td class="field"><a href="#" class="button-primary church-insert">Insert Shortcode</a></td>							

						</tr>

					</tbody>

				

				</table>

				<!-- /#church-sc-form-table -->

				

			</form>

			<!-- /#church-sc-form -->

		

		</div>

		<!-- /#church-sc-form-wrap -->

		

		<div id="church-sc-preview-wrap">

		

			<div id="church-sc-preview-head">

		

				Shortcode Preview

					

			</div>

			<!-- /#church-sc-preview-head -->

			

			<?php if( $shortcode->no_preview ) : ?>

			<div id="church-sc-nopreview">Shortcode has no preview</div>		

			<?php else : ?>			

			<iframe src="<?php echo church_TINYMCE_URI; ?>/preview.php?sc=" width="249" frameborder="0" id="church-sc-preview"></iframe>

			<?php endif; ?>

			

		</div>

		<!-- /#church-sc-preview-wrap -->

		

		<div class="clear"></div>

		

	</div>

	<!-- /#church-shortcode-wrap -->



</div>

<!-- /#church-popup -->



</body>

</html>