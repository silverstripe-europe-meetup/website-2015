<!doctype html>
<html class="no-js" lang="$ContentLocale">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <title><% if $URLSegment != 'home' %>$Title &raquo; <% end_if %>$SiteConfig.Title <% if $SiteConfig.Tagline %>
        | $SiteConfig.Tagline<% end_if %></title>
	<% base_tag %>
    <meta name="viewport" content="width=device-width"/>
	$MetaTags('false')
    <link rel="shortcut icon" href="{$BaseURL}favicon.ico"/>
    <link rel="apple-touch-icon-precomposed" href="{$BaseURL}favicon-152.png">
    <meta name="msapplication-TileImage" content="{$BaseURL}favicon-144.png">
    <meta name="msapplication-TileColor" content="#132136">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
</head>
<body>
<div class="page-container" itemscope itemtype="http://schema.org/BusinessEvent">
    <meta itemprop="startDate" content="2015-10-15">
    <meta itemprop="endDate" content="2015-10-17">
    <meta itemprop="doorTime" content="09:00:00">
	<% include Header %>
    <div class="layout" role="main">
		$Layout
    </div>
	<% include Footer %>
</div>
	<% if $isLive %>
    <script type="text/javascript">
        var _paq = _paq || [];
        _paq.push(['trackPageView']);
        _paq.push(['enableLinkTracking']);
        (function () {
            var u = "//piwik.stripecon.eu/";
            _paq.push(['setTrackerUrl', u + 'piwik.php']);
            _paq.push(['setSiteId', 4]);
            var d = document, g = d.createElement('script'), s = d.getElementsByTagName('script')[0];
            g.type = 'text/javascript';
            g.async = true;
            g.defer = true;
            g.src = u + 'piwik.js';
            s.parentNode.insertBefore(g, s);
        })();
    </script>
    <noscript><p><img src="//piwik.stripecon.eu/piwik.php?idsite=4" style="border:0;" alt=""/></p></noscript>
	<% end_if %>
</body>
</html>
