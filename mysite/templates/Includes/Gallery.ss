<h4>$Title</h4>
<a class="fancybox" href="$CoverImage.Link" data-fancybox-group="$Title" title="$CoverImage.Title">
	$CoverImage.CroppedImage(120,120)
</a>
<% loop $Images %>
    <a title="$Title" href="$Link" class="fancybox fancybox-media" data-fancybox-group="$Up.Title">
        $CroppedImage(120,120)
    </a>
<% end_loop %>
<% loop $YTVideos %>
    <a href="https://www.youtube.com/embed/{$Code}?autoplay=1" data-fancybox-group="$Up.Title"
       class="fancybox fancybox-media fancybox.iframe" title="$Title">
	<img src="http://img.youtube.com/vi/{$Code}/hqdefault.jpg" height="100" />
	</a>
<% end_loop %>
