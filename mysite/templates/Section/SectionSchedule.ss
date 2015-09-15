<% cached $URLSegment %>
    <div class="background background-$BackgroundColor">
        <div class="section-inner-container">
            <div class="section-inner">
                <div class="content typography">
                    <h2 class="section-title">$Title</h2>
                    <div class="main-content">
						$Content
                    </div>
					<% if $Talks('Fri').count %>
                        <h3 class="center talk-type">Friday</h3>
						<% loop $Talks('Fri') %>
                            <div class="center $EvenOdd talk-item silver">
                                <div class="impression-<% if $Odd %>left<% else %>right<% end_if %>" Title="$Title">
									$Impression.PaddedImage(100,100,E0E0E0)
                                </div>

                                <div class="content-<% if $Odd %>right<% else %>left<% end_if %>">
                                    <strong>$Title</strong><br />
                                    <i>$Speaker</i><br />
                                    <i>$Start.Format('H:i')</i><br />
									$Content.ContextSummary(175)
								</div>
                            </div>
							<% if $Even %>
                                <div class="clear"></div>
							<% end_if %>
						<% end_loop %>
					<% end_if %>
					<% if $Talks('Sat').count %>
                        <h3 class="center talk-type">Saturday</h3>
						<% loop $Talks('Sat') %>
                            <div class="center $EvenOdd talk-item silver">
                                <div class="impression-<% if $Odd %>left<% else %>right<% end_if %>" Title="$Title">
                                    $Impression.PaddedImage(100,100,E0E0E0)
                                </div>
                                <div class="content-<% if $Odd %>right<% else %>left<% end_if %>">
                                    <strong>$Title</strong><br />
                                    <i>$Speaker</i><br />
                                    <i>{$Room}: $Start.Format('H:i')</i><br />
									$Content.ContextSummary(175)
                                </div>
                            </div>
							<% if $Even %>
                                <div class="clear"></div>
							<% end_if %>
						<% end_loop %>
					<% end_if %>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
    </div>
<% end_cached %>
