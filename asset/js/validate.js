// phàn validate 
// validate trống
// validate email 
// validate password
// validate phần name ,full name lớn hơn 3 nhỏ hơn 30
// validate dung lượng của 1 file khi gửi đi 
// validate phần admin và user



// phần hiện cửa sở lỗi hay không 



// function  showError(input, message) 
// {
//     let parent = input.parentElement;
//     let small = parent.querySelector('small');
//     parent.classList.add('error')
//     small.innerText = message
// }

// function  showSuccess(input) 
// {
//     let parent = input.parentElement;
//     let small = parent.querySelector('small');
//     parent.classList.remove('error')
//     small.innerText = ''
// }

// check rỗng


// function checkRong(listInput) 
// {
//     let isEmpty = false
//     listInput.forEach(input => {
//        input.value = input.value.trim()
       
//        if(!input.value){
//         isEmpty = true;
//         showError(input, "trường này không được để trống.")

//        }else{
//         showSuccess(input)
//        }
//     });

//     return isEmpty
// }




// check email
// function  checkEmail(input) 
// {
//     const regexEmail=  /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;


//     input.value = input.value.trim()

//     let isEmail = !regexEmail.test(input.value)

//     if(regexEmail.test(input.value)){
//         showSuccess(input);
//     }else{
//         showError(input, "email không hợp lệ.")
//     }
//     return isEmail;
// }

// check lớn hơn 4 ký tự

// function  checkLength(input) {
//     input.value = input.value.trim()

//     if(input.value.length < 5){
//         showError(input, "trường này không được nhỏ hơn 5 ký tự.")
//         return true
//     }


//     showSuccess(input)
//     return false
// }
// check password

// phần gọi hàm sử dụng.

// function checklogin(e){
//     e.preventDefault();



// }



// function validateForm(e){
// // e.preventDefault();
//         let name = document.querySelector('#name_category');
//       let x = document.forms["form_category"]["name_category"].value;
//       if (x == "") {
//         showError(name, "trường này không dược bỏ trống")
//         return false;
//       }else if(x < 5){
//         showError(name, "trường này không nhỏ hơn 5 ký tự")
//         return false;
//       }else{
//         showSuccess(name,)
//         return true;
//       }
//     }


