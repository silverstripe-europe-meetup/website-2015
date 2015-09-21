<% cached %>
    <div class="header-push"></div>
    <header>
        <nav class="container">
            <a href="#top" class="logo scroll">
                <h1 <% if $SiteConfig.Logo %>style='background-image:url("$SiteConfig.Logo.SetRatioSize(176,50).URL")'<% end_if %>>$SiteConfig.Title</h1>
            </a>
            <button class="toggle-nav"><span></span></button>
            <ul class="navigation">
				<% if $LayoutSectionsMenu %>
					<% loop $LayoutSectionsMenu %>
                        <li>
                            <a class="scroll" href="$Link" title="$Title.XML">$MenuTitle</a>
                        </li>
					<% end_loop %>
				<% else %>
					<% loop $Menu(1) %>
                        <li>
                            <a class="scroll" href="$Link" title="$Title.XML">$MenuTitle</a>
                        </li>
					<% end_loop %>
				<% end_if %>
            </ul>
        </nav>
    </header>
<% end_cached %>
