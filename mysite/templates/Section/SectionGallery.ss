<% cached $URLSegment %>
    <div class="background background-$BackgroundColor">
        <div class="section-inner-container">
            <div class="section-inner">
                <div class="content typography">
                    <h3 class="section-title">$Title</h3>
					<% if $Content %>$Content<% end_if %>
                    <div class="clear"></div>
					<% if $Galleries.count %>
						<div class="galleries">
						<% loop $Galleries %>
                            <div class="gallery-featured">
                                <h4 class="center">$Title</h4>
                                <div class="center $EvenOdd gallery-item">
                                    <a data-gallery="{$ID}" href="#section-gallery" Title="$Title"
                                       class="gallery-item__specific">
                                        <img src="$CoverImage.CroppedImage(120,120,'232730').URL" alt="$Title"/>
                                    </a>
                                </div>
                            </div>
						<% end_loop %>
						</div>
					<% end_if %>
					<div class="clear"></div>
                    <div id="gallery-item"></div>
                </div>
				<div class="clear"></div>
            </div>
        </div>
    </div>
<% end_cached %>
