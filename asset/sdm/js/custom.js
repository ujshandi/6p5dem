/*pagination*/
  	$(document).ready(function() {
		$('#search').dataTable({
	        "sPaginationType": "full_numbers"
			});
	} );
  	
	
/*
 * checkbox
 */
function clickSubmit(){
	var checked2 = "";
	for (var i=0; i < document.form.chkboxarray.length ; i++){
		if (document.form.chkboxarray[i].checked){
			checked2 = checked2 + document.form.chkboxarray[i].value + ",";
		}else{
			
		}
	}
	if((checked2 == "") && (document.form.chkboxarray.checked == false) ){
		alert(' No list select');
	}else{
		document.form.submit();	
	}
}	