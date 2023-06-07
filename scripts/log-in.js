const activateSignUp = function(){

    const form = document.getElementById('login');
    const slogan = document.getElementById('slogan');
    const socials = document.getElementById('socials');
    const div = document.getElementById('wait');
    const signBtn = document.getElementById('directSign');
    const email = document.getElementById('contactEmail');
    const phone = document.getElementById('contactNumber');
    const spider = document.getElementById('spider');

    email.classList.add('hidden');
    phone.classList.add('hidden');
    form.classList.add('hidden');
    slogan.classList.add('hidden');
    socials.classList.add('hidden');
    div.classList.remove('waiting')
    setTimeout(() => {
        div.style.left = "48vw";
        spider.style.left = "15%";
    }, 200);
    signBtn.classList.add('hidden');
}

const activateWorkerForm = function(){
    const formWorker = document.getElementById('formWorker');
    const formEmp = document.getElementById('formEmp');
    //const formReq = document.getElementById('formReq');
    if(formEmp.style.maxHeight === '60vh'){
        formEmp.style.maxHeight = '0vh';
    }
    // if(formReq.style.maxHeight === '40vh')
    //     formReq.style.maxHeight = '0vh';
    
    if(formWorker.style.maxHeight === '60vh'){
        formWorker.style.maxHeight = '0vh';
    }
    else{
        formWorker.style.maxHeight = '60vh';
    }
}

const activateEmployeeForm = function(){
    const formWorker = document.getElementById('formWorker');
    const formEmp = document.getElementById('formEmp');
   //const formReq = document.getElementById('formReq');
    if(formWorker.style.maxHeight === '60vh'){
        formWorker.style.maxHeight = '0vh';
    }

    // if(formReq.style.maxHeight === '40vh')
    //     formReq.style.maxHeight = '0vh';
    
    if(formEmp.style.maxHeight === '60vh'){
        formEmp.style.maxHeight = '0vh';
    }
    else{
        formEmp.style.maxHeight = '60vh';
    }
}

// const activateReqForm = function(){
//     const formWorker = document.getElementById('formWorker');
//     const formEmp = document.getElementById('formEmp');
//     const formReq = document.getElementById('formReq');
//     if(formWorker.style.maxHeight === '40vh'){
//         formWorker.style.maxHeight = '0vh';
//     }

//     if(formEmp.style.maxHeight === '40vh')
//         formEmp.style.maxHeight = '0vh';
    
//     if(formReq.style.maxHeight === '40vh'){
//         formReq.style.maxHeight = '0vh';
//     }
//     else{
//         formReq.style.maxHeight = '40vh';
//     }
// }

const addExperienceField = function(){

    var experienceField = document.getElementById('readField').cloneNode(true);
    experienceField.id = '';
    experienceField.style.display = 'block';
    var insertHere = document.getElementById('seekerXp');
    insertHere.parentNode.insertBefore(experienceField, insertHere);

}

const addSchoolField = function(){

    var schoolField = document.getElementById('readField2').cloneNode(true);
    schoolField.id ='';
    schoolField.style.display = 'block';
    var insertHere = document.getElementById('seekerSchool');
    insertHere.parentNode.insertBefore(schoolField, insertHere);

}

var inputTypeNumbers = document.querySelectorAll("input[type=number]");

for (var a = 0; a < inputTypeNumbers.length; a++) {

    inputTypeNumbers[a].onwheel = function (event) {

        event.target.blur();

    };

}