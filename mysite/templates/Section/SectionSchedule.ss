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
                        <li rel="tab3 last">Saturday</li>
                        <li class="spacer big-spacer last"></li>
					</ul>
                    <div class="tab_container">
                        <h4 class="d_active tab_drawer_heading" rel="tab1">Thursday</h4>
                        <div id="tab1" class="tab_content">
							<% if $Talks('Thu').count %>
								<% loop $Talks('Thu') %>
                                    <div class="$EvenOdd talk-item">
                                        <div class="impression" Title="$Title">
											$Impression.SetRatioSize(100,100)<br />
                                            <i>$Speaker</i>
                                        </div>
                                        <div class="center time">
                                            <i>$Start.Format('H:i')</i><br />
                                            -<br />
                                            <i>$End.Format('H:i')</i>
                                        </div>
                                        <div class="content">
                                            <strong>$Title</strong><br />
											$Content.ContextSummary(175)
                                        </div>
                                    </div>
									<div class="clear"></div>
								<% end_loop %>
							<% end_if %>
						</div>
                        <h3 class="tab_drawer_heading" rel="tab2">Friday</h3>
                        <div id="tab2" class="tab_content">
							<% if $Talks('Fri').count %>
								<% loop $Talks('Fri') %>
                                    <div class="$EvenOdd talk-item">
                                        <div class="impression" Title="$Title">
											$Impression.SetRatioSize(100,100)<br />
                                            <i>$Speaker</i>
										</div>
										<div class="center time">
											<i>$Start.Format('H:i')</i><br />
											-<br />
											<i>$End.Format('H:i')</i>
                                        </div>
                                        <div class="content">
                                            <strong>$Title</strong><br />
											$Content.ContextSummary(175)
                                        </div>
                                    </div>
									<div class="clear"></div>
								<% end_loop %>
							<% else %>
                                <div class="$EvenOdd talk-item">
                                    <div class="impression">
                                    </div>
                                    <div class="center time">
                                    </div>
                                    <div class="content">
                                        <strong>No information yet.</strong><br />
										This section will be updated as soon as possible.
                                    </div>
                                </div>
                                <div class="clear"></div>
							<% end_if %>
						</div>

                        <h3 class="tab_drawer_heading" rel="tab3">Tab 3</h3>
                        <div id="tab3" class="tab_content">
                            <h2>Tab 3 content</h2>
                            <p>Nulla eleifend felis vitae velit tristique imperdiet. Etiam nec imperdiet elit. Pellentesque sem lorem, scelerisque sed facilisis sed, vestibulum sit amet eros.</p>
                        </div>
                    </div>
                </div>
				<div class="clear"></div>

					<% if $Talks('Sat').count %>
                        <h3 class="center talk-type">Saturday</h3>
						<% loop $Talks('Sat') %>
                            <div class="center $EvenOdd talk-item silver">
                                <div class="impression-<% if $Odd %>left<% else %>right<% end_if %>" Title="$Title">
									$Impression.SetRatioSize(100,100)
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
