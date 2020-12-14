// const fileImg = document.getElementById("inputImg");
// const inputVideo = document.getElementById("inputVideo");
let placement = document.getElementById("media-placement");

document.getElementById("inputImg").addEventListener('change', function() {
    let previewImg = document.querySelector("#img-preview");
    let previewMp4 = document.querySelector("#video-preview");
    const file = this.files[0];
    if (file) {
        const readSource = new FileReader();
        console.log(file.type);

        if(file.type == "video/mp4") {
            readSource.addEventListener("load", function() {
                previewMp4.setAttribute("src", this.result);
                previewImg.setAttribute("src", '');
                console.log(this.result)
            });
    
            previewMp4.style.display = "block";
            previewImg.style.display = "none";
        }
        if(file.type == "image/png" || file.type == "image/jpg" || file.type == "image/jpeg") {
            readSource.addEventListener("load", function() {
                previewImg.setAttribute("src", this.result);
                previewMp4.setAttribute("src", '');
                console.log(this.result)
            });
    
            previewImg.style.display = "block";
            previewMp4.style.display = "none";
        }
        

        
        placement.classList.remove("media-fadeout");
        placement.classList.remove("hide");
        placement.classList.add("media-fadein");
        readSource.readAsDataURL(file);

        
    } else {
        previewImg.style.display = "none";
        previewMp4.style.display = "none";
    }
});

function closemedia() {
    let previewImg = document.querySelector("#img-preview");
    let previewMp4 = document.querySelector("#video-preview");
    placement.classList.remove("media-fadein");
    placement.classList.add("media-fadeout");
    setTimeout(placement.classList.add("hide"), 2000);
    previewImg.setAttribute("src", '');
    previewMp4.setAttribute("src", '');
    
}

function search_User() { 
  let input = document.getElementById('userSearch').value 
  input=input.toLowerCase(); 
  let x = document.getElementsByClassName('userItems'); 
  document.getElementById('UserBlock').style.display = "block";
  for (i = 0; i < x.length; i++) {  
    if (!x[i].innerHTML.toLowerCase().includes(input)) { 
        x[i].style.display="none"; 
    } 
    else { 
        x[i].style.display="list-item";                  
    } 
  } 
}