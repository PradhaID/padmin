function blurInput(id){
	var elm=document.getElementById(id);
	var def=elm.defaultValue;
	if (elm.value == ''){
		elm.value = def;
		elm.style.color="#aaa";
		elm.style.fontStyle="italic";
	}
}
function focusInput(id){
	var elm=document.getElementById(id);
	var def=elm.defaultValue;
	if (elm.value == def){
		elm.value = '';
		elm.style.color="#000";
		elm.style.fontStyle="normal";
	}
}
function blurInputNumber(id){
	var elm=document.getElementById(id);
	var def=elm.defaultValue;
	if (elm.value == '' || isNaN(elm.value)){
		elm.value = def;
		elm.style.color="#aaa";
		elm.style.fontStyle="italic";
		elm.style.textAlign="left";
	}
}
function focusInputNumber(id){
	var elm=document.getElementById(id);
	var def=elm.defaultValue;
	if (elm.value == def){
		elm.value = '';
		elm.style.color="#000";
		elm.style.fontStyle="normal";
		elm.style.textAlign="right";
	}
}
function blurPassword(id){
	var elm=document.getElementById(id);
	var def=elm.defaultValue;
	if (elm.value == ''){
		elm.value = def;
		elm.style.color="#aaa";
		elm.style.fontStyle="italic";
		elm.type='text';
	}
}
function focusPassword(id){
	var elm=document.getElementById(id);
	var def=elm.defaultValue;
	if (elm.value == def){
		elm.value = '';
		elm.style.color="#000";
		elm.style.fontStyle="normal";
		elm.type='password';
	}
}