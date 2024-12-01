let option = document.querySelector("#user_option");
let i = 1;

function uo_appear(){
    if(i){    
        option.classList.remove('invisible');
        console.log("fuck you");
        i = 0;
    }else{
        option.classList.add('invisible');
        i = 1;
    }
}
