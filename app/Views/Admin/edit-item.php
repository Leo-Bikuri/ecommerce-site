<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <style>
    .popup{
        background-color: rgba(0, 0, 0, 0.6);
        width: 100%;
        height: 100%;
        position: absolute;
        top: 0;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .container .row .desc{
        border-right: none;
        width: 110px;
        border-bottom: 1px solid #ccc;
    }
    .container .row textarea{
        padding-top: 30px;
    }
    .container .row  span {
    position: absolute;
    color: #333;
    height: 31px;
    border-right: 1px solid #ccc;
    text-align: center;
    width: 70px;
    padding-top: 0.25%;
    }
    .input-padding{
    padding-left: 75px;
    }
    .avatar-upload {
    position: relative;
    max-width: 205px;
    margin: 50px auto;
}
 .avatar-upload .avatar-edit {
    position: absolute;
    right: 12px;
    z-index: 1;
    top: 10px;
}
 .avatar-upload .avatar-edit input {
	display: none;
}
 .avatar-upload .avatar-edit input + label {
    display: inline-block;
    width: 70px;
    height: 70px;
    margin-bottom: 0;
    border-radius: 100%;
    border: 1px solid transparent;
    box-shadow: 0px 2px 4px 0px rgba(0,0,0,0.12);
    cursor: pointer;
    font-weight: normal;
    transition: all .2s ease-in-out;
    transform: translate(35.45%, -3.3%);
}

 .avatar-upload .avatar-edit input + label:hover {
    background: rgba(0,0,0,0.5);
    border-color: #d6d6d6;
}
 .avatar-upload .avatar-edit input + label:after {
    content: "\f040";
    font-family: 'Font Awesome\ 5 Pro';
    font-weight: 300;
    font-size: 3em;
    color: #ff6700;
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    text-align: center;
    margin: auto;
}
 .avatar-upload .avatar-preview {
	 width: 300px;
	 height: 300px;
	 position: relative;
     transform: translateX(-25%);
	 border-radius: 100%;
	 border: 6px solid #F8F8F8;
	 box-shadow: 0px 2px 4px 0px rgba(0,0,0,0.1);
}
 .avatar-upload .avatar-preview > div {
	 width: 100%;
	 height: 100%;
	 border-radius: 100%;
	 background-size: cover;
	 background-repeat: no-repeat;
	 background-position: center;
}
button{
    width: 20%;
    height: 35px;
    outline: none;
    background: #333;
    color: white;
    outline: none;
}
.searchbutton{
    width: 25px;
    height: 25px;
    border-radius: 100%;
    outline: none;
}
    </style>
</head>
<body>
    <div class="popup">
        <div class="container">
            <div class="modal-header">
                <div class="row">
                    <div class="col-8">
                        <h1 class="text-center modal-title">Modify</h1>
                        <h2 class="text-center modal-title">#90</h2>
                    </div>
                </div>
                <div class="col-4">
                    <div class="search">
                        <form action="" method="post">
                            <input type="text" class="form-control form-control-sm w-50 d-sm-inline-block"placeholder="Search by ID">
                            <button type="submit" class="searchbutton"><i class='bx bx-search' ></i></button>
                        </form>
                    </div>
                </div>
            </div>
            <form action="" class="form-floating">
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <div class="avatar-upload">
                                <div class="avatar-edit">
                                    <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                                    <label for="imageUpload"></label>
                                </div>
                                <div class="avatar-preview">
                                    <div id="imagePreview" style="background-image: url(http://i.pravatar.cc/500?img=7);"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col d-grid gap-3">
                            <div class="row" style="align-content: flex-start;">
                                <span>Title</span>
                                <input type="text" class="form-control form-control-sm input-padding" id="title"> 
                            </div>
                            <div class="row">
                                <div class="col px-1">
                                    <select class="form-select form-select-sm float-start px-3">
                                        <option selected disabled>Choose the category</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                                <div class="col px-1">
                                    <select class="form-select form-select-sm float-end px-3">
                                        <option selected disabled>Choose the sub-category</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col px-1">
                                    <span>Price</span>
                                    <input type="text" class="form-control form-control-sm input-padding" id="title"> 
                                </div>
                                <div class="col px-1">
                                    <span>Stock</span>
                                    <input type="text" class="form-control form-control-sm input-padding" id="title"> 
                                </div>
                            </div>
                            <div class="row">
                                <span class="desc">Description</span>
                                <textarea id="description" rows="4" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer position-relative">
                    <button type="submit" class="position-absolute top-100 start-50 translate-middle">Modify</button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="/jquery-validation-1.19.1/dist/jquery.validate.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagePreview').css('background-image', 'url('+e.target.result +')');
                    $('#imagePreview').hide();
                    $('#imagePreview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#imageUpload").change(function() {
            readURL(this);
        });
    </script>
</body>
</html>