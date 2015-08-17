<div class="sections" id="top">
	<% loop $LayoutSections %>
		<{$SectionHTMLTag} id="section-$URLSegment" class="section $SectionClasses">
			$LayoutSection
		</{$SectionHTMLTag}>
	<% end_loop %>
</div>
