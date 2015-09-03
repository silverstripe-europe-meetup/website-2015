<div class="background" <% if $BackgroundImage %>data-parallax="scroll" data-image-src=".$BackgroundImage.URL" data-speed="0.2" data-bleed="0" <% end_if %>>
	<div class="background-overlay background-$BackgroundColor"></div>
	<div class="section-inner-container">
		<div class="section-inner section-size-$Size">
			<div class="content typography">
                <%--<h2 class="section-title">$Title</h2>--%>
                $Content
				<div class="clear"></div>
			</div>
		</div>
	</div>
</div>
