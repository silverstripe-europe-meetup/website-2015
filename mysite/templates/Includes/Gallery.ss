<a class="fancybox" href="$CoverImage.Link" data-fancybox-group="$Title"
   title="$CoverImage.Title">$CoverImage.PaddedImage(70,70,"232730")</a>
<% loop $Images %>
    <a title="$Title" href="$Link" class="fancybox fancybox-media" data-fancybox-group="$Up.Title">
        <img src="$PaddedImage(70,70,"232730").Link" alt="$Title.XML" itemprop="image"/>
    </a>
<% end_loop %>
