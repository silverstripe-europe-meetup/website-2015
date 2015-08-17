<!doctype html>
<html class="no-js" lang="$ContentLocale">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
		<title><% if $URLSegment != 'home' %>$Title &raquo; <% end_if %>$SiteConfig.Title <% if $SiteConfig.Tagline %> | $SiteConfig.Tagline<% end_if %></title>
        <% base_tag %>
		<meta name="viewport" content="width=device-width"/>
        $MetaTags('false')
		<link rel="shortcut icon" href="{$BaseURL}favicon.ico"/>
		<link rel="apple-touch-icon-precomposed" href="{$BaseURL}favicon-152.png">
		<meta name="msapplication-TileImage" content="{$BaseURL}favicon-144.png">
		<meta name="msapplication-TileColor" content="#132136">
	</head>
	<body>
		<div class="page-container">
            <% include Header %>
			<div class="layout" role="main">
                $Layout
			</div>
            <% include Footer %>
		</div>
	</body>
</html>
