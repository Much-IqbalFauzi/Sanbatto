function showSaveBtn() {
    console.log("change")
    document.getElementById("profile-save").style.visibility = "visible";
    document.getElementById("profile-save").style.opacity = 1;
}

document.getElementById("inputPhoto").addEventListener('change', function() {
    let previewImg = document.querySelector("#img-profile");
    const file = this.files[0];
    previewImg.setAttribute("src", '');
    console.log("run")
    if (file) {
        const readSource = new FileReader();
        console.log(file.type);
        if(file.type == "image/png" || file.type == "image/jpg" || file.type == "image/jpeg") {
            readSource.addEventListener("load", function() {
                previewImg.setAttribute("src", this.result);
                console.log(this.result)
            });
            previewImg.style.display = "block";
        }
        readSource.readAsDataURL(file);
    }
    showSaveBtn();
}); 


