<?php
/****************************************

	header.php

	Webサイトのヘッダー部分を表示するための
	テンプレートファイルです。

	header.php のコードについては、
	CHAPTER 8 で詳しく説明しています。

*****************************************/
?>
<!DOCTYPE html>
<html lang='ja'>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<title>
	<?php if ( !is_front_page /** ! is_front_page() に書き換えよう！（CHAPTER 8） */ ) {
		wp_title( '::', true, 'right' );
	}
	bloginfo( 'name' ); ?>
	</title>
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico" />
	<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" media="screen" />
	<link href="http://fonts.googleapis.com/css?family=Josefin+Sans:400,600,700" rel="stylesheet" />
	<?php if ( is_singular() ) {
		wp_enqueue_script( 'comment-reply' );
	}
	/** コメント欄をポップアップで表示したいなら、下記を有効にする */
	// comments_popup_script();
	wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div id="container">
		<!-- header -->
		<div id="header" class="clearfix">
			<div class="alignleft">
				<?php /** 下記の echo home_url( '/' ) を echo esc_url( home_url( '/' ) ) に書き換えよう！（CHAPTER 8） */ ?>
				<h1 id="logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><span><?php bloginfo( 'name' ); ?></span></a></h1>
				<p id="description"><?php bloginfo( 'description' ); ?></p>
			</div>
			<div class="alignright">
				<?php get_search_form(); ?>
			</div>
			<?php wp_nav_menu( array( 'theme_location = header-navi' ) ); ?>
		</div>
		<!-- / header -->
<!-- /header.php -->
	<?php
	 	if ((is_home() && !is_paged()) ||
			(is_page() && has_post_thumbnail($post -> ID)) ):
	?>
	<div id="header-image">
		<?php
		 	if (is_page() ):
				echo get_the_post_thumbnail( $post -> ID, 'header-image' );
			else :
		?>
		<img src="<?php header_image(); ?>"
				width="<?php echo get_custom_header() -> width; ?>"
				height="<?php echo get_custom_header() -> height; ?>" alt="" />
		<?php
			endif;
		?>
	</div>
	<?php
		endif;
	?>
