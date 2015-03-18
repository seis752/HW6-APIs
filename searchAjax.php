<?php session_start();
    if ( !is_writable(session_save_path()) ) {
       echo 'Session save path "'.session_save_path().'" is not writable!'; 
    }
    ini_set('display_errors', 'on'); error_reporting(-1);
     ?>
<!DOCTYPE html>
<html>
    <head>
        <script src="jquery.js"></script>   
        <title>HW-5 searchAjax Page</title>
    </head>
        
    <h3> navigation links </h3>
    <ul class ="nav-tabs" >
        <li class="tab-title"><a href="welcome.php">Tab WelcomePage</a></li>   
        <li class="tab-title"><a href="#">Tab SearchAjaxPage  <-- you are here</a></li>
        <li class="tab-title"><a href="searchJquery.php">Tab SearchJqueryPage</a></li>
    </ul>
<script language="javascript" type="text/javascript">
//Browser Support Code
function ajaxFunction(){
        var urlParam = document.getElementById('searchName').value;  // try B
	var ajaxRequest;  // The variable that makes Ajax possible!
	try{
		// Opera 8.0+, Firefox, Safari
		ajaxRequest = new XMLHttpRequest();
	} catch (e){
		// Internet Explorer Browsers
		try{
			ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try{
				ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e){
				// Something went wrong
				alert("Your browser broke!");
				return false;
			}
		}
	}
	// Create a function that will receive data sent from the server
	ajaxRequest.onreadystatechange = function(){
	   if(ajaxRequest.readyState == 4){
                 document.getElementById("ajDiv").innerHTML=ajaxRequest.responseText;
	    }
	}
        //ajaxRequest.open("GET", "AJAXquery.php?searchName=Tillm", true);  // always works
        ajaxRequest.open('GET', 'AJAXquery.php?searchName=' + urlParam, true);  // try B
	ajaxRequest.send(null); 
}
</script>
<body>
<!-- $searchName = $_POST['searchName'];  echo $searchName ; echo '<br />' ; -->

enter a search string, then click the AjaxSearch button
 <form id="AjaxForm" name="AjaxForm" > 
     <label>
         Name: <input type="text" name="searchName" id="searchName"/><br />
     </label>
    <input type="button" value="AjaxSearch" onclick="ajaxFunction();"/> 
</form> 
  
Ajax search results
<div id="ajDiv"><h3>AJAX search results will appear here</h3></div>



</body>
</html>