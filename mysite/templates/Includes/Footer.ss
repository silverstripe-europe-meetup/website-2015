<% cached %>
    <footer>
        <div class="container footer-top">
            <div class="left-column">
                <a href="#top" class="logo scroll">
                    <img src="$ThemeDir/images/stripecon-logo-web.png" alt=""/>
                </a>
            </div>
            <div class="right-column">
				$SiteConfig.Tagline<div class="social"><a href="https://www.facebook.com/StripeConEU" target="_blank"><i class="fa fa-facebook" title="Facebook"></i></a><a href="https://twitter.com/StripeConEU" target="_blank"><i class="fa fa-twitter" title="Twitter"></i></a></div>
            </div>
        </div>
        <div class="container footer-main">
            <div class="left-column">
				$SiteConfig.FooterContentLeft
            </div>
            <div class="right-column">
				$SiteConfig.FooterContentRight
            </div>
        </div>
    </footer>
<% end_cached %>
<script type="application/ld+json">
{ "@context" : "http://schema.org",
  "@type" : "Organization",
  "name" : "$SiteConfig.Title",
  "url" : "https://stripecon.eu",
  "email" : "info@silverstripe-europe.org",
  "logo": "https://stripecon.eu/$ThemeDir/images/stripecon-logo-web.png",
  "sameAs" : [ "https://www.facebook.com/StripeConEU",
    "https://twitter.com/StripeConEU"]
}
</script>
