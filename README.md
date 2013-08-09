#Fill It With Tweets

**FIWT** - Plugin to easily get a twitter feed on your **wordpress** website

Take all the repository in a folder and upload it on your plugin directory.

***

*All these settings are in the wordpress admin panel*

##Set a twitter api account

Go to [https://dev.twitter.com/apps](https://dev.twitter.com/apps) and create a new application.

You must provide for this plugin the **OAuth settings**, *Consumer key* and *Consumer secret*, from the new application.

You have to create <strong>your access token</strong> in the bottom of the page and write the <em>access token</em> and the <em>access token secret</em> in the plugin settings.


##Set the frontend emplacement

In the field **jQuery Selector** you have to write the selector who will be the container for your tweets. Exemple: *#tweets*

**Twitter username** is your twitter username **without the @**

**Tweets count** is the number of tweets you want to show.

**Loading message** is the message displayed when the tweets are loading.

##Create the tweet template

The tweet template works with [handlebars.js](http://handlebarsjs.com/)

You must create only an `<li>` template and it will repeat for each tweet.

There's an exemple

    <li>
        <a href="https://twitter.com/{{user.screen_name}}">
            <img alt="{{user.screen_name}}" src="{{user.profile_image_url}}" />
        </a>
        <article>{{tweet text}}</article>
    </li>
    
The data in the template is the tweet object returned. If you want to check the whole object [this pastebin](http://pastebin.com/FgLU1N66)
