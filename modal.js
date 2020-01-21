new Vue({
	el: '#app',
	data: {
		message: "",
		/* defined app urls */
		encodeEndPoint: "http://localhost/synergy/api/encode",
		decodeEndPoint: "http://localhost/synergy/api/decode",
		modallURL: "http://localhost/synergy/modal.php"
	},
	
	methods : {
		/*METHOD to that accepts input URL to shorten */
		btnExpandURL: function () {		
			/* assign input value to variable input */
			var inputView  = this.inputExpandURL;
			/* check if input is not empty */
			if(!inputView){
				alert("Field must be checked");
				return;
			}else{
				/* XMLHTTPRQUEST AJAX */
				var xhr = new XMLHttpRequest();
				xhr.onreadystatechange = () => {	
					if(xhr.readyState === 4) {
						if(xhr.status === 200) {
							/* change json string to object */
							var obj = JSON.parse(xhr.responseText);
							/* print result to console */							
							console.log(obj);	
							alert(obj.data.expand[0].long_url);
							return false;							
						}else{
							console.log("Request Failed");
						}
					}
				};
				xhr.open("GET", this.decodeEndPoint+"?myurl="+inputView);
				xhr.send();
			}
		},
		/* METHOD to copy shortened url to clipboard */
		btnCopyURL: function (e) {
		}
	}
});