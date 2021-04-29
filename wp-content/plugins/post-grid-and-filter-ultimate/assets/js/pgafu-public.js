(function ( $ ) {

	"use strict";

	/* Post Filter Initialize */
	pgafu_post_filter_init();

	/* Elementor Compatibility */
	$(document).on('click', '.elementor-tab-title', function() {
		var ele_control	= $(this).attr('aria-controls');
		var filter_wrap	= $('#'+ele_control).find('.pgafu-filtr-container');

		/* Tweak for filter */
		$( filter_wrap ).each(function( index ) {
			var filter_id = $(this).attr('id');
			$('#'+filter_id).css({'visibility': 'hidden', 'opacity': 0});

			setTimeout(function() {
				if( typeof(filter_id) !== 'undefined' && filter_id != '' ) {
					$('#'+filter_id).isotope('layout');
					$('#'+filter_id).css({'visibility': 'visible', 'opacity': 1});
				}
			}, 350);
		});
	});

	/* SiteOrigin Compatibility For Accordion Panel */
	$(document).on('click', '.sow-accordion-panel', function() {

		var ele_control	= $(this).attr('data-anchor');
		var filter_wrap	= $('#accordion-content-'+ele_control).find('.pgafu-filtr-container');

		/* Tweak for filter */
		$( filter_wrap ).each(function( index ) {
			var filter_id = $(this).attr('id');

			setTimeout(function() {
				if( typeof(filter_id) !== 'undefined' && filter_id != '' ) {
					$('#'+filter_id).isotope('layout');
				}
			}, 300);
		});
	});

	/* SiteOrigin Compatibility for Tab Panel */
	$(document).on('click focus', '.sow-tabs-tab', function() {
		var sel_index	= $(this).index();
		var cls_ele		= $(this).closest('.sow-tabs');
		var tab_cnt		= cls_ele.find('.sow-tabs-panel').eq( sel_index );
		var filter_wrap	= tab_cnt.find('.pgafu-filtr-container');

		/* Tweak for filter */
		$( filter_wrap ).each(function( index ) {

			var filter_id = $(this).attr('id');

			setTimeout(function() {
				if( typeof(filter_id) !== 'undefined' && filter_id != '' ) {
					$('#'+filter_id).isotope('layout');
				}
			}, 300);
		});
	});

	/* Beaver Builder Compatibility for Accordion */
	$(document).on('click', '.fl-accordion-button, .fl-tabs-label', function() {

		var ele_control	= $(this).attr('aria-controls');
		var filter_wrap	= $('#'+ele_control).find('.pgafu-filtr-container');

		/* Tweak for filter */
		$( filter_wrap ).each(function( index ) {

			var filter_id = $(this).attr('id');

			setTimeout(function() {
				if( typeof(filter_id) !== 'undefined' && filter_id != '' ) {
					$('#'+filter_id).isotope('layout');
				}
			}, 300);
		});
	});

	/* Divi Builder Compatibility for Accordion & Toggle */
	$(document).on('click', '.et_pb_toggle', function() {

		if( $(this).hasClass('et_pb_toggle_open') ) {
			return false;
		}

		var filter_wrap	= $(this).find('.pgafu-filtr-container');

		/* Tweak for slick slider */
		$( filter_wrap ).each(function( index ) {

			var filter_id = $(this).attr('id');

			if( typeof(filter_id) !== 'undefined' && filter_id != '' ) {
				$('#'+filter_id).isotope('reloadItems');
				$('#'+filter_id).isotope('layout');
			}
		});
	});

	/* Divi Builder Compatibility for Tabs */
	$('.et_pb_tabs_controls li a').click( function() {
		var cls_ele		= $(this).closest('.et_pb_tabs');
		var tab_cls		= $(this).closest('li').attr('class');
		var tab_cont	= cls_ele.find('.et_pb_all_tabs .'+tab_cls);
		var filter_wrap	= tab_cont.find('.pgafu-filtr-container');

		setTimeout(function() {

			/* Tweak for slick slider */
			$( filter_wrap ).each(function( index ) {

				var filter_id = $(this).attr('id');

				if( typeof(filter_id) !== 'undefined' && filter_id != '' ) {
					$('#'+filter_id).isotope('reloadItems');
					$('#'+filter_id).isotope('layout');
				}
			});
		}, 550);
	});

	/* Fusion Builder Compatibility for Tabs */
	$(document).on('click', '.fusion-tabs li .tab-link', function() {
		var cls_ele		= $(this).closest('.fusion-tabs');
		var tab_id		= $(this).attr('href');
		var tab_cont	= cls_ele.find(tab_id);
		var filter_wrap	= tab_cont.find('.pgafu-filtr-container');

		/* Tweak for filter */
		$( filter_wrap ).each(function( index ) {

			var filter_id = $(this).attr('id');
			$('#'+filter_id).css({'visibility': 'hidden', 'opacity': 0});

			setTimeout(function() {
				if( typeof(filter_id) !== 'undefined' && filter_id != '' ) {
					$('#'+filter_id).isotope('layout');
					$('#'+filter_id).css({'visibility': 'visible', 'opacity': 1});
				}
			}, 200);
		});
	});

	/* Fusion Builder Compatibility for Toggles */
	$(document).on('click', '.fusion-accordian .panel-heading a', function() {
		var cls_ele		= $(this).closest('.fusion-accordian');
		var tab_id		= $(this).attr('href');
		var tab_cont	= cls_ele.find(tab_id);
		var filter_wrap	= tab_cont.find('.pgafu-filtr-container');

		/* Tweak for filter */
		$( filter_wrap ).each(function( index ) {

			var filter_id = $(this).attr('id');
			$('#'+filter_id).css({'visibility': 'hidden', 'opacity': 0});

			setTimeout(function() {
				if( typeof(filter_id) !== 'undefined' && filter_id != '' ) {
					$('#'+filter_id).isotope('layout');
					$('#'+filter_id).css({'visibility': 'visible', 'opacity': 1});
				}
			}, 200);
		});
	});

})(jQuery);

/* Function to Initialize Post Filter */
function pgafu_post_filter_init() {

	/* Post Filter */
	if( jQuery('.pgafu-filtr-container').length > 0) {

		jQuery( '.pgafu-filter-wrp' ).each(function( index ) {

			var filter_id			= jQuery(this).find('.pgafu-filter').attr('id');
			var filter_container	= jQuery(this).find('.pgafu-filtr-container').attr('id');
			var active_attr			= jQuery(this).find('.pgafu-filter .pgafu-active-filtr').attr('data-filter');
			
			jQuery(this).imagesLoaded()
				.progress( function( instance, image ) {
			}).done( function( instance ) {

				jQuery('#'+filter_container).isotope({
					itemSelector	: '.pgafu-post-cnt',
					filter			: active_attr,
				});

				jQuery(document).on('click', '#'+filter_id+' li', function() {
					jQuery('#'+filter_id+' .pgafu-filtr-cat').removeClass('pgafu-active-filtr');
					jQuery(this).addClass('pgafu-active-filtr');

					var filterValue = jQuery(this).attr('data-filter');
					jQuery('#'+filter_container).isotope({ filter: filterValue });
				});

			});
		});
	}
}