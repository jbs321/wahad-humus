(function($){
	
	$('#resetall').click(function(){
		
		var ele = $(this);
		if(ele.is(':checked')){
			$('.bootstrapguru_import').attr('data-reset','true');
    	}else{
        	$('.bootstrapguru_import').attr('data-reset','false');
    	}
	});
	
	$('.bootstrapguru_import').click(function(){
            $import_true = confirm('Are you sure to import dummy content? it will overwrite the existing data');
            if($import_true == false) return;
			
			$('.bootstrapguru_import').attr("disabled","disabled");
			
			$("html, body").animate({ scrollTop: 0 }, "slow");

            $('.import_message').html('<img src="'+this_dir+'ajax-loader.gif"> Data is being imported please be patient, it may take a few moments...');
        
		var data = {
            'action'		:	'install_demo',
			'demo'		:   $(this).attr('data-install'),
			'datareset'	:	$(this).attr('data-reset'),
        };

       // since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
        $.post(ajaxurl, data, function(response) {
            $('.import_message').html('<div class="import_message_success">'+ response +'</div>');
            //alert('Got this from the server: ' + response);
			$('.bootstrapguru_import').removeAttr("disabled");
			
			$('#resetall').attr('checked', false);
			
        });
    });
	
})(jQuery);