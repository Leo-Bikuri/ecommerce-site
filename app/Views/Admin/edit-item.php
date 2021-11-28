<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
.clearfix:after {
    content: "";
    display: block;
    clear: both;
    visibility: hidden;
    height: 0;
}
.form_wrapper {
    background: rgb(13, 19, 25);
    width: 400px;
    max-width: 100%;
    box-sizing: border-box;
    padding: 25px;
    margin: 8% auto 5%;
    position: relative;
    z-index: 1;
    border-top: 5px solid #ff6700;
    -webkit-box-shadow: 0 0 3px rgba(0, 0, 0, 0.1);
    -moz-box-shadow: 0 0 3px rgba(0, 0, 0, 0.1);
    box-shadow: 0 0 3px rgba(0, 0, 0, 0.1);
    -webkit-transform-origin: 50% 0%;
    transform-origin: 50% 0%;
    -webkit-transform: scale3d(1, 1, 1);
    transform: scale3d(1, 1, 1);
    -webkit-transition: none;
    transition: none;
    -webkit-animation: expand 0.8s 0.6s ease-out forwards;
    animation: expand 0.8s 0.6s ease-out forwards;
    opacity: 0;
}
.form_wrapper h2 {
    font-size: 1.5em;
    line-height: 1.5em;
    margin: 0;
}
.form_wrapper .title_container {
    text-align: center;
    padding-bottom: 15px;
}
.form_wrapper h3 {
    font-size: 1.1em;
    font-weight: normal;
    line-height: 1.5em;
    margin: 0;
}
.form_wrapper label {
    font-size: 14px;
}
.form_wrapper .row {
    margin: 10px -15px;
}
.form_wrapper .row > div {
    padding: 0 15px;
    box-sizing: border-box;
}
.form_wrapper .col_half {
    width: 50%;
    float: left;
}
.form_wrapper .input_field {
    position: relative;
    margin-bottom: 20px;
    -webkit-animation: bounce 0.6s ease-out;
    animation: bounce 0.6s ease-out;
}
.form_wrapper .input_field > span {
    position: absolute;
    left: 0;
    top: 0;
    color: #333;
    height: 34px;
    border-right: 1px solid #ccc;
    text-align: center;
    width: 30px;
}
.form_wrapper .input_field > span > i {
    padding-top: 10px;
}
.form_wrapper .textarea_field > span > i {
    padding-top: 10px;
}
.form_wrapper input[type="text"], .form_wrapper input[type="email"], .form_wrapper input[type="password"] {
    width: 100%;
    padding: 8px 10px 9px 35px;
    height: 35px;
    border: 1px solid #ccc;
    box-sizing: border-box;
    outline: none;
    -webkit-transition: all 0.3s ease-in-out;
    -moz-transition: all 0.3s ease-in-out;
    -ms-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
}
.form_wrapper input[type="text"]:hover, .form_wrapper input[type="email"]:hover, .form_wrapper input[type="password"]:hover {
    background: #fafafa;
}
.form_wrapper input[type="text"]:focus, .form_wrapper input[type="email"]:focus, .form_wrapper input[type="password"]:focus, .form_wrapper textarea:focus {
    border: 1px solid #ff6700;
    background: #fafafa;
}
.form_wrapper textarea{
    width: 100%;
    padding: 0 0 0 15px;
    border: 1px solid #ccc;
    box-sizing: border-box;
    outline: none;
    -webkit-transition: all 0.3s ease-in-out;
    -moz-transition: all 0.3s ease-in-out;
    -ms-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
}
.form_wrapper input[type="submit"] {
    background: #ff6700;
    height: 35px;
    line-height: 35px;
    width: 100%;
    border: none;
    outline: none;
    cursor: pointer;
    color: #fff;
    font-size: 1.1em;
    -webkit-transition: all 0.3s ease-in-out;
    -moz-transition: all 0.3s ease-in-out;
    -ms-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
}
.form_wrapper input[type="submit"]:hover {
    background: orange;
}
.form_wrapper input[type="submit"]:focus {
    background: orange;
}
.form_container .row .col_half.last {
    border-left: 1px solid #ccc;
}
.checkbox_option label {
    margin-right: 1em;
    position: relative;
}
.checkbox_option label:before {
    content: "";
    display: inline-block;
    width: 0.5em;
    height: 0.5em;
    margin-right: 0.5em;
    vertical-align: -2px;
    border: 2px solid #ccc;
    padding: 0.12em;
    background-color: transparent;
    background-clip: content-box;
    transition: all 0.2s ease;
}
.checkbox_option label:after {
    border-right: 2px solid #000;
    border-top: 2px solid #000;
    content: "";
    height: 20px;
    left: 2px;
    position: absolute;
    top: 7px;
    transform: scaleX(-1) rotate(135deg);
    transform-origin: left top;
    width: 7px;
    display: none;
}
.checkbox_option input:hover + label:before {
    border-color: #000;
}
.checkbox_option input:checked + label:before {
    border-color: #000;
}
.checkbox_option input:checked + label:after {
    -moz-animation: check 0.8s ease 0s running;
    -webkit-animation: check 0.8s ease 0s running;
    animation: check 0.8s ease 0s running;
    display: block;
    width: 7px;
    height: 20px;
    border-color: #000;
}
.radio_option label {
    margin-right: 1em;
}
.radio_option label:before {
    content: "";
    display: inline-block;
    width: 0.5em;
    height: 0.5em;
    margin-right: 0.5em;
    border-radius: 100%;
    vertical-align: -3px;
    border: 2px solid #ccc;
    padding: 0.15em;
    background-color: transparent;
    background-clip: content-box;
    transition: all 0.2s ease;
}
.radio_option input:hover + label:before {
    border-color: #000;
}
.radio_option input:checked + label:before {
    background-color: #000;
    border-color: #000;
}
.select_option {
    position: relative;
    width: 100%;
}
.select_option select {
    display: inline-block;
    width: 100%;
    height: 35px;
    padding: 0px 15px;
    cursor: pointer;
    color: #7b7b7b;
    border: 1px solid #ccc;
    border-radius: 0;
    background: #fff;
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    transition: all 0.2s ease;
}
.select_option select::-ms-expand {
    display: none;
}
.select_option select:hover, .select_option select:focus {
    color: #000;
    background: #fafafa;
    border-color: #000;
    outline: none;
}
.select_arrow {
    position: absolute;
    top: calc(50% - 4px);
    right: 15px;
    width: 0;
    height: 0;
    pointer-events: none;
    border-width: 8px 5px 0 5px;
    border-style: solid;
    border-color: #7b7b7b transparent transparent transparent;
}
.select_option select:hover + .select_arrow, .select_option select:focus + .select_arrow {
    border-top-color: #000;
}
@-webkit-keyframes check {
    0% {
        height: 0;
        width: 0;
   }
    25% {
        height: 0;
        width: 7px;
   }
    50% {
        height: 20px;
        width: 7px;
   }
}
@keyframes check {
    0% {
        height: 0;
        width: 0;
   }
    25% {
        height: 0;
        width: 7px;
   }
    50% {
        height: 20px;
        width: 7px;
   }
}
@-webkit-keyframes expand {
    0% {
        -webkit-transform: scale3d(1, 0, 1);
        opacity: 0;
   }
    25% {
        -webkit-transform: scale3d(1, 1.2, 1);
   }
    50% {
        -webkit-transform: scale3d(1, 0.85, 1);
   }
    75% {
        -webkit-transform: scale3d(1, 1.05, 1);
   }
    100% {
        -webkit-transform: scale3d(1, 1, 1);
        opacity: 1;
   }
}
@keyframes expand {
    0% {
        -webkit-transform: scale3d(1, 0, 1);
        transform: scale3d(1, 0, 1);
        opacity: 0;
   }
    25% {
        -webkit-transform: scale3d(1, 1.2, 1);
        transform: scale3d(1, 1.2, 1);
   }
    50% {
        -webkit-transform: scale3d(1, 0.85, 1);
        transform: scale3d(1, 0.85, 1);
   }
    75% {
        -webkit-transform: scale3d(1, 1.05, 1);
        transform: scale3d(1, 1.05, 1);
   }
    100% {
        -webkit-transform: scale3d(1, 1, 1);
        transform: scale3d(1, 1, 1);
        opacity: 1;
   }
}
@-webkit-keyframes bounce {
    0% {
        -webkit-transform: translate3d(0, -25px, 0);
        opacity: 0;
   }
    25% {
        -webkit-transform: translate3d(0, 10px, 0);
   }
    50% {
        -webkit-transform: translate3d(0, -6px, 0);
   }
    75% {
        -webkit-transform: translate3d(0, 2px, 0);
   }
    100% {
        -webkit-transform: translate3d(0, 0, 0);
        opacity: 1;
   }
}
@keyframes bounce {
    0% {
        -webkit-transform: translate3d(0, -25px, 0);
        transform: translate3d(0, -25px, 0);
        opacity: 0;
   }
    25% {
        -webkit-transform: translate3d(0, 10px, 0);
        transform: translate3d(0, 10px, 0);
   }
    50% {
        -webkit-transform: translate3d(0, -6px, 0);
        transform: translate3d(0, -6px, 0);
   }
    75% {
        -webkit-transform: translate3d(0, 2px, 0);
        transform: translate3d(0, 2px, 0);
   }
    100% {
        -webkit-transform: translate3d(0, 0, 0);
        transform: translate3d(0, 0, 0);
        opacity: 1;
   }
}
@media (max-width: 600px) {
    .form_wrapper .col_half {
        width: 100%;
        float: none;
   }
    .bottom_row .col_half {
        width: 50%;
        float: left;
   }
    .form_container .row .col_half.last {
        border-left: none;
   }
    .remember_me {
        padding-bottom: 20px;
   }
}
.close{
    height: 0;
}
.close-icon{
    color: white;
    float: right;
    transform: translate(75%, -235%);
}
.close-icon:hover{
    color: #ff6700;
    cursor: pointer;
}
.error{
    color: red;
}
    </style>
</head>
<body>
<div class="popup">
            <div class="form_wrapper">
                <div class="form_container">
                    <div class="title_container">
                    <h2>Add item</h2>
                    </div>
                    <div class="row clearfix">
                    <div class="close">
                        <i class='bx bx-x bx-md close-icon' onclick="close_popup()"></i>
                    </div>
                    <div class="">
                        <form name="additem-form" method="post"  enctype="multipart/form-data" id="additem-form">
                        <div class="input_field"> <span><i aria-hidden="true" class="fas fa-heading"></i></span>
                            <input type="text" name="name" placeholder="Title"  required />
                        </div>
                        <div class="input_field">
                            <textarea name="description" placeholder="Description" rows="3"></textarea>
                        </div>
                        <div class="row clearfix">
                            <div class="col_half">
                            <div class="input_field"> <span><i aria-hidden="true" class="fas fa-sort-amount-up-alt"></i></span>
                                <input type="text" name="quantity" placeholder="Quantity" />
                            </div>
                            </div>
                            <div class="col_half">
                            <div class="input_field"> <span><i aria-hidden="true" class="fas fa-dollar-sign"></i></span>
                                <input type="text" name="price" placeholder="Price per item" required />
                            </div>
                            </div>
                        </div>
                            <div class="input_field select_option">
                                <select onchange = 'addsub_categories(value);' name="category">
                                <option selected disabled>Select the Category</option>
                              </select>
                                <div class="select_arrow"></div>
                            </div>
                            <div class="input_field select_option">
                                <select id="subcategories" name="subcategory">
                                <option value="" disabled selected>Select the sub-category</option>
                                </select>
                                <div class="select_arrow"></div>
                            </div>
                        <input class="button" type="submit" value="Submit"/>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="/jquery-validation-1.19.1/dist/jquery.validate.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script>
    function popup(){
        document.querySelector('.popup').style.display = "flex";
    }
    function close_popup(){
        document.querySelector('.popup').style.display = "none";
    }

    $(function() {

      $("form[name = 'additem-form']").validate({

        rules: {

            name: "required",
            quantity: "required",
            price: "required",
            image: {
              required: true,
              accept: "image/*"
            },
            category: {
              required: true
            },
            subcategory: {
              required: true
            },
            description : "required"
            },
            messages: {
                name: "Please enter the title of the item",
                quantity: "Please specifiy quantity",
                price : "Please enter the price",
                image: {
                    required: "Please provide a product image",
                    accept: "Please only upload files of type image"
                },
                category: {
                    required: "Please choose a category",
                },
                subcategory: {
                    required: "Please choose a subcategory",
                },
                description: "Please enter a description for the item"
              },

            submitHandler: function(form){
              var form = $('form')[1];
              var formdata = new FormData(form);
                $.ajax({
                    url: '<?php echo base_url('Admin/additem')?>',
                    type: 'POST',
                    data: formdata,
                    contentType: false, 
                    processData: false,
                    success: function(response){
                        if(response === "success"){
                        alert('Item added successfully');
                        document.getElementById('additem-form').reset();
                        }else{
                            alert('Server error');
                            document.getElementById('additem-form').reset();
                        }
                    }
                 });
            }
       });
    });


    function addsub_categories(id){
    document.getElementById('subcategories').innerHTML='';
    document.getElementById('subcategories').innerHTML='<option value="" disabled selected>Select the sub-category</option>';
     var request = new XMLHttpRequest();
     var url = "http://localhost:8080/Admin/getSubcategories/"+id;

     request.onreadystatechange = function(){
					if(this.readyState == 4 && this.status == 200){
						var result = request.response;
            const res = JSON.parse(result);
            
            for(var i = 0; i < 3; i++){
              document.getElementById('subcategories').innerHTML+='<option value="'+res.data[i].id+'">'+res.data[i].name+'</option>';
            }
					}
				};

        request.open('GET',url,false);
        request.setRequestHeader('Accept', 'application/json');
			  request.send();
      }
</script>
</body>
</html>