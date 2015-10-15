app.directive("hideMe", function($animate) { 
	return function (scope, element, attrs) { 
	    scope.$watch(attrs.hideMe, function(newVal) {
	    	if(newVal){
	    		$animate.addClass(element, "fade")
	    	} else {
	    		$animate.removeClass(element, "fade")
	    	}
	    })
	  }; 
});
