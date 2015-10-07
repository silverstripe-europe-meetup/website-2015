<% cached $URLSegment %>
    <div class="background background-$BackgroundColor">
        <div class="section-inner-container">
            <div class="section-inner">
                <div class="content typography">
                    <h3 class="section-title">$Title</h3>
                    <div class="clear"></div>
					<% if $Galleries.count %>
						<% loop $Galleries %>
                            <h3 class="center">$Title</h3>
                            <div class="center $EvenOdd gallery-item">
                                <a href="#gallery-item" data-gallery="{$ID}" Title="$Title" class="gallery-item__specific">
                                    <img src="$CoverImage.SetSize(100,100,'E0E0E0').URL" alt="$Title"/>
                                </a>
							</div>
                            <div class="clear"></div>
						<% end_loop %>
					<% end_if %>
					<div id="gallery-item"></div>
                </div>
            </div>
        </div>
    </div>
<% end_cached %>
