<h4>$Title</h4>
<a class="fancybox" href="$CoverImage.Link" data-fancybox-group="$Title"
   title="$CoverImage.Title">$CoverImage.CroppedImage(100,100,"232730")</a>
<% loop $Images %>
    <a title="$Title" href="$Link" class="fancybox fancybox-media" data-fancybox-group="$Up.Title">
        <img src="$CroppedImage(100,100,"232730").Link" alt="$Title.XML" itemprop="image"/>
    </a>
<% end_loop %>
