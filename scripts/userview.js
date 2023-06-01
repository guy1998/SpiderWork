const dropdownOptions = function(){
    let menu = document.getElementById("optionsMenu");
    if(menu.style.height === "0vh"){
        menu.style.setProperty('--borderCustom', "2vw");
        menu.style.height = "20vh";
        document.getElementById('optionLinks').style.display = 'block';
    }else{
        document.getElementById('optionLinks').style.display = 'none';
        menu.style.height = "0vh";
        setTimeout(()=>{
            menu.style.setProperty('--borderCustom', "0vw");
        }, 450);
    }


}