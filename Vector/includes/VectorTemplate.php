<?php
/**
 * Vector - Modern version of MonoBook with fresh look and many usability
 * improvements.
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301, USA.
 * http://www.gnu.org/copyleft/gpl.html
 *
 * @file
 * @ingroup Skins
 */

/**
 * QuickTemplate subclass for Vector
 * @ingroup Skins
 */
class VectorTemplate extends BaseTemplate {
	/* Functions */

	/**
	 * Outputs the entire contents of the (X)HTML page
	 */
	public function execute() {
		$this->data['namespace_urls'] = $this->data['content_navigation']['namespaces'];
		$this->data['view_urls'] = $this->data['content_navigation']['views'];
		$this->data['action_urls'] = $this->data['content_navigation']['actions'];
		$this->data['variant_urls'] = $this->data['content_navigation']['variants'];

		// Move the watch/unwatch star outside of the collapsed "actions" menu to the main "views" menu
		if ( $this->config->get( 'VectorUseIconWatch' ) ) {
			$mode = $this->getSkin()->getUser()->isWatched( $this->getSkin()->getRelevantTitle() )
				? 'unwatch'
				: 'watch';

			if ( isset( $this->data['action_urls'][$mode] ) ) {
				$this->data['view_urls'][$mode] = $this->data['action_urls'][$mode];
				unset( $this->data['action_urls'][$mode] );
			}
		}
		$this->data['pageLanguage'] =
			$this->getSkin()->getTitle()->getPageViewLanguage()->getHtmlCode();

		// Output HTML Page
        $this->html( 'headelement' );
        
        global $wgOut;
        $wgSitenametext = $wgOut->parse("{{SITENAME}}");
        
        ?>

        <div class="pdx_mainNavBar ts-container" id="mw-header-container">
            <div class="ts-inner" id="mw-header">
                <div class="pd_menuTrigger">
                    <div class="p-nav-menuTrigger">
                        <div class="menu-icon">
                            <div class="menu-icon__bar"></div>
                            <div class="menu-icon__bar"></div>
                            <div class="menu-icon__bar"></div>
                        </div>
                        <i class="pd-logo-icon uix_logoIcon"></i>
                    </div>
                    <div class="pd_nav">
                        <div 0="class" 1="header-menu__navigation content">
                            <div 0="class" 1="navigation-menu nav-active" id="header-menu">
                                <div class="navigation-menu__list">
                                    <div class="navigation-menu__section">
                                        <div class="navigation-menu__section-items-container">
                                            <a class="navigation-menu__section-item" href="https://forum.paradoxplaza.com/forum/forums/">Forum list</a>
                                            <a class="navigation-menu__section-item" href="https://forum.paradoxplaza.com/forum/threads/trending">Trending</a>
                                            <a class="navigation-menu__section-item" href="https://forum.paradoxplaza.com/forum/threads/latest">Latest</a>
                                            <a class="navigation-menu__section-item" href="https://forum.paradoxplaza.com/forum/threads/newest">New posts</a>
                                        </div>
                                    </div>
                                    <div class="content-asset">
                                        <div class="navigation-menu__section">
                                            <div class="navigation-menu__section-title">Paradox</div>
                                            <div class="navigation-menu__section-items-container">
                                                <div class="navigation-menu__section-items-container">
                                                    <a class="navigation-menu__section-item" href="https://www.paradoxplaza.com/">Store</a>
                                                    <a class="navigation-menu__section-item" href="https://mods.paradoxplaza.com/">Mods</a>
                                                    <a class="navigation-menu__section-item" href="https://forum.paradoxplaza.com/forum/forums/">Forum</a>
                                                    <a class="navigation-menu__section-item" href="https://play.paradoxplaza.com/">Launcher</a>
                                                    <a class="navigation-menu__section-item" href="https://pdxcon.paradoxplaza.com/?utm_source=pdxplaza-owned&amp;utm_medium=web-owned&amp;utm_content=topmenu-banner&amp;utm_campaign=pc18_pdxcon_20190412_cawe_ann">PDXCON 2019</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-header-logo p-header-logo--image">
                        <a class="uix_logo" href="/">
                            <div class="uix_logo--text">
                                <span>Paradox Wikis</span>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="pdx_siteToggle pdx_hasDropdown">
                    <div class="pdx_siteToggle__trigger pdx_dropdownTrigger"><span><?php echo $wgSitenametext ?></span><i></i></div>
                    <div class="pdx_dropdown pdx_dropdown--extraLarge">
                        <div class="pdx_gameChanger">
                            <div class="pdx_gameChanger__title">Active Wikis</div>
                            <div class="pdx_dropdown__menuList pdx_dropdown__menuList pdx_dropdown__menuList--columns">
                                <a href="https://eos.paradoxwikis.com/Empire_of_Sin_Wiki" class="pdx_menu__link pdx_gameChanger--eos">Empire of Sin</a>
                                <a href="https://aowplanetfall.paradoxwikis.com/AoW_Planetfall_Wiki" class="pdx_menu__link pdx_gameChanger--planetfall">AoW: Planetfall</a>
                                <a href="https://skylines.paradoxwikis.com/Cities:_Skylines_Wiki" class="pdx_menu__link pdx_gameChanger--skylines">Cities: Skylines</a>
                                <a href="https://ck3.paradoxwikis.com/Crusader_Kings_III_Wiki" class="pdx_menu__link pdx_gameChanger--ck3">Crusader Kings 3</a>
                                <a href="https://eu4.paradoxwikis.com/Europa_Universalis_4_Wiki" class="pdx_menu__link pdx_gameChanger--eu4">Europa Universalis 4</a>
                                <a href="https://hoi4.paradoxwikis.com/Hearts_of_Iron_4_Wiki" class="pdx_menu__link pdx_gameChanger--hi4">Hearts of Iron 4</a>
                                <a href="https://imperator.paradoxwikis.com/Imperator_Wiki" class="pdx_menu__link pdx_gameChanger--improme">Imperator: Rome</a>
                                <a href="https://prisonarchitect.paradoxwikis.com/" class="pdx_menu__link pdx_gameChanger--architect">Prison Architect</a>
                                <a href="https://stellaris.paradoxwikis.com/Stellaris_Wiki" class="pdx_menu__link pdx_gameChanger--stellaris">Stellaris</a>
                                <a href="https://survivingmars.paradoxwikis.com/Surviving_Mars_Wiki" class="pdx_menu__link pdx_gameChanger--mars">Surviving Mars</a>
                                <a href="https://sta.paradoxwikis.com/Surviving_The_Aftermath_Wiki" class="pdx_menu__link pdx_gameChanger--aftermath">Surviving the Aftermath</a>
                            </div>
                            <div class="pdx_gameChanger__title">Legacy Wikis</div>
                            <div class="pdx_dropdown__menuList pdx_dropdown__menuList pdx_dropdown__menuList--columns">
                                <a href="https://ck2.paradoxwikis.com/Crusader_Kings_II_Wiki" class="pdx_menu__link pdx_gameChanger--ck2">Crusader Kings 2</a>
                                <a href="https://aod.paradoxwikis.com/Main_Page" class="pdx_menu__link pdx_gameChanger--arsenal">Arsenal of Democracy</a>
                                <a href="https://eu2.paradoxwikis.com/Main_Page" class="pdx_menu__link pdx_gameChanger--eu2">Europa Universalis 2</a>
                                <a href="https://eu3.paradoxwikis.com/Europa_Universalis_3_Wiki" class="pdx_menu__link pdx_gameChanger--eu3">Europa Universalis 3</a>
                                <a href="https://eurome.paradoxwikis.com/Europa_Universalis:_Rome_Wiki" class="pdx_menu__link pdx_gameChanger--eurome">Europa Universalis: Rome</a>
                                <a href="https://hoi2.paradoxwikis.com/Main_Page" class="pdx_menu__link pdx_gameChanger--hi2">Hearts of Iron 2</a>
                                <a href="https://hoi3.paradoxwikis.com/Hearts_of_Iron_3_Wiki" class="pdx_menu__link pdx_gameChanger--hi3">Hearts of Iron 3</a>
                                <a href="https://steeldivision.paradoxwikis.com/Steel_Division_Wiki" class="pdx_menu__link pdx_gameChanger--steel">Steel Division</a>
                                <a href="https://tyranny.paradoxwikis.com/Tyranny_Wiki" class="pdx_menu__link pdx_gameChanger--tyranny">Tyranny</a>
                                <a href="https://vic1.paradoxwikis.com/Main_Page" class="pdx_menu__link pdx_gameChanger--vic1">Victoria 1</a>
                                <a href="https://vic2.paradoxwikis.com/Victoria_2_Wiki" class="pdx_menu__link pdx_gameChanger--vic2">Victoria 2</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pdx_mainNavBar__opposite">
                    <div id="p-search" role="search">
						<h3<?php $this->html( 'userlangattributes' ) ?>>
							<label for="searchInput"><?php $this->msg( 'search' ) ?></label>
                        </h3>
                        <i class="pdx_searchTrigger"></i>
						<form action="<?php $this->text( 'wgScript' ) ?>" id="searchform">
							<div<?php echo $this->config->get( 'VectorUseSimpleSearch' ) ? ' id="simpleSearch"' : '' ?>>
								<?php
								echo $this->makeSearchInput( [ 'id' => 'searchInput', 'placeholder' => 'Search in Wiki' ] );
								echo Html::hidden( 'title', $this->get( 'searchtitle' ) );

								echo $this->makeSearchButton(
									'fulltext',
									[ 'id' => 'mw-searchButton', 'class' => 'searchButton mw-fallbackSearchButton' ]
								);
								echo $this->makeSearchButton(
									'go',
									[ 'id' => 'searchButton', 'class' => 'searchButton' ]
								);
								?>
							</div>
                        </form>
                    </div>

                    <div id="p-personal" role="navigation" class="<?php
                    if ( count( $this->data['personal_urls'] ) == 0 ) {
                        echo ' emptyPortlet';
                    }?>" aria-labelledby="p-personal-label">
                        <h3 id="p-personal-label"><?php $this->msg( 'personaltools' ) ?></h3>
                        <div class="pdx_hasDropdown">
                            <?php

                            $loginText = '';

                            if ( !$this->getSkin()->getUser()->isLoggedIn() &&
                                User::groupHasPermission( '*', 'edit' )
                            ) {
                                $loginText =
                                // $this->getMsg( 'notloggedin' )->text()
                                // 'Log in' .
                                Html::rawElement('a', ['class' => 'pdx_dropdownTrigger'], 'Log in');
                            } else {
                                $username = $this->getSkin()->getUser()->mName;
                                $loginText = Html::rawElement('a', ['class' => 'pdx_dropdownTrigger'], $username);
                            }

                            $personalTools = $this->getPersonalTools();

                            $langSelector = '';
                            if ( array_key_exists( 'uls', $personalTools ) ) {
                                $langSelector = $this->makeListItem( 'uls', $personalTools[ 'uls' ] );
                                unset( $personalTools[ 'uls' ] );
                            }

                            echo $langSelector;
                            echo $loginText;

                            echo Html::openElement('div', ['class' => 'pdx_dropdown']);
                                echo html::openElement('ul');
                                    foreach ( $personalTools as $key => $item ) {
                                        echo $this->makeListItem( $key, $item );
                                    }
                                echo html::closeElement('ul');
                            echo Html::closeElement('div');

                            ?>                            
                        </div>
                    </div>
                </div>
			</div>
        </div>

		<div id="mw-page-base" class="noprint"></div>
        <div id="mw-head-base" class="noprint"></div>
        <div class="pdx_contentWrapper">
            <div id="mw-navigation">
                <h2><?php $this->msg( 'navigation-heading' ) ?></h2>
                <div id="mw-head">
                    <?php $this->renderNavigation( [ 'PERSONAL' ] ); ?>
                    <div id="left-navigation">
                        <?php $this->renderNavigation( [ 'NAMESPACES', 'VARIANTS' ] ); ?>
                    </div>
                    <div id="right-navigation">
                        <?php $this->renderNavigation( [ 'VIEWS', 'ACTIONS', 'SEARCH' ] ); ?>
                    </div>
                </div>
                <div id="mw-panel">
                    <div id="p-logo" role="banner"><a class="mw-wiki-logo" href="<?php
                        echo htmlspecialchars( $this->data['nav_urls']['mainpage']['href'] )
                        ?>" <?php
                        echo Xml::expandAttributes( Linker::tooltipAndAccesskeyAttribs( 'p-logo' ) )
                        ?>></a></div>
                    <?php $this->renderPortals( $this->data['sidebar'] ); ?>
                </div>
            </div>
            <div id="content" class="mw-body" role="main">
                <a id="top"></a>
                <?php
                if ( $this->data['sitenotice'] ) {
                    echo Html::rawElement( 'div',
                        [
                            'id' => 'siteNotice',
                            'class' => 'mw-body-content',
                        ],
                        // Raw HTML
                        $this->get( 'sitenotice' )
                    );
                }
                if ( is_callable( [ $this, 'getIndicators' ] ) ) {
                    echo $this->getIndicators();
                }
                // Loose comparison with '!=' is intentional, to catch null and false too, but not '0'
                if ( $this->data['title'] != '' ) {
                    echo Html::rawElement( 'h1',
                        [
                            'id' => 'firstHeading',
                            'class' => 'firstHeading',
                            'lang' => $this->get( 'pageLanguage' ),
                        ],
                        // Raw HTML
                        $this->get( 'title' )
                    );
                }

                $this->html( 'prebodyhtml' );
                ?>
                <div id="bodyContent" class="mw-body-content">
                    <?php
                    if ( $this->data['isarticle'] ) {
                        echo Html::element( 'div',
                            [
                                'id' => 'siteSub',
                                'class' => 'noprint',
                            ],
                            $this->getMsg( 'tagline' )->text()
                        );
                    }
                    ?>
                    <div id="contentSub"<?php $this->html( 'userlangattributes' ) ?>><?php
                        $this->html( 'subtitle' )
                    ?></div>
                    <?php
                    if ( $this->data['undelete'] ) {
                        echo Html::rawElement( 'div',
                            [ 'id' => 'contentSub2' ],
                            // Raw HTML
                            $this->get( 'undelete' )
                        );
                    }
                    if ( $this->data['newtalk'] ) {
                        echo Html::rawElement( 'div',
                            [ 'class' => 'usermessage' ],
                            // Raw HTML
                            $this->get( 'newtalk' )
                        );
                    }
                    // Keep this empty `div` for compatibility with gadgets and user scripts
                    // using this place to insert extra elements before.
                    echo Html::element( 'div', [ 'id' => 'jump-to-nav' ] );
                    ?>
                    <a class="mw-jump-link" href="#mw-head"><?php $this->msg( 'vector-jumptonavigation' ) ?></a>
                    <a class="mw-jump-link" href="#p-search"><?php $this->msg( 'vector-jumptosearch' ) ?></a>
                    <?php
                    $this->html( 'bodycontent' );

                    if ( $this->data['printfooter'] ) {
                        ?>
                        <div class="printfooter">
                            <?php $this->html( 'printfooter' ); ?>
                        </div>
                    <?php
                    }

                    if ( $this->data['catlinks'] ) {
                        $this->html( 'catlinks' );
                    }

                    if ( $this->data['dataAfterContent'] ) {
                        $this->html( 'dataAfterContent' );
                    }
                    ?>
                    <div class="visualClear"></div>
                    <?php $this->html( 'debughtml' ); ?>
                </div>
            </div>
        </div>
		<?php Hooks::run( 'VectorBeforeFooter' ); ?>
		<div id="footer" role="contentinfo"<?php $this->html( 'userlangattributes' ) ?>>
			<?php
			foreach ( $this->getFooterLinks() as $category => $links ) {
			?>
			<ul id="footer-<?php echo $category ?>">
				<?php
				foreach ( $links as $link ) {
				?>
				<li id="footer-<?php echo $category ?>-<?php echo $link ?>"><?php $this->html( $link ) ?></li>
				<?php
				}
				?>
			</ul>
			<?php
			}
			?>
			<?php $footericons = $this->getFooterIcons( 'icononly' );
			if ( count( $footericons ) > 0 ) {
				?>
				<ul id="footer-icons" class="noprint">
					<?php
					foreach ( $footericons as $blockName => $footerIcons ) {
					?>
					<li id="footer-<?php echo htmlspecialchars( $blockName ); ?>ico">
						<?php
						foreach ( $footerIcons as $icon ) {
							echo $this->getSkin()->makeFooterIcon( $icon );
						}
						?>
					</li>
					<?php
					}
					?>
				</ul>
			<?php
			}
			?>
			<div style="clear: both;"></div>
		</div>
        <?php $this->printTrail(); ?>
        
		<?php echo Html::rawElement( 'div', ['class' => 'footer pdx_footer' ],
			Html::rawElement( 'div', [ 'class' => 'footer-container content grid ts-inner' ],
				// $this->getFooter()
				Html::rawElement('div', ['class' => 'footer__logo footer-item'],
					Html::rawElement('div', ['class' => 'content-asset'],
						Html::rawElement('div', ['class' => 'footer__logo-image'],
							Html::rawElement('img', ['src' => 'https://www.paradoxplaza.com/on/demandware.static/Sites-Paradox_US-Site/-/en_US/images/footer-master-logo.png'])
						)
					)
				) .
				Html::rawElement('div', ['class' => 'footer__games footer-item'],
					Html::rawElement('div', ['class' => 'content-asset'],
						Html::rawElement('div', ['class' => 'footer_section_title'], 'Games') .
						Html::rawElement('ul', ['class' => 'footer__menu'],
							Html::rawElement('li', ['class' => 'footer__menu_link'],
								Html::rawElement('a', ['href' => 'https://www.paradoxplaza.com/games/', 'title' => 'Browse'], 'Browse')
							) .
							Html::rawElement('li', ['class' => 'footer__menu_link'],
								Html::rawElement('a', ['href' => 'https://www.paradoxplaza.com/new-releases/', 'title' => 'New Releases'], 'New Releases')
							) .
							Html::rawElement('li', ['class' => 'footer__menu_link'],
								Html::rawElement('a', ['href' => 'https://www.paradoxplaza.com/coming-soon/', 'title' => 'Coming Soon'], 'Coming Soon')
							) . 
							Html::rawElement('li', ['class' => 'footer__menu_link'],
								Html::rawElement('a', ['href' => 'https://www.paradoxplaza.com/on-sale/', 'title' => 'On Sale'], 'On Sale')
							) . 
							Html::rawElement('li', ['class' => 'footer__menu_link'],
								Html::rawElement('a', ['href' => 'https://play.paradoxplaza.com/', 'title' => 'Paradox Launcher'], 'Play on Paradox technology')
							)
						)
					)
				) . 
				Html::rawElement('div', ['class' => 'footer__community footer-item'],
					Html::rawElement('div', ['class' => 'content-asset'],
						Html::rawElement('div', ['class' => 'footer_section_title'], 'Community') .
						Html::rawElement('ul', ['class' => 'footer__menu'],
							Html::rawElement('li', ['class' => 'footer__menu_link'],
								Html::rawElement('a', ['href' => 'https://forum.paradoxplaza.com/forum/index.php', 'title' => 'Paradox Forums'], 'Paradox Forums')
							) .
							Html::rawElement('li', ['class' => 'footer__menu_link'],
								Html::rawElement('a', ['href' => 'https://paradoxwikis.com/', 'title' => 'Paradox Wikis'], 'Paradox Wikis')
							) .
							Html::rawElement('li', ['class' => 'footer__menu_link'],
								Html::rawElement('a', ['href' => 'https://www.paradoxplaza.com/support-static-info-ca.html', 'title' => 'Support'], 'Support')
							) . 
							Html::rawElement('li', ['class' => 'footer__menu_link'],
								Html::rawElement('a', ['href' => 'http://merch.paradoxplaza.com/', 'title' => 'Merch'], 'Merch')
							)
						)
					)
				) . 
				Html::rawElement('div', ['class' => 'footer__about footer-item'],
					Html::rawElement('div', ['class' => 'content-asset'],
						Html::rawElement('div', ['class' => 'footer_section_title'], 'About') .
						Html::rawElement('ul', ['class' => 'footer__menu'],
							Html::rawElement('li', ['class' => 'footer__menu_link'],
								Html::rawElement('a', ['href' => 'https://www.paradoxplaza.com/news', 'title' => 'News'], 'News')
							) .
							Html::rawElement('li', ['class' => 'footer__menu_link'],
								Html::rawElement('a', ['href' => 'https://www.paradoxplaza.com/about-us-static-info-ca.html', 'title' => 'About us'], 'About us')
							) .
							Html::rawElement('li', ['class' => 'footer__menu_link'],
								Html::rawElement('a', ['href' => 'http://career.paradoxplaza.com/', 'title' => 'Careers'], 'Careers')
							) . 
							Html::rawElement('li', ['class' => 'footer__menu_link'],
								Html::rawElement('a', ['href' => 'https://www.paradoxplaza.com/playtest-static-info-ca.html', 'title' => 'Join our playtests'], 'Join our playtests')
							) . 
							Html::rawElement('li', ['class' => 'footer__menu_link'],
								Html::rawElement('a', ['href' => 'https://www.paradoxplaza.com/press-static-info-ca.html', 'title' => 'Media contact'], 'Media contact')
							)
						)
					)
				) . 
				Html::rawElement('div', ['class' => 'footer__socialmedia footer-item'],
					Html::rawElement('div', ['class' => 'content-asset'],
						Html::rawElement('div', ['class' => 'footer_section_title'], 'Social Media') .
						Html::rawElement('ul', ['class' => 'footer__socialmedia-icons'],
							Html::rawElement('li', ['class' => 'footer__social-icon'],
								Html::rawElement('a', ['href' => 'https://www.facebook.com/ParadoxInteractive', 'target' => '_blank'], 
                                    Html::rawElement('span', ['class' => 'icon icon-facebook-with-circle'])
								)
							) . 
							Html::rawElement('li', ['class' => 'footer__social-icon'],
								Html::rawElement('a', ['href' => 'https://twitter.com/PdxInteractive', 'target' => '_blank'], 
									Html::rawElement('span', ['class' => 'icon icon-twitter-with-circle'])
								)
							) . 
							Html::rawElement('li', ['class' => 'footer__social-icon'],
								Html::rawElement('a', ['href' => 'https://www.youtube.com/user/Paradoxplaza', 'target' => '_blank'], 
									Html::rawElement('span', ['class' => 'icon icon-youtube-with-circle'])
								)
							) . 
							Html::rawElement('li', ['class' => 'footer__social-icon'],
								Html::rawElement('a', ['href' => 'https://www.twitch.tv/paradoxinteractive', 'target' => '_blank'], 
									Html::rawElement('span', ['class' => 'icon icon-twitch-with-circle'])
								)
							) . 
							Html::rawElement('li', ['class' => 'footer__social-icon'],
								Html::rawElement('a', ['href' => 'https://www.instagram.com/explore/locations/241319129/paradox-interactive/', 'target' => '_blank'], 
									Html::rawElement('span', ['class' => 'icon icon-instagram-with-circle'])
								)
							) . 
							Html::rawElement('li', ['class' => 'footer__social-icon'],
								Html::rawElement('a', ['href' => 'https://open.spotify.com/artist/75N2nC2KNgaQ1e6bGs0wyc', 'target' => '_blank'], 
									Html::rawElement('span', ['class' => 'icon icon-spotify-with-circle'])
								)
							)
						)
					) . 
					Html::rawElement('div', ['class' => 'hide-for-small'],
						Html::rawElement('div', ['class' => 'content-asset'],
							Html::rawElement('ul', ['class' => 'footer__menu'],
								Html::rawElement('li', ['class' => 'footer__menu_link-small'],
									Html::rawElement('a', ['href' => 'https://legal.paradoxplaza.com/', 'title' => 'Terms & Policies'], 'Terms & Policies')
								) .
								Html::rawElement('li', ['class' => 'footer__menu_link-small'],
									Html::rawElement('a', ['href' => 'https://www.paradoxplaza.com/legal-static-info-ca.html', 'title' => 'Legal Information'], 'Legal Information')
								) .
								Html::rawElement('li', ['class' => 'footer__menu_link-small'],
									Html::rawElement('a', ['href' => 'https://ec.europa.eu/consumers/odr/main/index.cfm?event=main.home.chooseLanguage', 'title' => 'EU Online Dispute Resolution'], 'EU Online Dispute Resolution')
								) . 
								Html::rawElement('li', ['class' => 'footer__menu_link-small'],
									Html::rawElement('a', ['href' => 'https://www.paradoxplaza.com/faq-static-info-ca.html', 'title' => 'Frequently Asked Questions'], 'Frequently Asked Questions')
								) . 
								Html::rawElement('li', ['class' => 'footer__menu_link-small'],
									Html::rawElement('a', ['href' => 'http://www.paradoxinteractive.com/', 'title' => 'Paradox Interactive corporate website'], 'Paradox Interactive corporate website')
								)
							)
						)
					)
				) .
				Html::rawElement('div', ['class' => 'footer__legal footer-item show-for-small'],
					Html::rawElement('div', ['class' => 'content-asset'],
                        Html::rawElement('ul', ['class' => 'footer__menu'],
                            Html::rawElement('li', ['class' => 'footer__menu_link-small'],
                                Html::rawElement('a', ['href' => 'https://legal.paradoxplaza.com/', 'title' => 'Terms & Policies'], 'Terms & Policies')
                            ) .
                            Html::rawElement('li', ['class' => 'footer__menu_link-small'],
                                Html::rawElement('a', ['href' => 'https://www.paradoxplaza.com/legal-static-info-ca.html', 'title' => 'Legal Information'], 'Legal Information')
                            ) .
                            Html::rawElement('li', ['class' => 'footer__menu_link-small'],
                                Html::rawElement('a', ['href' => 'https://ec.europa.eu/consumers/odr/main/index.cfm?event=main.home.chooseLanguage', 'title' => 'EU Online Dispute Resolution'], 'EU Online Dispute Resolution')
                            ) . 
                            Html::rawElement('li', ['class' => 'footer__menu_link-small'],
                                Html::rawElement('a', ['href' => 'https://www.paradoxplaza.com/faq-static-info-ca.html', 'title' => 'Frequently Asked Questions'], 'Frequently Asked Questions')
                            ) . 
                            Html::rawElement('li', ['class' => 'footer__menu_link-small'],
                                Html::rawElement('a', ['href' => 'http://www.paradoxinteractive.com/', 'title' => 'Paradox Interactive corporate website'], 'Paradox Interactive corporate website')
                            )
                        )
					)
				)
			) 
		);

		Html::rawElement( 'div', ['class' => 'footer__copyright' ],
			Html::rawElement('div', ['class' => 'content-asset'],
				Html::rawElement('div', ['class' => 'footer__copyright-text'], '© Paradox Interactive. Trademarks belong to their respective owners. All rights reserved.') . 
				Html::rawElement('div', ['class' => 'footer__copyright-text'], 'VAT included in all prices where applicable.')
			)
		);

		Html::rawElement( 'div', ['class' => 'footer__disclaimer' ],
			Html::rawElement('div', ['class' => 'content-asset'],
				Html::rawElement('div', ['class' => 'footer__disclaimer-xsolla-container'],
					Html::rawElement('div', ['class' => 'footer__disclaimer-xsolla-image'], 
						Html::rawElement('img', ['src' => 'https://www.paradoxplaza.com/on/demandware.static/-/Sites-Paradox_US-Library/default/dwc60affbd/images/xsolla-logo-grey.svg', 'width' => '30px'])
					) . 
					Html::rawElement('div', ['class' => 'footer__disclaimer-xsolla-text'], 'Xsolla is an authorized global distributor of Paradox Interactive')
				)
			)
        );
        
        ?>

	</body>
</html>
<?php
	}

	/**
	 * Render a series of portals
	 *
	 * @param array $portals
	 */
	protected function renderPortals( array $portals ) {
		// Force the rendering of the following portals
		if ( !isset( $portals['TOOLBOX'] ) ) {
			$portals['TOOLBOX'] = true;
		}
		if ( !isset( $portals['LANGUAGES'] ) ) {
			$portals['LANGUAGES'] = true;
		}
		// Render portals
		foreach ( $portals as $name => $content ) {
			if ( $content === false ) {
				continue;
			}

			// Numeric strings gets an integer when set as key, cast back - T73639
			$name = (string)$name;

			switch ( $name ) {
				case 'SEARCH':
					break;
				case 'TOOLBOX':
					$this->renderPortal( 'tb', $this->getToolbox(), 'toolbox', 'SkinTemplateToolboxEnd' );
					Hooks::run( 'VectorAfterToolbox' );
					break;
				case 'LANGUAGES':
					if ( $this->data['language_urls'] !== false ) {
						$this->renderPortal( 'lang', $this->data['language_urls'], 'otherlanguages' );
					}
					break;
				default:
					$this->renderPortal( $name, $content );
					break;
			}
		}
	}

	/**
	 * @param string $name
	 * @param array|string $content
	 * @param null|string $msg
	 * @param null|string|array $hook
	 */
	protected function renderPortal( $name, $content, $msg = null, $hook = null ) {
		if ( $msg === null ) {
			$msg = $name;
		}
		$msgObj = $this->getMsg( $msg );
		$labelId = Sanitizer::escapeIdForAttribute( "p-$name-label" );
		?>
		<div class="portal" role="navigation" id="<?php
		echo htmlspecialchars( Sanitizer::escapeIdForAttribute( "p-$name" ) )
		?>"<?php
		echo Linker::tooltip( 'p-' . $name )
		?> aria-labelledby="<?php echo htmlspecialchars( $labelId ) ?>">
			<h3<?php $this->html( 'userlangattributes' ) ?> id="<?php echo htmlspecialchars( $labelId )
				?>"><?php
				echo htmlspecialchars( $msgObj->exists() ? $msgObj->text() : $msg );
				?></h3>
			<div class="body">
				<?php
				if ( is_array( $content ) ) {
				?>
				<ul>
					<?php
					foreach ( $content as $key => $val ) {
						echo $this->makeListItem( $key, $val );
					}
					if ( $hook !== null ) {
						// Avoid PHP 7.1 warning
						$skin = $this;
						Hooks::run( $hook, [ &$skin, true ] );
					}
					?>
				</ul>
				<?php
				} else {
					// Allow raw HTML block to be defined by extensions
					echo $content;
				}

				$this->renderAfterPortlet( $name );
				?>
			</div>
		</div>
	<?php
	}

	/**
	 * Render one or more navigations elements by name, automatically reversed by css
	 * when UI is in RTL mode
	 *
	 * @param array $elements
	 */
	protected function renderNavigation( array $elements ) {
		// Render elements
		foreach ( $elements as $name => $element ) {
			switch ( $element ) {
				case 'NAMESPACES':
					?>
					<div id="p-namespaces" role="navigation" class="vectorTabs<?php
					if ( count( $this->data['namespace_urls'] ) == 0 ) {
						echo ' emptyPortlet';
					}
					?>" aria-labelledby="p-namespaces-label">
						<h3 id="p-namespaces-label"><?php $this->msg( 'namespaces' ) ?></h3>
						<ul<?php $this->html( 'userlangattributes' ) ?>>
							<?php
							foreach ( $this->data['namespace_urls'] as $key => $item ) {
								echo $this->makeListItem( $key, $item, [
									'vector-wrap' => true,
								] );
							}
							?>
						</ul>
					</div>
					<?php
					break;
				case 'VARIANTS':
					?>
					<div id="p-variants" role="navigation" class="vectorMenu<?php
					if ( count( $this->data['variant_urls'] ) == 0 ) {
						echo ' emptyPortlet';
					}
					?>" aria-labelledby="p-variants-label">
						<?php
						// Replace the label with the name of currently chosen variant, if any
						$variantLabel = $this->getMsg( 'variants' )->text();
						foreach ( $this->data['variant_urls'] as $item ) {
							if ( isset( $item['class'] ) && stripos( $item['class'], 'selected' ) !== false ) {
								$variantLabel = $item['text'];
								break;
							}
						}
						?>
						<input type="checkbox" class="vectorMenuCheckbox" aria-labelledby="p-variants-label" />
						<h3 id="p-variants-label">
							<span><?php echo htmlspecialchars( $variantLabel ) ?></span>
						</h3>
						<div class="menu">
							<ul>
								<?php
								foreach ( $this->data['variant_urls'] as $key => $item ) {
									echo $this->makeListItem( $key, $item );
								}
								?>
							</ul>
						</div>
					</div>
					<?php
					break;
				case 'VIEWS':
					?>
					<div id="p-views" role="navigation" class="vectorTabs<?php
					if ( count( $this->data['view_urls'] ) == 0 ) {
						echo ' emptyPortlet';
					}
					?>" aria-labelledby="p-views-label">
						<h3 id="p-views-label"><?php $this->msg( 'views' ) ?></h3>
						<ul<?php $this->html( 'userlangattributes' ) ?>>
							<?php
							foreach ( $this->data['view_urls'] as $key => $item ) {
								echo $this->makeListItem( $key, $item, [
									'vector-wrap' => true,
									'vector-collapsible' => true,
								] );
							}
							?>
						</ul>
					</div>
					<?php
					break;
				case 'ACTIONS':
					?>
					<div id="p-cactions" role="navigation" class="vectorMenu<?php
					if ( count( $this->data['action_urls'] ) == 0 ) {
						echo ' emptyPortlet';
					}
					?>" aria-labelledby="p-cactions-label">
						<input type="checkbox" class="vectorMenuCheckbox" aria-labelledby="p-cactions-label" />
						<h3 id="p-cactions-label"><span><?php
							$this->msg( 'vector-more-actions' )
						?></span></h3>
						<div class="menu">
							<ul<?php $this->html( 'userlangattributes' ) ?>>
								<?php
								foreach ( $this->data['action_urls'] as $key => $item ) {
									echo $this->makeListItem( $key, $item );
								}
								?>
							</ul>
						</div>
					</div>
					<?php
					break;
				case 'PERSONAL':
                    ?>
                    <?php /*

					<div id="p-personal" role="navigation" class="<?php
					if ( count( $this->data['personal_urls'] ) == 0 ) {
						echo ' emptyPortlet';
					}
					?>" aria-labelledby="p-personal-label">
						<h3 id="p-personal-label"><?php $this->msg( 'personaltools' ) ?></h3>
						<ul<?php $this->html( 'userlangattributes' ) ?>>
							<?php
							$notLoggedIn = '';

							if ( !$this->getSkin()->getUser()->isLoggedIn() &&
								User::groupHasPermission( '*', 'edit' )
							) {
								$notLoggedIn =
									Html::element( 'li',
										[ 'id' => 'pt-anonuserpage' ],
										$this->getMsg( 'notloggedin' )->text()
									);
							}

							$personalTools = $this->getPersonalTools();

							$langSelector = '';
							if ( array_key_exists( 'uls', $personalTools ) ) {
								$langSelector = $this->makeListItem( 'uls', $personalTools[ 'uls' ] );
								unset( $personalTools[ 'uls' ] );
							}

							echo $langSelector;
							echo $notLoggedIn;
							foreach ( $personalTools as $key => $item ) {
								echo $this->makeListItem( $key, $item );
							}
							?>
						</ul>
                    </div>

                    */ ?>
					<?php
					break;
				case 'SEARCH':
                    ?>
                    <?php /*
					<div id="p-search" role="search">
						<h3<?php $this->html( 'userlangattributes' ) ?>>
							<label for="searchInput"><?php $this->msg( 'search' ) ?></label>
						</h3>
						<form action="<?php $this->text( 'wgScript' ) ?>" id="searchform">
							<div<?php echo $this->config->get( 'VectorUseSimpleSearch' ) ? ' id="simpleSearch"' : '' ?>>
								<?php
								echo $this->makeSearchInput( [ 'id' => 'searchInput' ] );
								echo Html::hidden( 'title', $this->get( 'searchtitle' ) );

								echo $this->makeSearchButton(
									'fulltext',
									[ 'id' => 'mw-searchButton', 'class' => 'searchButton mw-fallbackSearchButton' ]
								);
								echo $this->makeSearchButton(
									'go',
									[ 'id' => 'searchButton', 'class' => 'searchButton' ]
								);
								?>
							</div>
						</form>
                    </div>
                    */ ?>
					<?php

					break;
			}
		}
	}

	/**
	 * @inheritDoc
	 */
	public function makeLink( $key, $item, $options = [] ) {
		$html = parent::makeLink( $key, $item, $options );
		// Add an extra wrapper because our CSS is weird
		if ( isset( $options['vector-wrap'] ) && $options['vector-wrap'] ) {
			$html = Html::rawElement( 'span', [], $html );
		}
		return $html;
	}

	/**
	 * @inheritDoc
	 */
	public function makeListItem( $key, $item, $options = [] ) {
		// For fancy styling of watch/unwatch star
		if (
			$this->config->get( 'VectorUseIconWatch' )
			&& ( $key === 'watch' || $key === 'unwatch' )
		) {
			$item['class'] = rtrim( 'icon ' . $item['class'], ' ' );
			$item['primary'] = true;
		}

		// Add CSS class 'collapsible' to links which are not marked as "primary"
		if (
			isset( $options['vector-collapsible'] ) && $options['vector-collapsible'] ) {
			$item['class'] = rtrim( 'collapsible ' . $item['class'], ' ' );
		}

		// We don't use this, prevent it from popping up in HTML output
		unset( $item['redundant'] );

		return parent::makeListItem( $key, $item, $options );
	}
}
