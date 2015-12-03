<div class="$EvenOdd talk-item" itemscope itemprop="subEvent" itemtype="http://schema.org/Event">
    <div <% if $Speaker %>itemprop="performer" itemscope="" itemtype="http://schema.org/Person"<% end_if %> class="center impression" Title="$Title">
		<span itemprop="image">$Impression.SetRatioSize(100,100)</span><br/>
		<% if $Speaker %><i itemprop="name">$Speaker</i><% end_if %>
    </div>
    <div class="center time">
		<span itemprop="startDate" content="2015-10-<% if $Day == 'Thu' %>15T<% else_if $Day == 'Fri' %>16T<% else %>17T<% end_if %>{$Start.Format('H:i')}">$Start.Format('H:i')</span><br/>
        -<br/>
        <span itemprop="endDate" content="2015-10-<% if $Day == 'Thu' %>15T<% else_if $Day == 'Fri' %>16T<% else %>17T<% end_if %>$End.Format('H:i')">$End.Format('H:i')</span><br/>
    </div>
    <div class="content">
		<% if $Room %>
            <i itemprop="location" itemscope="" itemtype="http://schema.org/Place">
				<span itemprop="name">Room $Room: $roomName</span>
                <span itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
					<meta itemprop="streetAddress" content="1 St Katharine's Way">
					<meta itemprop="addressLocality" content="London" />
					<meta itemprop="postalCode" content="E1W 1UN">
				</span>
			</i><br />
		<% else %>
			<span itemprop="location" itemscope="" itemtype="http://schema.org/Place">
				<meta itemprop="name" content="Central conference room" />
				<span itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
					<meta itemprop="streetAddress" content="1 St Katharine's Way">
					<meta itemprop="addressLocality" content="London" />
					<meta itemprop="postalCode" content="E1W 1UN">
				</span>
			</span>
		<% end_if %>
        <strong itemprop="name">$Title</strong><br/>
		$Content
		<% if $hasPresentation == 'yes' %>
			<p>
				<a href="<% if $Presentation %>$Presentation.Link<% else %>$PresentationLink<% end_if %>" target="_blank">View presentation</a>
			</p>
		<% end_if %>
		<% if $VimeoLink %>
			<p>
				<a class="fancybox vimeo fancybox.iframe"  href="https://player.vimeo.com/video/{$VimeoLink}" title="View on Vimeo">Watch it again</a>
			</p>
		<% end_if %>
    </div>
</div>
<div class="clear"></div>
