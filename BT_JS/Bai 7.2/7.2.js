let inputArr = document.querySelectorAll(".input-answer");
    let inputSubmit = document.querySelector(".submit");
inputSubmit.onclick = (e)=>{
    // alert('hsde')
    e.preventDefault()

    inputArr.forEach(function(item){
        if(item.checked == true){
            item.parentElement.classList.add('false-color')
            inputArr[3].parentElement.classList.add('true-color')
        }else{
            item.parentElement.classList.remove('false-color')
        }
        
    })

    
}
