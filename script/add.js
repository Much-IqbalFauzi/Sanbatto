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