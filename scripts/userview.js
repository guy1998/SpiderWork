const dropdownOptions = function(){
    let menu = document.getElementById("optionsMenu");
    // if(menu.style.height === "0vh"){
    //     menu.style.setProperty('--borderCustom', "2vw");
    //     menu.style.height = "20vh";
    //     setTimeout(()=>{
    //         document.getElementById('optionLinks').style.display = 'block';
    //     }, 500);
    // }else{
    //     document.getElementById('optionLinks').style.display = 'none';
    //     menu.style.height = "0vh";
    //     setTimeout(()=>{
    //         menu.style.setProperty('--borderCustom', "0vw");
    //     }, 450);
    // }

    if(menu.style.display == "none"){
        menu.style.display = "block";
        menu.style.setProperty('--triangleDisplay', "block");
        document.getElementById('optionLinks').style.display = 'block';
    }else{
        menu.style.display = "none";
        menu.style.setProperty('--triangleDisplay', "none");
        document.getElementById('optionLinks').style.display = 'none';
    }


}