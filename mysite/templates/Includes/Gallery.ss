<h4>$Title</h4>
<a class="fancybox" href="$CoverImage.Link" data-fancybox-group="$Title"
   title="$CoverImage.Title">$CoverImage.CroppedImage(120,120,"232730")
    <i class="icon-zoom-in"></i></a>
<% loop $Images %>
    <a title="$Title" href="$Link" class="fancybox fancybox-media" data-fancybox-group="$Up.Title">
        <img src="$CroppedImage(120,120,"232730").Link" alt="$Title.XML" itemprop="image"/>
        <i class="icon-zoom-in"></i>
    </a>
<% end_loop %>
