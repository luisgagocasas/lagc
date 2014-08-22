$.fn.Paginate = function(pageNumber){
	try{
		if(typeof this.loader =='undefined') this.loader = '<div style="margin-left:40%;margin-top:15%;"><img src="administrador/utilidades/paginacion/ajax-loader.gif" alt="Cargando" /></div">';
		if(typeof pageNumber == 'undefined') pageNumber=1;
		var searchQuery = $('#search').val ();
		// get the existing GET variables
		var getVars = '';
		var inputs = $('input#pagination-search');
		for(var i=0;i<inputs.size();i++){
			if(inputs[i][0].id != 'search' && inputs[i][0].id != ''){
				var getVars = getVars+'&'+inputs[i][0].id+"="+inputs[i].val();
			}
		}
		// create the params string
		var url = "componentes/com_blog/paginar_comentarios.php";
		var params = 'page='+pageNumber+'&search='+searchQuery+getVars;
		// method | url | parameters
		$(this).html(this.loader).load(url, params);
		return false;
    }
    // display the error in case of failure
    catch (e){
      alert("Can't connect to server:\n" + e.toString());
      return false;
    }
}