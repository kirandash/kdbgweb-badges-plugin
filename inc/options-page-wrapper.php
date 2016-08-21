<h2><?php esc_attr_e( '2 Columns Layout: static (px)', 'wp_admin_style' ); ?></h2>

<div class="wrap">

	<div id="icon-options-general" class="icon32"></div>
	<h1><?php esc_attr_e( 'The official BG Web Agency Badges Plugin', 'wp_admin_style' ); ?></h1>

	<div id="poststuff">

		<div id="post-body" class="metabox-holder columns-2">

			<!-- main content -->
			<div id="post-body-content">

				<div class="meta-box-sortables ui-sortable">
					
                    <?php if( !(isset( $kdbgweb_username )) || $kdbgweb_username == '' ): ?>
                    
					<div class="postbox">

						<div class="handlediv" title="Click to toggle"><br></div>
						<!-- Toggle -->

						<h2 class="hndle"><span><?php esc_attr_e( 'Let\'s get started', 'wp_admin_style' ); ?></span>
						</h2>

						<div class="inside">
                            <form name="kdbgweb_username_form" method="post" action="">
                                
                                <input type="hidden" name="kdbgweb_form_submitted" value="Y">
                                
                                <table class="form-table">
                                    <tr>
                                        <td>
                                            <label for="kdbgweb_username"><?php esc_attr_e( 'BG Web Username', 'wp_admin_style' ); ?></label>
                                        </td>
                                        <td>
                                            <input type="text" name="kdbgweb_username" id="kdbgweb_username" value="" class="regular-text" />
                                        </td>
                                    </tr>
                                </table>
                                <p>
                                    <input class="button-primary" type="submit" name="kdbgweb_username_submit" value="<?php esc_attr_e( 'Save' ); ?>" />
                                </p>
                            </form>
						</div>
						<!-- .inside -->

					</div>
					<!-- .postbox -->

					<?php else: ?>

					<div class="postbox">

						<div class="handlediv" title="Click to toggle"><br></div>
						<!-- Toggle -->

						<h2 class="hndle"><span><?php esc_attr_e( 'Most recent badges', 'wp_admin_style' ); ?></span>
						</h2>

						<div class="inside">
                            <p><?php esc_attr_e( 'Below are your 20 most recent badges', 'wp_admin_style' ); ?></p>
                            <ul class="kdbgweb-badges">
                            	<?php for( $i=0; $i<20; $i++ ): ?>
                                <li>
                                	<ul>
                                    	<li>
                                        	<img width="120" src="<?php echo $plugin_url.'/images/wp-badge.png' ?>" alt="Image of WordPress badge" >
                                        </li>
                                        <li class="kdbgweb-badge-name">
                                        	<a href="#"><?php esc_attr_e( 'Badge Name', 'wp_admin_style' ); ?></a>
                                        </li>
                                        <li class="kdbgweb-project-name">
                                        	<a href="#"><?php esc_attr_e( 'Project Name', 'wp_admin_style' ); ?></a>
                                        </li>
                                    </ul>
                                </li>
                                <?php endfor; ?>
                            </ul>
						</div>
						<!-- .inside -->

					</div>
					<!-- .postbox -->
                    
                    <?php endif; ?>
                    
				</div>
				<!-- .meta-box-sortables .ui-sortable -->

			</div>
			<!-- post-body-content -->

			<!-- sidebar -->
			<div id="postbox-container-1" class="postbox-container">

				<div class="meta-box-sortables">
					
                    <?php if( isset( $kdbgweb_username ) || $kdbgweb_username != '' ): ?>
                    
					<div class="postbox">

						<div class="handlediv" title="Click to toggle"><br></div>
						<!-- Toggle -->

						<h2 class="hndle"><span><?php esc_attr_e(
									'Kiran Dash\'s Profile', 'wp_admin_style'
								); ?></span></h2>

						<div class="inside">
							<p>
                            	<img class="kdbgweb-gravatar" width="100%" src="<?php echo $plugin_url.'/images/kirandash.jpg' ?>" alt="Profile picture of Kiran Dash" >
                            </p>
                            <ul class="kdbgweb-badges-and-points">
                            	<li><?php _e( 'Badges: <strong>200</strong>', 'wp_admin_style' ); ?></li>
                                <li><?php _e( 'Points: <strong>10000</strong>', 'wp_admin_style' ); ?></li>
                            </ul>
						</div>
						<!-- .inside -->

					</div>
					<!-- .postbox -->
					
                    <?php endif; ?>
                    
				</div>
				<!-- .meta-box-sortables -->

			</div>
			<!-- #postbox-container-1 .postbox-container -->

		</div>
		<!-- #post-body .metabox-holder .columns-2 -->

		<br class="clear">
	</div>
	<!-- #poststuff -->

</div> <!-- .wrap -->