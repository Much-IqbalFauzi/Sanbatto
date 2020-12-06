//file choose
const inputFile = document.getElementById("inputFile");
const previewImg = document.querySelector("#img-preview__img");
const previewMp4 = document.querySelector("#video-preview");

inputFile.addEventListener('change', function() {
    const file = this.files[0];
    console.log("hello this empty");
    if (file) {
        const readSource = new FileReader();

        try {
            readSource.addEventListener("load", function() {
                previewImg.setAttribute("src", this.result);
            });
    
            previewImg.style.display = "block";
        } catch(err) {
            console.log(err)
        }

        try {
            readSource.addEventListener("load", function() {
                previewMp4.setAttribute("src", this.result);
            });
    
            previewMp4.style.display = "block";
        } catch(err) {
            console.log(err)
        }

        
        readSource.readAsDataURL(file);
    } else {
        previewImg.style.display = "none";
    }
});