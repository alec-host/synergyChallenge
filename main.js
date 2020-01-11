new Vue({
	el: '#app',
	data: {
		message: "",
		/* defined app urls */
		encodeEndPoint: "http://localhost/synergy/index.php",
		decodeEndPoint: "http://localhost/synergy/index.php",
		modallURL: "http://localhost/synergy/modal.html"
	},
	
	methods : {
		/*METHOD to that accepts input URL to shorten */
		btnShortenURL: function () {		
			/* assign input value to variable input */
			var input = this.inputURL;
					
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
							console.log(obj+ "  "+obj['RESULT'] );
							/* calls MODAL & which shortened URL */
							var w=500;
							var h=500;
							var left = (screen.width/2) - (w/2);
							var tops  = (screen.height/2) - (h/2);
							/* open window & pass the encoded result */
							var newWindow = window.open(this.modallURL+'?result='+obj['RESULT'],'Result', 'toolbar=no,scrollbars=no,directories=no,status=no,resizable=no,copyhistory=no,menubar=no;location=no,width='+w+',height='+h+',top='+tops+',left='+left);
							if(window.focus){
								newWindow.focus();
							}
							return false;							
						}else{
							console.log("Request Failed");
						}
					}
				};
				xhr.open("GET", this.encodeEndPoint);
				xhr.send();
			}
		},
		openPopupWindow: function () {

		}
	}
});