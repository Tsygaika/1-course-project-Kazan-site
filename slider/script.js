const images = document.querySelectorAll('.image');
const slider = document.getElementById('slider');
const sliderImage = document.getElementById('slider_image');
const length = document.querySelectorAll('.image').length;
let currentIndex = 0;

var imageElement = document.getElementById("button_left");
var imageElement2 = document.getElementById("button_right");
var imagePath;
var imagePath2;

function open_slider(index){	//фунция открытия слайдера
    currentIndex = index;
    
    const compressedPath = images[currentIndex].src.split('/')
    const imageName = compressedPath.pop(); 
    const imagefolder = compressedPath.pop(); 
    const photosPath = `photos/${imagefolder}/${imageName}`;
    sliderImage.src = photosPath;
    sliderImage.alt = photosPath;

    slider.style.display = 'block';

    if (currentIndex % length === 0){	//изменение стрелок
	imagePath = "slider/left_not_active.png";
   	imagePath2 = "slider/right.png";}
    else if (currentIndex % length === length - 1){
	imagePath = "slider/left.png";
	imagePath2 = "slider/right_not_active.png";
    }
    else{
	imagePath = "slider/left.png";
	imagePath2 = "slider/right.png";
    }

    imageElement.src = imagePath;
    imageElement2.src = imagePath2;
}

function close_slider(){	//фунция закрытия слайдера
    slider.style.display = 'none';
}

function prev_slide(){	//переключение на предыдущий слайд
    if (currentIndex % length != 0){	//изменений индекса
        currentIndex = (currentIndex - 1 + images.length) % images.length;

    	const compressedPath = images[currentIndex].src.split('/')
    	const imageName = compressedPath.pop(); 
    	const imagefolder = compressedPath.pop(); 
    	const photosPath = `photos/${imagefolder}/${imageName}`;
    	sliderImage.src = photosPath;
    	sliderImage.alt = photosPath;
    }

    if (currentIndex % length === 0){	//изменение стрелок
	imagePath = "slider/left_not_active.png";
   	imagePath2 = "slider/right.png";}
    else if (currentIndex % length === length - 1){
	imagePath = "slider/left.png";
	imagePath2 = "slider/right_not_active.png";
    }
    else{
	imagePath = "slider/left.png";
	imagePath2 = "slider/right.png";
    }

    imageElement.src = imagePath;
    imageElement2.src = imagePath2;
}

function next_slide() {	//переключение на следующий слайд
    if (currentIndex % length != length - 1){	//изменений индекса
        currentIndex = (currentIndex + 1 + images.length) % images.length;

            const compressedPath = images[currentIndex].src.split('/')
    	const imageName = compressedPath.pop(); 
    	const imagefolder = compressedPath.pop(); 
    	const photosPath = `photos/${imagefolder}/${imageName}`;
    	sliderImage.src = photosPath;
    	sliderImage.alt = photosPath;
    }

    if (currentIndex % length === 0){	//изменение стрелок
	imagePath = "slider/left_not_active.png";
   	imagePath2 = "slider/right.png";}
    else if (currentIndex % length === length - 1){
	imagePath = "slider/left.png";
	imagePath2 = "slider/right_not_active.png";
    }
    else{
	imagePath = "slider/left.png";
	imagePath2 = "slider/right.png";
    }

    imageElement.src = imagePath;
    imageElement2.src = imagePath2;
}

var keycode = "";
function getKey(e){	//проверка нажатия стрелок на клавиатуре
    keycode = e.keyCode;
    if (keycode == 37){prev_slide();}
    if (keycode == 39){next_slide();}
    if (keycode == 27){close_slider();}
}
document.onkeyup = getKey;

images.forEach((image, index)=>{	//функция, которая проверяет при нажатии по картинке вызывает функцию открытия слайдера
    image.addEventListener('click', ()=>{
        open_slider(index);
    });
});