<% cached $URLSegment %>
    <div class="background background-$BackgroundColor">
        <div class="section-inner-container">
            <div class="section-inner section-talks">
                <div class="content typography">
                    <h2 class="section-title">$Title</h2>

                    <div class="main-content">
						$Content
                    </div>
                    <ul class="tabs">
                        <li class="spacer big-spacer"></li>
                        <li class="active" rel="tab1">Thursday</li>
                        <li class="spacer"></li>
                        <li rel="tab2">Friday</li>
                        <li class="spacer"></li>
                        <li rel="tab3">Saturday</li>
                        <li class="spacer big-spacer last"></li>
                    </ul>
                    <div class="tab_container">
                        <h4 class="d_active tab_drawer_heading" rel="tab1">Thursday</h4>

                        <div id="tab1" class="tab_content">
							<% if $Talks('Thu').count %>
								<% loop $Talks('Thu') %>
									<% include TalkItem %>
								<% end_loop %>
							<% end_if %>
                        </div>
                        <h3 class="tab_drawer_heading" rel="tab2">Friday</h3>

                        <div id="tab2" class="tab_content">
							<% if $Talks('Fri').count %>
								<% loop $Talks('Fri') %>
									<% include TalkItem %>
								<% end_loop %>
							<% end_if %>
                        </div>

                        <h3 class="tab_drawer_heading" rel="tab3">Saturday</h3>

                        <div id="tab3" class="tab_content">
							<% if $Talks('Sat').count %>
								<% loop $Talks('Sat').GroupedBy('hour') %>
                                    <br/>
                                       <h4 class="center">$hour:00</h4>
									<% loop $Children %>
										<% include TalkItem %>
									<% end_loop %>
								<% end_loop %>
							<% end_if %>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
<% end_cached %>
