<html>
<head>
<title>Unselectable /either select radio button using jquery</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
function uncheck(obj) {
	
    if (obj.checked == true) 
    {
    	if(obj.id == 'r1') 
    	{
    		document.getElementById("r2").checked = false;
    		document.getElementById("r3").checked = false;
    		document.getElementById("r4").checked = false;
    		document.getElementById("r5").checked = false;
    		
    	} else if (obj.id == 'r2') {
    		
			document.getElementById("r1").checked = false;
    		document.getElementById("r3").checked = false;
    		document.getElementById("r4").checked = false;
    		document.getElementById("r5").checked = false;
			
		}  else if (obj.id == 'r3') {
			
    		document.getElementById("r1").checked = false;
    		document.getElementById("r2").checked = false;
    		document.getElementById("r4").checked = false;
    		document.getElementById("r5").checked = false;
    			
    	} else if (obj.id == 'r4') {
    		
			document.getElementById("r1").checked = false;
    		document.getElementById("r2").checked = false;
    		document.getElementById("r3").checked = false;
    		document.getElementById("r5").checked = false;
			
		} else if (obj.id == 'r5') {
    		
			document.getElementById("r1").checked = false;
    		document.getElementById("r2").checked = false;
    		document.getElementById("r3").checked = false;
    		document.getElementById("r4").checked = false;
			
		}
    }
    
}   
</script>

</head>
<body>
<table width="50%" cellspacing="0" border="0" align="left" id="tblDisplay" cellpading="0" style="font-family: verdana; font-size: 10px;">
	<thead>
		<tr>
			<th style="text-align: left;">
				<h4>Unselectable: What do you think about our product?</h4>
			</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td style="text-align: left;">
			<label><input type="radio" name="test">It's the best I've ever used!</label>
			</td>
		</tr>
		<tr>
			<td style="text-align: left;">
			<label><input type="radio" name="test">It's great.</label>
			</td>
		</tr>
		<tr>
			<td style="text-align: left;">
			<label><input type="radio" name="test">It's pretty good.</label>
			</td>
		</tr>
	</tbody>
</table>
<script language="javascript" type="text/javascript">
(function( $ ){

    $.fn.uncheckableRadio = function() {

        return this.each(function() {
            $(this).mousedown(function() {
                $(this).data('wasChecked', this.checked);
            });

            $(this).click(function() {
                if ($(this).data('wasChecked'))
                    this.checked = false;
            });
        });

    };

})( jQuery );

$('input[type=radio]').uncheckableRadio();     

</script>

<table width="50%" cellspacing="0" border="0" align="left" id="tblDisplay2" cellpading="0" style="font-family: verdana; font-size: 10px;">
	<thead>
		<tr>
			<th style="text-align: left;">
				<h4>Optional: Rate our product?</h4>
			</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td style="text-align: left;">
			<label><input type="radio" id="r1" onClick='javascript:uncheck(this);'>1</label>
			</td>
		</tr>
		<tr>
			<td style="text-align: left;">
			<label><input type="radio" id="r2" onClick='javascript:uncheck(this);'>2</label>
			</td>
		</tr>
		<tr>
			<td style="text-align: left;">
			<label><input type="radio" id="r3" onClick='javascript:uncheck(this);'>3</label>
			</td>
		</tr>
		<tr>
			<td style="text-align: left;">
			<label><input type="radio" id="r4" onClick='javascript:uncheck(this);'>4</label>
			</td>
		</tr>
		<tr>
			<td style="text-align: left;">
			<label><input type="radio" id="r5" onClick='javascript:uncheck(this);'>5</label>
			</td>
		</tr>
	</tbody>
</table>

</body>
</html>