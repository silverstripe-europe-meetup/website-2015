<div class="background">
    <div class="background-overlay background-$BackgroundColor"></div>
    <div class="section-inner-container">
        <div class="section-inner section-size-$Size">
            <div class="content typography">
                <h2 class="section-title">$Title</h2>
				$Content
                <div class="clear"></div>
				<% if $ContactForm.flashMessage %>
                    <p class="thankyou-message">Thank you for your submission, we will be in touch shortly.</p>
				<% end_if %>
				$ContactForm
            </div>
        </div>
    </div>
</div>
