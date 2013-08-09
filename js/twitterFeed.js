/*
 * @sources (aide)
 * 
 * Call server twitter -> http://stackoverflow.com/questions/12916539/simplest-php-example-for-retrieving-user-timeline-with-twitter-api-version-1-1/15314662#15314662
 * 
 * Call server pour recueillir les tweets -> http://localhost:8888/twitter-feed-plugin/hook.php?username=unik_media&count=1
 * 
 * objet twitter pour le template. -> http://pastebin.com/FgLU1N66
 * 
 */

/*
 * fillItWithTweets - Jquery plugin
 * @dependances - handlebars.js - http://handlebarsjs.com/
 * @optionnel - timeAgo plugin - http://timeago.yarp.com/
 * 
 * Settings
 * @string 			username 		- Username twitter
 * @int 			count 			- Nombre de tweets
 * @string			template		- Selecteur html de la balise script pour le template ex.: $('#selecteur')
 * @bool			debug			- Pour logger dans la console les tweets 
 * @string			container		- Selecteur html pour le container (dans quoi les tweets vont) 
 * @method			afterRender		- Function après le rendu
 * @method			beforeRender	- Function avant le rendu
 * @string			messageLoading	- Message avant le load des tweets
 * 
 * Méthode d'utilisation (ce qu'il y a entre les balises script deviendront les tweets)
 * 
 * <script id="twTemplate" type="text/x-handlebars-template">
			<li>
				{{user.name}}	// élément de l'objet http://pastebin.com/FgLU1N66
			</li>
	</script>
 * 
 * Handlebars.js custom Helpers
 * Helper:			timeAgo
 * tmpl string: 	{{timeAgo created_at}}
 * utilisation:		{{timeAgo...}} et un format de date suivant le mot "timeAgo"
 * description:		Transforme n'importequel format de date en format de date twitter (ex.: il y a 3 jours)
 * 
 * Helper:			tweet
 * tmpl string:		{{tweetFormat text}}
 * utilisation:		{{tweetFormat...}} et un format de text
 * description:		transforme un texte en format tweet (transforme les urls, les hashtags et les @ en lien)
 *
 */

"use strict";

(function($) {
	$.fn.fillItWithTweets = function(options, callback) {
  
    	//this selector
    	var init,
    		template,
    		templateSource,
    		templateContext; 
  
    	// options
    	var settings = {
    		username: undefined,
    		count: 2,
    		template: undefined,
    		debug: false,
    		container: undefined,
    		afterRender: undefined,
    		beforeRender: undefined,
    		messageLoading: 'Chargement des tweets...',
    		hookUrl: 'hook.php'
    	};
    
    	// append the settings array to options
    	if(options) {
      		$.extend(settings, options);
		}
	// verifications
		if(!window.Handlebars){
			throw new Error("handlebars.js is mandatory, load the script here @ https://raw.github.com/wycats/handlebars.js/1.0.0/dist/handlebars.js - Doc: http://handlebarsjs.com/");
		}
		
		if(settings.username === undefined){
			throw new Error("You must define a username");
		}
		
		if(settings.template === undefined){
			throw new Error("You must define a template");
		}
		
		if(settings.container === undefined){
			throw new Error("You must define a container");
		}
		
		$(settings.container).text(settings.messageLoading);
		
	// requête pour obtenir les tweets
		$.post(settings.hookUrl, { username: settings.username, count: settings.count }, function(data){
		// debug console log the data received
			
			if(settings.debug){console.log(data);}
			
			templateSource = $(settings.template).prepend('{{#each tweets}}').append('{{/each}}').html();
			template = Handlebars.compile(templateSource);
			var wrapper = {tweets:data};
			var html = template(wrapper);
			
		// rendering
			$(settings.container).before(function(){
				if(settings.beforeRender !== undefined){
					if(typeof settings.beforeRender !== 'function'){
						throw new Error("The beforeRender argument must be a function");
					}
					settings.beforeRender();
				}
			}).html(html).after(function() {
				if(settings.afterRender !== undefined){
					if(typeof settings.afterRender !== 'function'){
						throw new Error("The afterRender argument must be a function");
					}
					settings.afterRender();
				}
			});
			
		}, "json");
		
	}
})(jQuery);


if(window.Handlebars){
// Timeago plugin phrases
	if($.timeago){
		jQuery.timeago.settings.strings = {
		   // environ ~= about, it's optional
		   prefixAgo: "il y a",
		   prefixFromNow: "d'ici",
		   seconds: "moins d'une minute",
		   minute: "environ une minute",
		   minutes: "environ %d minutes",
		   hour: "environ une heure",
		   hours: "environ %d heures",
		   day: "environ un jour",
		   days: "environ %d jours",
		   month: "environ un mois",
		   months: "environ %d mois",
		   year: "un an",
		   years: "%d ans"
		};
		Handlebars.registerHelper('timeAgo', function(date) {
		  	return jQuery.timeago(date);
		});
	}

/*
 * Fonctions pour parser
 * @author http://www.simonwhatley.co.uk/parsing-twitter-usernames-hashtags-and-urls-with-javascript
 */
	// parse url links
	String.prototype.twURL = function() {
		return this.replace(/[A-Za-z]+:\/\/[A-Za-z0-9-_]+\.[A-Za-z0-9-_:%&~\?\/.=]+/g, function(url) {
			return '<a href="'+url+'" target="_blank">'+url+'</a>';
		});
	};
	// parse username
	String.prototype.twUsername = function() {
		return this.replace(/[@]+[A-Za-z0-9-_]+/g, function(u) {
			var username = u.replace("@","");
			return '<a href="http://twitter.com/'+username+'" target="_blank">'+username+'</a>';
		});
	};
	// parse hashtag
	String.prototype.twHashtag = function() {
		return this.replace(/[#]+[A-Za-z0-9-_]+/g, function(t) {
			var tag = t.replace("#","%23");
			return '<a href="http://twitter.com/search?q='+tag+'" target="_blank">'+t+'</a>';
		});
	};
	String.prototype.addSlashes = function() {
		var str = this;
		return (str + '').replace(/[\\"']/g, '\\$&').replace(/\u0000/g, '\\0');
	};
/*
 * Fin des fonctions pour parser
 */
	
	Handlebars.registerHelper('tweet', function(text) {
		var tweet = text.twURL().twUsername().twHashtag();
		return new Handlebars.SafeString(tweet);
	});
	
}

