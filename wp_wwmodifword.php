<?php
/*
Plugin Name: Modify Word
Plugin URI: http://webwoke.com/wp-plugins/modify-word-solving-problem-in-mod_security.html
Description: Plugins for modify some word from text, this plugins created due to some mod_security rule that not allow any special word in POST/GET Action 
Author: Harry Sudana, I Nym
Version: 1.0.3.2
Author URI: http://webwoke.com/
*/

/*  Copyright 2009  Harry Sudana, I Nym  (email : harrysudana@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

class ww_modifword{
	function ww_modifword(){
		add_action( 'admin_head', array(&$this, 'jQcontent'),1000 );
	}
	
	function jQcontent(){
		?>
         
<script type="text/javascript"> 
jQuery(document).ready(function(){    
    jQuery("#post").submit(function() {
		var content = jQuery("#content").text();
		var patt1 = /(\s|\>|\b)select(\s|\<|\b)|(\s|\b|\>)grant(\s|\<|\b)|(\b|\s|\>)delete(\s|\<|\b)|(\b|\s|\>)insert(\s|\<|\b)|(\b|\s|\>)drop(\s|\<|\b)|(\b|\s|\>)do(\s|\<|\b)|(\b|\s|\>)alter(\s|\<|\b)|(\s|\>|\b)replace(\s|\<|\b)|(\s|\b|\>)truncate(\s|\<|\b)|(\b|\s|\>)update(\s|\<|\b)|(\b|\s|\>)create(\s|\<|\b)|(\b|\s|\>)rename(\s|\<|\b)|(\b|\s|\>)describe(\s|\<|\b)|(\b|\s|\>)from(\s|\<|\b)|(\s|\b|\>)into(\s|\<|\b)|(\b|\s|\>)table(\s|\<|\b)|(\b|\s|\>)database(\s|\<|\b)|(\b|\s|\>)index(\s|\<|\b)|(\b|\s|\>)view(\s|\<|\b)|(\b|\s|\>)union(\s|\<|\b)/ig;
		var strmatch = content.match(patt1);
		for($i=0;$i<strmatch.length;$i++){
			content = content.replace(strmatch[$i], function addtag(w){ return(w.substr(0,2)+'<!---->'+w.substr(2,w.length)) } );
		}
		jQuery("#content").text(content);
        return true;
    });
  });
</script> 
        
		<?php
	}
}

$wwmodifword = new ww_modifword();

?>