<% cached $URLSegment %>
    <div class="background background-$BackgroundColor">
        <div class="section-inner-container">
            <div class="section-inner">
                <div class="content typography">
                    <h3 class="section-title">$Title</h3>
					$Content
					<% if $Sponsors('Platinum').count %>
                        <h3 class="center sponsor-type">Platinum</h3>
						<% loop $Sponsors('Platinum') %>
                            <div class="center $EvenOdd sponsor-item platinum">
                                <a href="$URL" class="logo-<% if $Odd %>left<% else %>right<% end_if %>" Title="$Title"
                                   target="_blank">
                                    <img src="$Logo.SetSize(150,150).URL" alt="$Title"/>
                                </a>

                                <div class="content-<% if $Odd %>right<% else %>left<% end_if %>">$Content.ContextSummary(450)</div>
                            </div>
                            <div class="clear"></div>
						<% end_loop %>
					<% end_if %>
					<% if $Sponsors('Gold').count %>
                        <div class="clear"></div>
                        <h3 class="center sponsor-type">Gold</h3>
						<% loop $Sponsors('Gold') %>
                            <div class="center $EvenOdd sponsor-item gold">
                                <a href="$URL" class="logo-<% if $Odd %>left<% else %>right<% end_if %>" Title="$Title"
                                   target="_blank">
                                    <img src="$Logo.SetSize(125,125).URL" alt="$Title"/>
                                </a>

                                <div class="content-<% if $Odd %>right<% else %>left<% end_if %>">$Content.ContextSummary(400)</div>
                            </div>
                            <div class="clear"></div>
						<% end_loop %>
					<% end_if %>
					<% if $Sponsors('Silver').count %>
                        <div class="clear"></div>
                        <h3 class="center sponsor-type">Silver</h3>
						<% loop $Sponsors('Silver') %>
                            <div class="center $EvenOdd sponsor-item silver">
                                <a href="$URL" class="logo-<% if $Odd %>left<% else %>right<% end_if %>" Title="$Title"
                                   target="_blank">
                                    <img src="$Logo.SetSize(100,100).URL" alt="$Title"/>
                                </a>

                                <div class="content-<% if $Odd %>right<% else %>left<% end_if %>">$Content.ContextSummary(135)</div>
                            </div>
							<% if $Even %>
                                <div class="clear"></div>
							<% end_if %>
						<% end_loop %>
					<% end_if %>
					<% if $Sponsors('Bronze').count %>
                        <div class="clear"></div>
                        <h3 class="center sponsor-type">Bronze</h3>
						<% loop $Sponsors('Bronze') %>
                            <div class="center $EvenOdd sponsor-item bronze">
                                <a href="$URL" class="logo-<% if $Odd %>left<% else %>right<% end_if %>" Title="$Title"
                                   target="_blank">
                                    <img src="$Logo.SetSize(75,75).URL" alt="$Title"/>
                                </a>

                                <div class="content-<% if $Odd %>right<% else %>left<% end_if %>">$Content.ContextSummary(100)</div>
                            </div>
							<% if $Even %>
                                <div class="clear"></div>
							<% end_if %>
						<% end_loop %>
					<% end_if %>
                    <div class="clear"></div>
					$AfterContent
                    <div class="clear"></div>
                </div>
            </div>
        </div>
    </div>
<% end_cached %>
