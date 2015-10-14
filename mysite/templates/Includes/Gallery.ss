<h4>$Title</h4>
<a class="fancybox" href="$CoverImage.Link" data-fancybox-group="$Title" title="$CoverImage.Title">
	$CoverImage.CroppedImage(120,120)
</a>
<% loop $Images %>
    <a title="$Title" href="$Link" class="fancybox fancybox-media" data-fancybox-group="$Up.Title">
        $CroppedImage(120,120)
    </a>
<% end_loop %>
