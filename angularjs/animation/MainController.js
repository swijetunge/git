app.controller('AppCtrl', function() { 
	this.isHidden = false;
	this.fadeIt = function () {
		this.isHidden = !this.isHidden;
	}
});