<div class="wrap">
	<div id="icon-plugins" class="icon32"></div>
	<h2>Fill it with tweets <small>documentation</small></h2>
	
	<br /><br />
	
	<h2>Set a twitter api account</h2>
	<p>
		Go to <a href="https://dev.twitter.com/apps" target="_blank">https://dev.twitter.com/apps</a> and create a new application.
	</p>
	<p>
		You must provide for this plugin the <strong>OAuth settings</strong>, <em>Consumer key</em> and <em>Consumer secret</em>, from the new application.
	</p>
	<p>
		You have to create <strong>Your access token</strong> in the bottom of the page and write the <em>Access token</em> and the <em>Access token secret</em> in the plugin settings.
	</p>
	
	<br /><br />
	
	<h2>Set the frontend emplacement</h2>
	<p>
		In the field <strong>jQuery Selector</strong> you have to write the selector who will be the container for your tweets. Exemple: <em>#tweets</em>
	</p>
	
	<p>
		<strong>Twitter username</strong> is your twitter username <strong>without the @</strong>
	</p>
	
	<p>
		<strong>Tweets count</strong> is the number of tweets you want to show.
	</p>
	<p>
		<strong>Loading message</strong> is the message displayed when the tweets are loading.
	</p>
	
	<br /><br />
	
	<h2>Create the template</h2>

	<h3>Helpers</h3>

	<p><strong>{{tweet ...}}</strong> - Put "tweet" before a text to convert urls, hashtags and usernames to links</p>
	<p><strong>{{timeAgo ...}}</strong> - Transform the date to a twitter like date (3 day ago)</p>
	
	<br /><br />

	<h3>Objects (most used) <small>See the full object here <a href="http://pastebin.com/FgLU1N66" target="_blank">http://pastebin.com/FgLU1N66</a></small></h3>
	
	<br /><br />
	
	<table>
		<thead>
			<tr>
				<th>Object (string to use)</th>
				<th width="80">Type</th>
				<th>Description</th>
			</tr>
		</thead>
		<tr>
			<td>created_at</td>
			<td>date</td>
			<td>format: "Fri Jun 28 04:00:33 +0000 2013" - can be use with the helper "timeago" ex.: {{timeago created_at}}</td>
		</tr>
		<tr>
			<td>text</td>
			<td>string</td>
			<td>The tweet - can be use with the helper "tweet" ex.: {{tweet text}}</td>
		</tr>
		<tr>
			<td>id</td>
			<td>int</td>
			<td>format: 350413702973380299 - the id of the tweet</td>
		</tr>
		<tr>
			<td>id_str</td>
			<td>string</td>
			<td>format: "350413702973380299" - the id of the tweet</td>
		</tr>
		<tr>
			<td>user.id</td>
			<td>int</td>
			<td>format: 189236790 - the id of the user</td>
		</tr>
		<tr>
			<td>user.id_str</td>
			<td>string</td>
			<td>format: "189236790" - the id of the user</td>
		</tr>
		<tr>
			<td>user.name</td>
			<td>string</td>
			<td>The user name</td>
		</tr>
		<tr>
			<td>user.screen_name</td>
			<td>string</td>
			<td>The user twitter name</td>
		</tr>
		<tr>
			<td>user.location</td>
			<td>string</td>
			<td>The user location</td>
		</tr>
		<tr>
			<td>user.description</td>
			<td>string</td>
			<td>The user description</td>
		</tr>
		<tr>
			<td>user.url</td>
			<td>string</td>
			<td>Twitter shorten url</td>
		</tr>
		<tr>
			<td>user.url</td>
			<td>string</td>
			<td>Twitter shorten url</td>
		</tr>
		<tr>
			<td>favorited</td>
			<td>bool</td>
			<td>if the tweet was favorited</td>
		</tr>
		<tr>
			<td>retweeted</td>
			<td>bool</td>
			<td>if the tweet was retweeted</td>
		</tr>
		<tr>
			<td>favorite_count</td>
			<td>int</td>
			<td>How many time the tweet was favorited</td>
		</tr>
		<tr>
			<td>retweet_count</td>
			<td>int</td>
			<td>How many time the tweet was favorited</td>
		</tr>
	</table>

	<br /><br />


	
</div>
