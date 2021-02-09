var hostname = window.location.hostname;

var base_url = location.origin + '/';


function getParameterByName(name, url){
	if (!url) url = window.location.href;
	name = name.replace(/[\[\]]/g, "\\$&");
	var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
		results = regex.exec(url);
	if (!results) return null;
	if (!results[2]) return '';
	return decodeURIComponent(results[2].replace(/\+/g, " "));
}
if(typeof VueNumeric !== 'undefined'){
	Vue.use(VueNumeric.default)
}
if(typeof VueSelect !== 'undefined'){
	Vue.component('v-select', VueSelect.VueSelect);
}
