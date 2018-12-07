var allowedKeys = {
  76: 'l',
  65: 'a',
  77: 'm',
  65: 'a',
};

var lamaCode = ['l', 'a', 'm', 'a'];

var lamaCodePosition = 0;

document.addEventListener('keydown', function(e) {

  var key = allowedKeys[e.keyCode];
  var lamaRequiredKey = lamaCode[lamaCodePosition];
  if (key == lamaRequiredKey) {

    lamaCodePosition++;

    if (lamaCodePosition == lamaCode.length) {
      lamaCodePosition = 0;
      lamaCheats();
    }
  } else
    lamaCodePosition = 0;
});

function lamaCheats(){
	var x = document.createElement("IMG");

	var boolImage = Math.floor(Math.random()* 10)
	if(boolImage >5)
	  x.setAttribute("src", "lama.png");
	else if(boolImage <=5)
	  x.setAttribute("src", "lama.png");

	var height =  Math.floor(Math.random()*300)+50;
	x.setAttribute("width", height);
  x.setAttribute("height", height);
  x.setAttribute("alt", "Suricate");
  x.setAttribute("id", "jeje");
  document.body.appendChild(x);
  x.style.position = 'fixed';
  x.style.top = "-300px";
  x.style.left = Math.floor(Math.random()*(document.body.clientWidth - 250)) + "px";
  var pos = -300;
  var opa = 1.0;
  var id = setInterval(frame, -400);

  function frame() {
  	x.style.top = pos + 0.5 + "px";

  	pos = pos + 0.5 ;

  	if (pos >screen.height - height -300){
  	 	opa = opa -0.002;
  	  x.style.opacity = opa;
  	}

    if (pos > screen.height){
      x.remove();
      clearTimeout(id);
    }
  }
}
