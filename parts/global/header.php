<?php 
Section_Builder::sec_Begins();
?>
<header>
	<h1><a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a></h1>
	<?php bloginfo( 'description' ); ?>
	<?php get_search_form(); ?>
</header>
<?php 
Section_Builder::sec_Ends();
?>