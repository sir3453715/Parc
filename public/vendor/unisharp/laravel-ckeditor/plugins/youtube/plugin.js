/*
* Youtube Embed Plugin
*
* @author Jonnas Fonini <contato@fonini.net>
* @version 1.0
*/
( function() {
	CKEDITOR.plugins.add( 'youtube',
	{
		lang: [ 'en', 'pt', 'ja' ],
		init: function( editor )
		{
			editor.addCommand( 'youtube', new CKEDITOR.dialogCommand( 'youtube', {
				allowedContent: 'iframe[!title,!width,!height,!src,!frameborder,!allowfullscreen]; object param[*]'
			}));

			editor.ui.addButton( 'Youtube',
			{
				label : editor.lang.youtube.button,
				toolbar : 'insert',
				command : 'youtube',
				icon : this.path + 'images/icon.png'
			});

			CKEDITOR.dialog.add( 'youtube', function ( instance )
			{
				var video;

				return {
					title : editor.lang.youtube.title,
					minWidth : 500,
					minHeight : 100,
					contents :
						[{
							id : 'youtubePlugin',
							expand : true,
							elements :
								[
								{
									type : 'hbox',
									widths : [ '70%', '15%', '15%' ],
									children :
									[
										{
											id : 'txtUrl',
											type : 'text',
											label : editor.lang.youtube.txtUrl,
											validate : function ()
											{
												if ( this.isEnabled() )
												{
													if ( !this.getValue() )
													{
														alert( editor.lang.youtube.noCode );
														return false;
													}
													else{
														video = ytVidId(this.getValue());

														if ( this.getValue().length === 0 ||  video === false)
														{
															alert( editor.lang.youtube.invalidUrl );
															return false;
														}
													}
												}
											}
										},
										{
											type : 'text',
											id : 'txtWidth',
											width : '60px',
											label : editor.lang.youtube.txtWidth,
											'default' : '640',
											validate : function ()
											{
												if ( this.getValue() )
												{
													var width = parseInt ( this.getValue() ) || 0;

													if ( width === 0 )
													{
														alert( editor.lang.youtube.invalidWidth );
														return false;	
													}
												}
												else {
													alert( editor.lang.youtube.noWidth );
													return false;
												}
											}
										},
										{
											type : 'text',
											id : 'txtHeight',
											width : '60px',
											label : editor.lang.youtube.txtHeight,
											'default' : '360',
											validate : function ()
											{
												if ( this.getValue() )
												{
													var height = parseInt ( this.getValue() ) || 0;

													if ( height === 0 )
													{
														alert( editor.lang.youtube.invalidHeight );
														return false;	
													}
												}
												else {
													alert( editor.lang.youtube.noHeight );
													return false;
												}
											}
										}
									]
								},
								{
									type : 'hbox',
									widths : [ '55%', '45%' ],
									children :
									[
										{
											id : 'txtDescription',
											type : 'text',
											label : editor.lang.youtube.txtDescription,
											validate : function ()
											{
												if ( !this.getValue() )
												{
													alert( editor.lang.youtube.notxtDescription );
													return false;
												}
											}
										},
										{
											id : 'txtStartAt',
											type : 'text',
											label : editor.lang.youtube.txtStartAt,
											validate : function ()
											{
												if ( this.getValue() )
												{
													var str = this.getValue();
													
													if ( !/^(?:(?:([01]?\d|2[0-3]):)?([0-5]?\d):)?([0-5]?\d)$/i.test( str ) )
													{
														alert( editor.lang.youtube.invalidTime );
														return false;
													}
												}
											}
										}

									]
								}
								// {
								// 	type : 'hbox',
								// 	widths : [ '55%', '45%' ],
								// 	children :
								// 	[
								// 		{
								// 			id : 'chkPrivacy',
								// 			type : 'checkbox',
								// 			label : editor.lang.youtube.chkPrivacy
								// 		}
								// 	]
								// }
							]
						}
					],
					onOk: function()
					{
						var content = '';
						var url = '//', params = [], startSecs;
						var width = this.getValueOf( 'youtubePlugin', 'txtWidth' );
						var height = this.getValueOf( 'youtubePlugin', 'txtHeight' );
						var description = this.getValueOf( 'youtubePlugin', 'txtDescription' );

						// no cookie
						url += 'www.youtube-nocookie.com/';

						// no related videos
						params.push('rel=0');

						// else {
						// 	url += 'www.youtube.com/';
						// }

						url += 'embed/' + video;

						startSecs = this.getValueOf( 'youtubePlugin', 'txtStartAt' );
						if ( startSecs ){
							var seconds = hmsToSeconds( startSecs );

							params.push('start=' + seconds);
						}
						if ( params.length > 0 )
						{
							url = url + '?' + params.join( '&' );
						}
						console.log(description);
						content = '<iframe title="' + description + '" width="' + width + '" height="' + height + '" src="' + url + '" ';
						content += 'frameborder="0" allowfullscreen></iframe>';	

						var instance = this.getParentEditor();
						console.log(content);
						instance.insertHtml( content );
					}
				};
			});
		}
	});
})();


/**
 * JavaScript function to match (and return) the video Id 
 * of any valid Youtube Url, given as input string.
 * @author: Stephan Schmitz <eyecatchup@gmail.com>
 * @url: http://stackoverflow.com/a/10315969/624466
 */
function ytVidId( url )
{
	var p = /^(?:https?:\/\/)?(?:www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))((\w|-){11})(?:\S+)?$/;
	return ( url.match( p ) ) ? RegExp.$1 : false;
}

/** 
 * Converts time in hms format to seconds only
 */
function hmsToSeconds( time )
{
	var arr = time.split(':'), s = 0, m = 1;

	while (arr.length > 0)
	{
		s += m * parseInt(arr.pop(), 10);
		m *= 60;
	}

	return s;
}
