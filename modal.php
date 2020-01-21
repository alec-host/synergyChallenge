<?php
//-.check if global param is not empty.
if(isset($_REQUEST['result']) && trim($_REQUEST['result']) !=''){
	$url = trim($_REQUEST['result']);
}else{
	$url = "Url not provided";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>RESULT</title>
	<style>
		html,table {
			font-family:Calibri,Arial,Tahoma;
		}
		body{
			background-color:#D8D8D8;
		}
		table.outer {
			width:100%;
			border:0px;
			background-color:#D8D8D8;
		}
		table.inner {
			width:100%;
			border:0px;
			background-color:
		}
		table.search{
			width:100%;
			border:0px;
			border-collapse: collapse;
			border-radius: 5px;
			overflow: hidden;
			background-color:#13D0D4;			
		}			
		#td_label {
			font-size: 7em;
			font-weight: bold;
			vertical-align:top;
			color:#139CD5;
		}
		#td_label_2 {
			font-size: 3em;
			font-weight: bold;
			vertical-align:top;
			color:#139CD5;
		}		
		#input_section{
			width:100%;
		}
		input[type="text"]{
			border-radius: 5px;	
			border:0px;
			border-collapse: collapse;
			width: 100%;
			background-color:#EAEAEA;
			padding-left: 15px;
			height:55px;
			font-size:1.2em;
		}
		#inputExpandURL {
			border-radius: 5px;	
			border:1px solid #000;
			width: 50%;
			background-color:#EAEAEA;
			padding-left: 15px;
			height:40px;
			font-size:1.2em;
		}		
		input[type="button"]{
			border-radius: 5px;	
			border:0px;
			border-collapse: collapse;				
			width: 59%;
			background-color:#149CD6;
			color:#fff;
			height:55px;
			font-size:1.2em;
			font-weight:bold;
		}
		::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
			color: #BCBABB;
			opacity: 1; /* Firefox */
		}

		:-ms-input-placeholder { /* Internet Explorer 10-11 */
			color: #BCBABB;
		}

		::-ms-input-placeholder { /* Microsoft Edge */
			color: #BCBABB;
		}
	</style>	
</head>
<body>
	<body>
		<!-- start of html UI -->
		<div id="app">
			<table class="outer">
				<tr>
					<td align="center">
						<table class="inner">
							<tr><td height="50px">&nbsp;</td></tr>
							<tr>
								<td id="td_label_2" nowrap>Your Short Link</td>
							</tr>
							<tr>
								<td height="10px">&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2">
									<table class="search" cellpadding="0" cellspacing="0">
										<tr><td height="50px"></td></tr>
										<tr>
											<td align="center">
												<table id="input_section">
													<tr>
														<td>
															<input type="text" id="inputShortURL" name="inputShortURL" value="<?=$url?>" />
														</td>
														<td align="center">
															<input onClick="btnCopyURL();" type="button" id="btnCopyGeneratedURL" name="btnCopyGeneratedURL" value="Copy"/>
														</td>	
													</tr>
												</table>
											</td>
										</tr>
										<tr>
											<td height="50px">
												<input type="text" v-model="inputExpandURL" id="inputExpandURL" name="inputExpandURL"  value="<?=$url?>" placeholder="Copy The Short URL Here"/>
											</td>
											<tr>
												<td><input @click="btnExpandURL();" type="button" id="btnGenerateOriginalURL" name="btnGenerateOriginalURL" value="Expand URL!"/></td>
											</tr>
										</tr>
									</table>
								</td>
							</tr>						
						</table>
					</td>
				<tr>
			<table>
		</div>	
	</body>
	<!-- end of html UI-->
	<script>
	    /* method to implement copyclip board*/
		function btnCopyURL() {
		  /* Get the text field */
		  var copyText = document.getElementById("inputShortURL");

		  /* Select the text field */
		  copyText.select(); 
		  copyText.setSelectionRange(0, 99999); /*For mobile devices*/

		  /* Copy the text inside the text field */
		  document.execCommand("copy");

		  alert("Copied to clipboard: " + copyText.value);
		} 	
	</script>
	<!-- include vue library-->
	<script src="js/vue.js"></script>
	<!-- include the vue js app--->
	<script type="text/javascript" src="modal.js"></script>	
</html>