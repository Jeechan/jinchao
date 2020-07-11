<script type="text/javascript" language="javascript">
/* <![CDATA[ */
    function grin(tag) {
    	var myField;
    	tag = ' ' + tag + ' ';
        if (document.getElementById('comment') && document.getElementById('comment').type == 'textarea') {
    		myField = document.getElementById('comment');
    	} else {
    		return false;
    	}
    	if (document.selection) {
    		myField.focus();
    		sel = document.selection.createRange();
    		sel.text = tag;
    		myField.focus();
    	}
    	else if (myField.selectionStart || myField.selectionStart == '0') {
    		var startPos = myField.selectionStart;
    		var endPos = myField.selectionEnd;
    		var cursorPos = endPos;
    		myField.value = myField.value.substring(0, startPos)
    					  + tag
    					  + myField.value.substring(endPos, myField.value.length);
    		cursorPos += tag.length;
    		myField.focus();
    		myField.selectionStart = cursorPos;
    		myField.selectionEnd = cursorPos;
    	}
    	else {
    		myField.value += tag;
    		myField.focus();
    	}
    }
/* ]]> */
</script>
<a href="javascript:grin(':?:')"><img src="/wp-includes/images/smilies/icon_question.gif" alt="疑问" /></a>
<a href="javascript:grin(':razz:')"><img src="/wp-includes/images/smilies/icon_razz.gif" alt="冷笑" /></a>
<a href="javascript:grin(':sad:')"><img src="/wp-includes/images/smilies/icon_sad.gif" alt="悲伤" /></a>
<a href="javascript:grin(':evil:')"><img src="/wp-includes/images/smilies/icon_evil.gif" alt="坏蛋" /></a>
<a href="javascript:grin(':!:')"><img src="/wp-includes/images/smilies/icon_exclaim.gif" alt="感叹" /></a>
<a href="javascript:grin(':smile:')"><img src="/wp-includes/images/smilies/icon_smile.gif" alt="微笑" /></a>
<a href="javascript:grin(':oops:')"><img src="/wp-includes/images/smilies/icon_redface.gif" alt="脸红" /></a>
<a href="javascript:grin(':grin:')"><img src="/wp-includes/images/smilies/icon_biggrin.gif" alt="大笑" /></a>
<a href="javascript:grin(':eek:')"><img src="/wp-includes/images/smilies/icon_surprised.gif" alt="吃惊" /></a>
<a href="javascript:grin(':shock:')"><img src="/wp-includes/images/smilies/icon_eek.gif" alt="惊讶" /></a>
<a href="javascript:grin(':???:')"><img src="/wp-includes/images/smilies/icon_confused.gif" alt="困惑" /></a>
<a href="javascript:grin(':cool:')"><img src="/wp-includes/images/smilies/icon_cool.gif" alt="酷" /></a>
<a href="javascript:grin(':lol:')"><img src="/wp-includes/images/smilies/icon_lol.gif" alt="大声笑" /></a>
<a href="javascript:grin(':mad:')"><img src="/wp-includes/images/smilies/icon_mad.gif" alt="恼火" /></a>
<a href="javascript:grin(':twisted:')"><img src="/wp-includes/images/smilies/icon_twisted.gif" alt="古怪" /></a>
<a href="javascript:grin(':roll:')"><img src="/wp-includes/images/smilies/icon_rolleyes.gif" alt="转眼睛" /></a>
<a href="javascript:grin(':wink:')"><img src="/wp-includes/images/smilies/icon_wink.gif" alt="给眼色" /></a>
<a href="javascript:grin(':idea:')"><img src="/wp-includes/images/smilies/icon_idea.gif" alt="好主意" /></a>
<a href="javascript:grin(':arrow:')"><img src="/wp-includes/images/smilies/icon_arrow.gif" alt="箭头" /></a>
<a href="javascript:grin(':neutral:')"><img src="/wp-includes/images/smilies/icon_neutral.gif" alt="一般" /></a>
<a href="javascript:grin(':cry:')"><img src="/wp-includes/images/smilies/icon_cry.gif" alt="哭了" /></a>
<a href="javascript:grin(':mrgreen:')"><img src="/wp-includes/images/smilies/icon_mrgreen.gif" alt="绿人" /></a>
<br />