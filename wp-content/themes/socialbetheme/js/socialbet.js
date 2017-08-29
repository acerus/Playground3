(function( $ ) {

	$.fn.SocialBetVotes = function( options ) {
		options = $.extend({
			countElement: ".bets-count"
		}, options);

		return this.each(function() {
			var $element = $( this ),
				$count = $( options.countElement, $element ),
				url = "http://" + location.host + "/wp-admin/admin-ajax.php",
				id = $element.data( "id" ), // Post's ID
				action = "my_update_votes",
				data = {
					action: action,
					post_id: id
				};

				$element.on( "click", function( e ) {

          if (Cookies.get('voted') === null || Cookies.get('voted')==undefined) {
            e.preventDefault();
            $.getJSON( url, data, function( json ) {
              if( json && json.count ) {
                $count.text( json.count ); // Update the count without page refresh
              }
            });
            $(this).addClass("alreadyvoted");
            $(this).off("click").attr('href', "javascript: void(0);");
              Cookies.set('voted', 'true', { expires: 30, path: '' });

          } else {
              $(this).addClass("alreadyvoted");
              alert('Вы уже проголосовали за эту ставку');
              e.preventDefault();
          }




				});
		});
	};

})( jQuery );

(function( $ ) {
	$(function() {
        if(Cookies.get('voted')){
            $( ".gogobet" ).addClass('alreadyvoted');
        }
		if( $( ".gogobet" ).length ) {
			$( ".gogobet" ).SocialBetVotes();
		}
	});
})( jQuery );
