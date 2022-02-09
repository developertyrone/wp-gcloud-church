

// start the popup specefic scripts

// safe to use $

jQuery(document).ready(function($) {

    var churchs = {

    	loadVals: function()

    	{

    		var shortcode = $('#_church_shortcode').text(),

    			uShortcode = shortcode;

    		

    		// fill in the gaps eg {{param}}

    		$('.church-input').each(function() {

    			var input = $(this),

    				id = input.attr('id'),

    				id = id.replace('church_', ''),		// gets rid of the church_ prefix

    				re = new RegExp("{{"+id+"}}","g");

    				

    			uShortcode = uShortcode.replace(re, input.val());

    		});

    		

    		// adds the filled-in shortcode as hidden input

    		$('#_church_ushortcode').remove();

    		$('#church-sc-form-table').prepend('<div id="_church_ushortcode" class="hidden">' + uShortcode + '</div>');

    		

    		// updates preview

    		churchs.updatePreview();

    	},

    	cLoadVals: function()

    	{

    		var shortcode = $('#_church_cshortcode').text(),

    			pShortcode = '';

    			shortcodes = '';

    		

    		// fill in the gaps eg {{param}}

    		$('.child-clone-row').each(function() {

    			var row = $(this),

    				rShortcode = shortcode;

    			

    			$('.church-cinput', this).each(function() {

    				var input = $(this),

    					id = input.attr('id'),

    					id = id.replace('church_', '')		// gets rid of the church_ prefix

    					re = new RegExp("{{"+id+"}}","g");

    					

    				rShortcode = rShortcode.replace(re, input.val());

    			});

    	

    			shortcodes = shortcodes + rShortcode + "\n";

    		});

    		

    		// adds the filled-in shortcode as hidden input

    		$('#_church_cshortcodes').remove();

    		$('.child-clone-rows').prepend('<div id="_church_cshortcodes" class="hidden">' + shortcodes + '</div>');

    		

    		// add to parent shortcode

    		this.loadVals();

    		pShortcode = $('#_church_ushortcode').text().replace('{{child_shortcode}}', shortcodes);

    		

    		// add updated parent shortcode

    		$('#_church_ushortcode').remove();

    		$('#church-sc-form-table').prepend('<div id="_church_ushortcode" class="hidden">' + pShortcode + '</div>');

    		

    		// updates preview

    		churchs.updatePreview();

    	},

    	children: function()

    	{

    		// assign the cloning plugin

    		$('.child-clone-rows').appendo({

    			subSelect: '> div.child-clone-row:last-child',

    			allowDelete: false,

    			focusFirst: false

    		});

    		

    		// remove button

    		$('.child-clone-row-remove').live('click', function() {

    			var	btn = $(this),

    				row = btn.parent();

    			

    			if( $('.child-clone-row').size() > 1 )

    			{

    				row.remove();

    			}

    			else

    			{

    				alert('You need a minimum of one row');

    			}

    			

    			return false;

    		});

    		

    		// assign jUI sortable

    		$( ".child-clone-rows" ).sortable({

				placeholder: "sortable-placeholder",

				items: '.child-clone-row'

				

			});

    	},

    	updatePreview: function()

    	{

    		if( $('#church-sc-preview').size() > 0 )

    		{

	    		var	shortcode = $('#_church_ushortcode').html(),

	    			iframe = $('#church-sc-preview'),

	    			iframeSrc = iframe.attr('src'),

	    			iframeSrc = iframeSrc.split('preview.php'),

	    			iframeSrc = iframeSrc[0] + 'preview.php';

    			

	    		// updates the src value

	    		iframe.attr( 'src', iframeSrc + '?sc=' + base64_encode( shortcode ) );

	    		

	    		// update the height

	    		$('#church-sc-preview').height( $('#church-popup').outerHeight()-42 );

    		}

    	},

    	resizeTB: function()

    	{

			var	ajaxCont = $('#TB_ajaxContent'),

				tbWindow = $('#TB_window'),

				churchPopup = $('#church-popup'),

				no_preview = ($('#_church_preview').text() == 'false') ? true : false;

			

			if( no_preview )

			{

				ajaxCont.css({

					paddingTop: 0,

					paddingLeft: 0,

					height: (tbWindow.outerHeight()-47),

					overflow: 'scroll', // IMPORTANT

					width: 560

				});

				

				tbWindow.css({

					width: ajaxCont.outerWidth(),

					marginLeft: -(ajaxCont.outerWidth()/2)

				});

				

				$('#church-popup').addClass('no_preview');

			}

			else

			{

				ajaxCont.css({

					padding: 0,

					// height: (tbWindow.outerHeight()-47),

					height: churchPopup.outerHeight()-15,

					overflow: 'hidden' // IMPORTANT

				});

				

				tbWindow.css({

					width: ajaxCont.outerWidth(),

					height: (ajaxCont.outerHeight() + 30),

					marginLeft: -(ajaxCont.outerWidth()/2),

					marginTop: -((ajaxCont.outerHeight() + 47)/2),

					top: '50%'

				});

			}

    	},

    	load: function()

    	{

    		var	churchs = this,

    			popup = $('#church-popup'),

    			form = $('#church-sc-form', popup),

    			shortcode = $('#_church_shortcode', form).text(),

    			popupType = $('#_church_popup', form).text(),

    			uShortcode = '';

    		

    		// resize TB

    		churchs.resizeTB();

    		$(window).resize(function() { churchs.resizeTB() });

    		

    		// initialise

    		churchs.loadVals();

    		churchs.children();

    		churchs.cLoadVals();

    		

    		// update on children value change

    		$('.church-cinput', form).live('change', function() {

    			churchs.cLoadVals();

    		});

    		

    		// update on value change

    		$('.church-input', form).change(function() {

    			churchs.loadVals();

    		});

    		

    		// when insert is clicked

    		$('.church-insert', form).click(function() {    		 			

    			if(window.tinyMCE)

				{

					window.tinyMCE.execInstanceCommand('content', 'mceInsertContent', false, $('#_church_ushortcode', form).html());

					tb_remove();

				}

    		});

    	}

	}

    

    // run

    $('#church-popup').livequery( function() { churchs.load(); } );

});