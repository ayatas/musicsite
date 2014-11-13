<script type="text/javascript">
$(function(){
	var url = $(".embeddedFrame").attr("src");	
	$(".embed_text").val('<iframe src="'+url+'" width="400" height="470"  frameborder="0"></iframe>');
});
</script>

<div class="share_dialog">
  <div class="customize-controls"
		data-bind="visible: state() == 'customising', with: embed" style=""> 
    <!-- embed code section, visible in all sizes -->
    <div class="embed_code_section">
      <div class="section_head"> Embed <span class="hint">(copy/paste this code)</span> </div>
      <div>
        <input type="text" readonly="" class="embed_text" value="">
      </div>
    </div>    
  </div>
  <div data-bind="visible: state() != 'picksize'" class="preview_section"
		style="">
    <div class="section_head">Preview of your player</div>
    <div class="player-container">
      <iframe class="embeddedFrame" seamless=""
				src="http://localhost/musicsite/artist/embeddedPlayer?album=<?=$model->slug;?>"
				style="border: 0; width: 400px; height: 470px;"></iframe>
    </div>
  </div>
</div>
