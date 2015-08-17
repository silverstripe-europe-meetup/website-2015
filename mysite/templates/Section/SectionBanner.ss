<div class="background" <% if $BackgroundImage %>style="background-image: url('$BackgroundImage.URL');"<% end_if %>>
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
