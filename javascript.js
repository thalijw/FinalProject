canvas = O('logo')
context = canvas.getContext('2d')
context.font = 'bold italic 95px Georgia'
context.textBaseline = 'top'
image = new Image();
image.src = 'robin.gif'

image.onload = function(){
	gradient = context.createLienearGradient(0, 0, 0, 89)
	gradient.addColorStop(0.00 , '#faa')
	gradient.addColorStop(0.66, '#f00')
	context.fillStyle = gradient
	context.fillText( "OSU FRIENDS" , 0, 0)
	context.strokeText("OSU FRIENDS" , 0, 0)
	context.drawImage(image , 64 ,32)
}

function O(obj){
	if (typeof obj == 'object') {
		return obj
	} else {
		return document.getElementById(obj)
	}
}

function S(obj){
	return O(obj).style
}

function C(name){
	var elements = document.getElementsByTagName('*')
	var object = []
	for (var i = 0 ; i < elements.length ; ++i){
		if (elements[i].className == name)
			objects.push(elements[i])
	}
	return objects
}