
jQuery.noConflict()(function($){
	
	var $last = null;
	
	function update_toggle() {
		$last = null;
			
		if(!$('div.dis_header')) return;
		
		$('div.dis_header').click(function(){
	        $current = $(this).next();
	        $close = false;
	        if ($last) {
	            if ( $last.attr('id') != $current.attr('id') ) {
	                $last.slideToggle("slow");
	            }
	            else {
	                $close = true;                    
	            } // if
	        } // if        
	        $current.slideToggle("slow");
	        if ($close)            
	        	$last = null;
	        else   		
	    		$last = $current;		
		});		
	}
	update_toggle();
	
});