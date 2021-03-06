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
		btnShortenURL: function () {		
			/* assign input value to variable input */
			var input = this.inputURL;
			/* check if input is not empty */
			if(!input){
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
							/* define window pop up params */
							var w=500;
							var h=500;
							var left = (screen.width/2) - (w/2);
							var tops  = (screen.height/2) - (h/2);
							/* open window & pass the encoded short url */
							var newWindow = window.open(this.modallURL+'?result='+obj.data.url,'Result', 'toolbar=no,scrollbars=no,directories=no,status=no,resizable=no,copyhistory=no,menubar=no;location=no,width='+w+',height='+h+',top='+tops+',left='+left);
							if(window.focus){
								newWindow.focus();
							}	
							alert(obj.data.url);
							return false;							
						}else{
							console.log("Request Failed");
						}
					}
				};
				xhr.open("GET", this.encodeEndPoint+"?myurl="+input);
				xhr.send();
			}
		},
		/* METHOD to copy shortened url to clipboard */
		btnCopyURL: function (e) {
		}
	}
});