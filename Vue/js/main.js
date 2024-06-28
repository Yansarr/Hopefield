
// Déplacement de la barre de défilement

window.onload = function() {
    const f = document.getElementById('Barre');
    f.style.left = "50%";
    document.getElementById("Barre_label").innerHTML = "Se connecter";

}

function deplacerDroite(){
    const f = document.getElementById('Barre');
    f.style.left = "50%";
    f.style.transition = "0.5s";
    document.getElementById("Barre_label").innerHTML = "Se connecter";

}

function deplacerGauche(){
    const f = document.getElementById('Barre');
    f.style.left = "25%";
    f.style.transition = "0.5s";
    document.getElementById("Barre_label").innerHTML = "Créer un compte";
}




function lunch(ApplicationName) 
	{
		w = new ActiveXObject("WScript.Shell");
		w.run(ApplicationName);
		return true;
	}



function changeImg(){
    let nbli = document.querySelectorAll('.orbit-slide');
    let nextimg = document.querySelector('.orbit-next');
    let previmg = document.querySelector('.orbit-previous');
    let pntImg = 0;
    let nbImg = nbli.length - 1;

    nextimg.onclick = function() {
        
        if(pntImg +1 <= nbImg){

            nbli[pntImg + 1].classList.add('active');
            nbli[pntImg].classList.remove('active');
            pntImg++;

        }else{

            nbli[0].classList.add('active');
            nbli[pntImg].classList.remove('active');
            pntImg = 0;

        }
    }

    previmg.onclick = function() {

        if(pntImg - 1 >= 0){
            
            nbli[pntImg - 1].classList.add('active');
            nbli[pntImg].classList.remove('active');
            pntImg--;
            
        }else{

            nbli[nbImg].classList.add('active');
            nbli[pntImg].classList.remove('active');
            pntImg = nbImg;
        }
    }

}


function handleFiles(files) {
    var imageType = /^image\//;

    var imgbase = document.querySelectorAll(".obj");

    console.log(imgbase);
    if (imgbase != null) {
        for(let i = 0; i < imgbase.length; i++) {
            imgbase[i].remove();
        }
    }


    if (files.length == 0) {
        alert("veuillez sélectionner une image");
    }else{
        if (files.length <= 5) {
            for (var i = 0; i < files.length; i++) {
                var file = files[i];
                if (!imageType.test(file.type)) {
                    alert("veuillez sélectionner une image");
                }else{
                    // const element = document.getElementById(this.window.event.target.id);
                    // element.style.display = "none";

                    var preview = document.getElementById("upload_container_img");
                    var img = document.createElement("img");
                    img.classList.add("obj");
                    img.file = file;
                    preview.appendChild(img); 
                    var reader = new FileReader();
                    reader.onload = ( function(aImg) { 
                        return function(e) { 
                            aImg.src = e.target.result; 
                        }; 
                    })(img);
                reader.readAsDataURL(file);
                }
            }
        }else{
            alert("veuillez sélectionner seulement 5 image");
        }
    }
}




let tabs = document.querySelectorAll(".tab");
let panels = document.querySelectorAll('.info-box article');
let nextPanel = document.querySelector('.next-tab')
let prevPanel = document.querySelector('.prev-tab');
let pntTab = 0;

for(let i = 0; i < tabs.length; i++) {
    let tab = tabs[i];
    setTabHandler(tab, i);
}

function setTabHandler(tab, tabPos) {

    
    tab.onclick = function() {

        for(let i = 0; i < tabs.length; i++) {
            tabs[i].className = "";
        }
        tab.className = "active";
        for(let i = 0; i < panels.length; i++) {
            panels[i].className = '';
        }
        
        panels[tabPos].className = 'active-panel';
    }

}


function openForm() {
    document.getElementById("popupForm").style.display = "block";
}

function closeForm() {
    document.getElementById("popupForm").style.display = "none";
}


if(window.location.href == "http://localhost/programmation/IHM/Controller/description.ctrl.php") {
    const departMinutes = 59
    let temps = departMinutes * 60

    const timerElement = document.getElementById("timer")

    setInterval(() => {
        let minutes = parseInt(temps / 60, 10)
        let secondes = parseInt(temps % 60, 10)

        minutes = minutes < 10 ? "0" + minutes : minutes
        secondes = secondes < 10 ? "0" + secondes : secondes

        timerElement.innerText = `${minutes}:${secondes}`
        temps = temps <= 0 ? 0 : temps - 1
    }, 1000)
}



