<?php session_start();
    if ( !is_writable(session_save_path()) ) {
       echo 'Session save path "'.session_save_path().'" is not writable!'; 
    }
    ini_set('display_errors', 'on'); error_reporting(-1);
     ?>
<!DOCTYPE html>
<html>
    <head>
        <title>HW-5 searchJqueryPage</title>
        <script type="text/javascript"  src="jquery.js"></script>   
        <script> 
            $(document).ready(function(){
                
                $('#jQueryButton').click(function(){
                    //alert("jQueryButton");
                     $("#jqDiv").html("This is where JQuery results will go");

                    $.ajax({
                        url: 'AJAXquery.php?',
                        type: 'get',
                        //data: { "searchName": "Tillman"},
                        data: { "searchName": document.getElementById('searchName').value},
                        success: function(response) { $("#jqDiv").html(response); }
                    });
                });
            });

        </script>  
    </head>
        
    <h3> navigation links </h3>
    <ul class ="nav-tabs" >
        <li class="tab-title"><a href="welcome.php">Tab WelcomePage</a></li> 
        <li class="tab-title"><a href="searchAjax.php">Tab SearchAjaxPage</a></li>
        <li class="tab-title"><a href="#">Tab SearchJqueryPage   <-- you are here</a></li>
    </ul>

<body>

<br/><br/><br/>
 <form id="jQueryForm" name="jQueryForm" > 
     <label>
         Name: <input type="text" name="searchName" id="searchName"/><br />
     </label>
    <input type="button" value="jQuerySearch" id="jQueryButton"/> 
</form> 
<br/>
jQuery search results
<div id="jqDiv"><h3>jQuery search results will appear here</h3></div>
<br/>
</body>
</html>