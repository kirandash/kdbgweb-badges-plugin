<?php

	echo $before_widget;
	
	echo $before_title . $title . $after_title;

?>

<ul class="kdbgweb-badges frontend">

	<?php 

		$total_badges = count( $kdbgweb_profile->{'badges'} );
		
		for( $i = $total_badges - 1; $i >= $total_badges - $num_badges; $i-- ): ?>
    	
	<li class="kdbgweb-badge">

		<img src="<?php echo $kdbgweb_profile->{'badges'}[$i]->{'icon_url'}; ?>">		


		<?php if( $display_tooltip == '1' ): ?>


			<div class="kdbgweb-badge-info">
																		
				<p class="kdbgweb-badge-name">			
					<a href="<?php echo $kdbgweb_profile->{'badges'}[$i]->{'url'};; ?>">
						<?php echo $kdbgweb_profile->{'badges'}[$i]->{'name'}; ?>
					</a>								
				</p>							

							
				<?php if ( $kdbgweb_profile->{'badges'}[$i]->{'courses'}[1]->{'title'} != '' ): ?>
				
				<p class="kdbgweb-badge-project">
					<a href="<?php echo $kdbgweb_profile->{'badges'}[$i]->{'courses'}[1]->{'url'}; ?>">
						<?php echo $kdbgweb_profile->{'badges'}[$i]->{'courses'}[1]->{'title'} ;?>
					</a>
				</p>
				<?php endif; ?>

				<a href="http://teamtreehouse.com" alt="Team Treehouse | A Better Way to Learn Technology" class="kdbgweb-logo">
					<img src="<?php echo plugins_url( 'kdbgweb-badges/images/treehouse-logo.png' ); ?>" alt="Treehouse" />
				</a>
					
				<span class="kdbgweb-tooltip bottom"></span>							

			</div>

		<?php endif; ?>


	</li>



	<?php endfor; ?>

</ul>

<?php

	echo $after_widget;
	
?>