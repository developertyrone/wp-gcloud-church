(function ()

{

	// create churchShortcodes plugin

	tinymce.create("tinymce.plugins.churchShortcodes",

	{

		init: function ( ed, url )

		{

			ed.addCommand("churchPopup", function ( a, params )

			{

				var popup = params.identifier;

				

				// load thickbox

				tb_show("Insert Shortcode", url + "/popup.php?popup=" + popup + "&width=" + 800);

			});

		},

		createControl: function ( btn, e )

		{

			if ( btn == "church_button" )

			{	

				var a = this;

					

				// adds the tinymce button

				btn = e.createMenuButton("church_button",

				{

					title: "Insert Shortcode",

					image: "http://img404.imageshack.us/img404/4261/iconfh.png",

					icons: false

				});

				

				// adds the dropdown to the button

				btn.onRenderMenu.add(function (c, b)

				{					

					a.addWithPopup( b, "Columns", "columns" );

					a.addWithPopup( b, "Buttons", "button" );

					a.addWithPopup( b, "Alerts", "alert" );

					a.addWithPopup( b, "Toggle Content", "toggle" );

					a.addWithPopup( b, "Tabbed Content", "tabs" );

				});

				

				return btn;

			}

			

			return null;

		},

		addWithPopup: function ( ed, title, id ) {

			ed.add({

				title: title,

				onclick: function () {

					tinyMCE.activeEditor.execCommand("churchPopup", false, {

						title: title,

						identifier: id

					})

				}

			})

		},

		addImmediate: function ( ed, title, sc) {

			ed.add({

				title: title,

				onclick: function () {

					tinyMCE.activeEditor.execCommand( "mceInsertContent", false, sc )

				}

			})

		},

		getInfo: function () {

			return {

				longname: 'church Shortcodes',

				author: '',

				authorurl: '',

				infourl: '',

				version: "1.0"

			}

		}

	});

	

	// add churchShortcodes plugin

	tinymce.PluginManager.add("churchShortcodes", tinymce.plugins.churchShortcodes);

})();