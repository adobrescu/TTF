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
	var response=JSON.parse(xhr.responseText);
	var div=document.getElementById("message");
	var span=document.getElementById("message_text");
	
	span.innerHTML=response[0].message;
	
	if(!response[0].status)
	{
		if(div.className.indexOf("error")==-1)
		{
			div.className+=" error";
		}
	}
	else
	{
		div.className=div.className.replace(" error", "");
	}
	div.style.display="block";
	
	
}
function closeMessage()
{
	var div=document.getElementById("message");
	div.style.display="none";
}