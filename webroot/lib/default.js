function sendForm(input)
{
	var xhr=new XMLHttpRequest();
	
	xhr.onload=function()
	{
		onResponseLoaded(this);
	}
	xhr.open("POST", input.form.action, true);
	xhr.send(new FormData(input.form));

}
function onResponseLoaded(xhr)
{
	if(xhr.readyState!=4)
	{
		return;
	}
	alert(xhr.responseText);
}