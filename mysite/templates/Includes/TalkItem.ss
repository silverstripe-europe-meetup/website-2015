<div class="$EvenOdd talk-item">
    <div class="center impression" Title="$Title">
		$Impression.SetRatioSize(100,100)<br/>
        <i>$Speaker</i>
    </div>
    <div class="center time">
		$Start.Format('H:i')<br/>
        -<br/>
		$End.Format('H:i')
    </div>
    <div class="content">
		<% if $Room %>
            <i>Room $Room: $roomName</i><br />
		<% end_if %>
        <strong>$Title</strong><br/>
		$Content
    </div>
</div>
<div class="clear"></div>
