let Q = (element) => {
	let elements = document.querySelectorAll(element);
	if(elements.length > 1) {
		return elements;
	}else{
		return document.querySelector(element);
	}
}

let All = (element) => document.querySelectorAll(element);

let postRequest = (data, path, success, error, waiting,  progress=null) => {

	let xhr = new XMLHttpRequest();

	xhr.onreadystatechange = function() {

		if(xhr.readyState === 4 && xhr.status === 200) {

			waiting.classList.remove('active');

			success(xhr.response);

		} else if(xhr.readyState !== 4) {

			waiting.classList.add('active');
		}
		if(xhr.status !== 200) {

			error(xhr);
		}


		xhr.upload.addEventListener('progress', e => {
			const purcent = e.lengthComputable? (e.loaded / e.total) * 100 : 0;
			progress(purcent)
		});
	}
	xhr.open("POST", path, true);
	xhr.responseType = "json";
	xhr.send(data);
}



function runSlider(slider, slides) {

    let isDragging = false,
    startPosition = 0,
    currentTranslate = 0,
    prevTranslate =0,
    animationID ,
    currentIndex  =0
    slides.forEach((slide, index) => {
            // Touch Events
            slide.addEventListener("touchstart", touchStart(index))
            slide.addEventListener("touchend", touchEnd);
            slide.addEventListener("touchmove", touchMove);

            // Mouse Event
            slide.addEventListener("mousedown", touchStart(index))
            slide.addEventListener("mouseup", touchEnd)
            slide.addEventListener("mousemove", touchMove)
            slide.addEventListener("mouseleave", touchEnd)
    })
    // Controller la viewport 
    window.addEventListener('resize', setPositionByIndex)
    // Desactivation du menu contextuel
    window.oncontextmenu = function(event) {
        event.preventDefault();
        event.stopPropagation();
        return false;
    }
    function getPositionX(event) {
        return event.type.includes('mouse')  ? event.pageX : event.touches[0].clientX;
    }
    function touchStart(index) {
        return function(event) {
            currentIndex = index
            startPosition = getPositionX(event);
            isDragging = true;
            animationID = requestAnimationFrame(animation)
            slider.classList.add('gradding');
        }
    }
    function touchMove(event) {
        if( isDragging ) {
        	this.classList.add('active')
            const currentPosition = getPositionX(event)
            currentTranslate = prevTranslate + currentPosition - startPosition;
        }
    }
    function touchEnd() {
        cancelAnimationFrame(animationID)
        this.classList.remove('active')
        isDragging = false;
        const movedBy = currentTranslate - prevTranslate;
        if(movedBy < -100 && currentIndex < slides.length - 1) currentIndex += 1;
        if(movedBy > 100 && currentIndex > 0) currentIndex -= 1;
        setPositionByIndex()
        slider.classList.remove('gradding');
    }
    function animation() {
        setSliderPosition();
        if(isDragging) { requestAnimationFrame(animation) }
    }

    function setPositionByIndex() {
        currentTranslate = currentIndex * -window.innerWidth;
        prevTranslate = currentTranslate;
        setSliderPosition();
    }
    function setSliderPosition() { slider.style.transform = `translateX(${currentTranslate}px)`}
}


const create = (element) => {
	return document.createElement(element);
}
const allLinks = Q("a, button")
if(allLinks !==  null && allLinks.length > 0) {
	allLinks.forEach((link) => {
		link.addEventListener("click", function() {
			this.classList.add("fliplink");
			setTimeout(() => {
				link.classList.remove("fliplink");
			},100)
		})
	});
}

const _webroot = "http://localhost/smb/";

function redirect(path) {
	location.assign(_webroot + path);
}


const parallax =  (element, distance, speed) => {
	const item = Q(element);
	item.style.transform = `translateY(${distance * speed}px)`;
}
	
function sliderBuilder(parentElement) {
	let isActive = false;
	let topPosition = 0;
	let leftPosition = 0;
	let x;
	let element;
	parentElement.forEach((el)=>{
		element = el ;
		element.addEventListener('touchstart', touchStart);

		element.addEventListener('touchmove', touchMove);

	 	element.addEventListener('touchend', touchEnd);
	});

	function touchStart (e){
		e.stopPropagation();
		isActive = true;
		leftPosition = e.touches[0].pageX - element.offsetLeft
		topPosition = e.touches[0].pageY - element.offsetTop
	}

	function touchMove(e){
		e.stopPropagation();
		if(!isActive) return;
		let t = e.touches[0]
		x = t.pageX - leftPosition;
		element.style.left = x +"px"
	}

	function touchEnd(e){
		isActive = false;
		if( x > 0) {
			element.style.left= "0px"
			element.style.transition = '0.2s'
			setTimeout((e) => {element.style.transition = '0s';},200);
		}
			
		let wid = element.getBoundingClientRect();
		let w = wid.width;
		let r = wid.right
		if(r - window.innerWidth < 0 ) {
			element.style.left = -w+window.innerWidth + 'px'
			element.style.transition = '0.2s'
			setTimeout((e) => {element.style.transition = '0s';},200);
		}
 	}
}

function zoomImage(img) {
	if(img != null ) {
		let isDown = false;
		let i = 0;
		let startX, startY;

		img.addEventListener('mousedown', function(event) {
			i++;
			if(i == 10) {
				i=1;
			}
			this.style.transform = "scale("+1+"."+ i+")";

		});

		img.addEventListener('touchstart', function(event) {

			isDown = true;
			startX = event.touches[0].clientX - this.offsetLeft;
			startY = event.touches[0].clientY - this.offsetTop;

		});

		img.addEventListener('touchend', function(event) {
			isDown = false;
			this.style.left = 0;
			this.style.top  = 0;
			this.style.transition = "0.5s";
		});

		img.addEventListener('touchmove', function(event) {

			if(!isDown)return;
			const touch =event.touches[0];
			const x = touch.clientX - startX;
			const y = touch.clientY - startY; 

			this.style.left = x + "px";
			this.style.top = y + "px";
		
		});

	}
}



const loopImage = (src) => {
	const card = document.createElement('div');
		  card.setAttribute('class', 'lauchimg');
		  card.style.background ="#1d1d1d";
		  card.style.backgroundSize = "cover";
		  card.style.backgroundRepeat = "non-repeat";
	const img = document.createElement('img');
		  img.src = src;
		  zoomImage(img)

		  card.append(img);
	const closer = document.createElement('span');
		  closer.innerHTML  = 'Fermer le zoom';
		  card.append(closer)
		  let l = Q('.lauchimg');
		  if(l == null)
		  {
		  	document.body.append(card);
		  }
	
	closer.addEventListener('click', (e) => {
		e.preventDefault();
		e.stopPropagation();
			card.remove();
			const cardview = Q('.lauchimg');
			if(cardview == null) {
				return true;
			}else{
				return false;
			}
	});
}

// PushCard
function pushUpCard(element) {

    let isStarter = false;
    let startPosition  = 0;
    let moving;
    element.addEventListener('touchstart', touchStart);
    element.addEventListener('mousedown', touchStart);
    element.addEventListener('touchmove', touchMove);
    element.addEventListener('mousemove', touchMove);
    element.addEventListener('touchend', touchEnd);
    element.addEventListener('mouseup', touchEnd);
    element.addEventListener('mouseleave', touchEnd);

    let pushRect = element.getBoundingClientRect();


   

    function touchStart(event) {
    	event.stopPropagation();
        let touch = getPositionX(event);
        element.classList.add('grab')
        isStarter = true;
        startPosition = touch.pageY - element.offsetTop
    }

    function touchMove(event) {
    	event.stopPropagation();
    	
    if(!isStarter ) return;
        let move = getPositionX(event);
      	
        moving =  move.pageY - startPosition;
        element.style.top = `${moving}px`; 
        if(moving <= 0) {
            element.style.top = "0";
            element.classList.add('not-round');
        }else {
            element.classList.remove('not-round');
        }
    }
    function touchEnd() {
        isStarter = false;
        if(moving <= 0) {
            element.style.top = "0";
            element.classList.add('not-round');
        }else {
            element.classList.remove('not-round');
        }
        element.classList.remove('grab')
        let limit = pushRect.height/2;
        if(limit > moving) {
            element.style.top ='0';
            element.style.transition = '0.5s';
            setTimeout(() => { element.style.transition = '0s';},0)
        }

        if(moving > limit) {
            let sublimit = (moving - limit)/2; 

            if(sublimit < 100) {
                element.style.top ='30vh';
                element.style.transition = '0.5s';
                setTimeout(() => { element.style.transition = '0s';},0)
            }else {
                element.style.top ='100vh';
                element.style.transition = '0.5s';
                setTimeout(() => { element.style.transition = '0s';},0);
                element.parentElement.classList.remove("active");
                element.style.top = "30vh"
            }   
        }
        element.removeAttribute('style')
    }
    function getPositionX(event) {
        return event.type.includes('mouse')  ? event : event.touches[0];
    }

}

function refresh() {
	location.reload();
}

// Radio listSheet
function listSheet(elements={}, callback) {
	let ids = elements.ids;
	let els = elements.els;
	let parent = elements.parent
	let nam = elements.name;
	let value = "vide";

	let containersheet = document.createElement('div');
		containersheet.setAttribute('class', 'wrapper-sheet');

	let cardListSheet = document.createElement("div");
		cardListSheet.setAttribute('class', 'list-sheet');
	let titleHead = document.createElement("h3")
		titleHead.innerHTML = elements.titleHead;
	cardListSheet.append(titleHead);
	
	let button = document.createElement('p');
		button.setAttribute('class', 'ui-btn');
		// button.classList.add('bc-gradient-blue')
		button.classList.add('expand')
		button.innerHTML = "Terminer";

	for(let i = 0; i < els.length; i++) {
		let boxInput = document.createElement("div");
			boxInput.setAttribute('class', 'check-input');

		let input = document.createElement("input");
			input.setAttribute('type', 'radio');
			input.setAttribute('name', nam);

			input.id = ids[i];
			input.value = els[i];

			boxInput.append(input);

		let label = document.createElement('label');
			label.setAttribute('for', ids[i]);
			label.innerHTML = "<span></span><small>"+els[i]+"</small>";
		boxInput.append(label);

		cardListSheet.append(boxInput);
		cardListSheet.append(button)

		input.addEventListener('change', function(e) {

			if(input.checked) {
				callback(input.value);
			}
		})
	}
	button.addEventListener('click', function(e) {
		containersheet.remove();
		return false
	})
	containersheet.append(cardListSheet);

	if(Q(".wrapper-sheet") == null) {
		document.body.append(containersheet);
		
	}
	containersheet.addEventListener('click', function(ev) {
		if(ev.target.className == 'wrapper-sheet') {
			containersheet.remove();
		}
	});

	// return value;
}

var Swa = function(params = {}, callback) {
	let pannel = document.createElement("div");
		pannel.setAttribute('class', 'sweet-alert');

	let subPan = document.createElement('div');
		subPan.setAttribute('class', 'swa');

	let swatitle = document.createElement('h1');
		swatitle.innerHTML = params.swaTitle;
		swatitle.setAttribute('class', 'swa-title');

	let swaMode = document.createElement('div');
		swaMode.setAttribute('class', 'swa-alert-mode');
		swaMode.setAttribute('swa-type', params.swaType);

	let swaIcon = document.createElement('span');
		swaIcon.setAttribute('class', 'swa-icon');
		swaMode.append(swaIcon);

	let swaMessage = document.createElement('small');
		swaMessage.setAttribute('class', 'message');
		swaMessage.innerHTML = params.swaMsg;

	let button = document.createElement('div');
		button.setAttribute('class', 'button');
		button.innerHTML = params.swabtnTitle;

	subPan.append(swatitle);
	subPan.append(swaMode);
	subPan.append(swaMessage);
	subPan.append(button);
	pannel.append(subPan);

	let hasBox = document.querySelector('.sweet-alert');

	if(hasBox == null) {
		document.body.append(pannel);
	}
	pannel.addEventListener('click', function(event) {
		event.preventDefault();
		event.stopPropagation();
		if(event.target.className == "sweet-alert") {
			pannel.remove();
		}
		return false;
	},false);

	button.addEventListener('click', function(event) {
		event.stopPropagation();
		callback();
		pannel.remove();
	});

	if(params.sec !== null && params.sec !== undefined) {
		setTimeout(function() {
			pannel.remove();
		},params.sec);
	}
}

var Input = function(params= {}, callback) {
	let p = params;
	let titleH =  p.titleHead != undefined ? p.titleHead : 'Sans-titre';
	let inputTpe = p.inputType != undefined ? p.inputType : 'text';
	let plhdr  = p.placeholder != undefined ? p.placeholder : 'Saisissez une valeur';
	let btntext = p.buttonTxt != undefined ? p.buttonTxt : 'Terminer';
	let valu = "";

	let panelElement = document.createElement('div');
		panelElement.setAttribute('class', 'sweet-input');

	let subPanelElement = document.createElement('div');
		subPanelElement.setAttribute('class', 'sweet-input-box');

	let panelTitle = document.createElement('div');
		panelTitle.setAttribute('class', 'sweet-input-box-title');

	let panelHead = document.createElement('h1');
		panelHead.setAttribute('class', 'sweet-title');
		panelHead.innerHTML = titleH ;
		panelTitle.append(panelHead);

		subPanelElement.append(panelTitle);

	let cardinput = document.createElement('div');
		cardinput.setAttribute('class', 'sweet-input-box-card');

	let input = document.createElement('input');
		input.setAttribute('type', inputTpe);
		input.setAttribute('placeholder', plhdr);
		cardinput.append(input);
		subPanelElement.append(cardinput);

	let cardButton = document.createElement('div');
		cardButton.setAttribute('class', 'sweet-input-button');

	let button = document.createElement('small');
		button.setAttribute('class', 'sweet-btn');
		button.innerHTML = btntext
		cardButton.append(button);


		subPanelElement.append(cardButton);

		button.addEventListener('click', function(event) {
			valu = input.value;
			let validate = callback(valu)
			if(validate) {
				panelElement.remove();
			}
			
		});

	panelElement.addEventListener('click', function(event) {
		event.preventDefault();
		event.stopPropagation();
		return false;
	})
	panelElement.append(subPanelElement);
	document.body.append(panelElement);
}
function animList(els) {
	for(let i = 0; i < els.length; i++) {
		els[i].classList.add('swa');
		els[i].style.animationDuration = "0." + (i*i) +"s";

		setTimeout(function() {
			els[i].classList.remove('swa');
		},2500)
	}
}

function animItem(el, anim) {
	el.classList.add(anim);
	el.style.animationDuration = i +"s";
}

const els = All("table tbody tr td");

animList(els);

