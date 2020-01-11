var app = new Vue({
	el: '#app',
	data: {
		message: ''
	},
	
	methods : {
		btnShortenURL: function () {
			var input = this.inputURL;
			if(!input){
				alert("Field must be checked");
			}else{
				alert( input + "!");
			}
		}
	}
});