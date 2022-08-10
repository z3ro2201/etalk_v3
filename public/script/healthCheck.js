window.onload = function(e) {
	let viewport = document.querySelector("meta[name='viewport']");
	const ws = window.localStorage;

	if(!ws.getItem('name')) ws.setItem('name', 'name');
	else console.log(ws.getItem('name'));

	if(viewport)
	{
		document.body.addEventListener('orientationchange', function() {
			viewport.content = 'width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no';

		alert('viewport');
		}, false);
	}
}