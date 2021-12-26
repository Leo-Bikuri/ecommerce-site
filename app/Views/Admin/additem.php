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
                        <div class="input_field">
                            <span><i aria-hidden="true" class="fas fa-heading"></i></span>
                            <input type="text" name="name" placeholder="Title"  required />
                        </div>
                        <div class="form-outline mb-4">
                                    <label class="form-label img-lbl" for="customFile">Image</label>
                                    <input type="file" id="customFile" style="background: white;" class="form-control border-bottom rounded-0" name="image"/>
                                </div>
                        <div class="input_field">
                            <textarea name="description" placeholder="Description" rows="3"></textarea>
                        </div>
                        <div class="row clearfix">
                            <div class="col_half">
                            <div class="input_field">
                                <span><i aria-hidden="true" class="fas fa-sort-amount-up-alt"></i></span>
                                <input type="text" name="quantity" placeholder="Quantity" />
                            </div>
                            </div>
                            <div class="col_half">
                            <div class="input_field">
                                <span><i aria-hidden="true" class="fas fa-dollar-sign"></i></span>
                                <input type="text" name="price" placeholder="Price per item" required />
                            </div>
                            </div>
                        </div>
                            <div class="input_field select_option">
                                <select onchange = 'addsub_categories(value);' name="category">
                                <option selected disabled>Select the Category</option>
                                <?php foreach($categories as $arr){
                                        echo "<option id=".$arr['category_id']." value = ".$arr['category_id'].">".$arr['category_name']."</option>";
                                    }?>
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
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function popup(){
        document.querySelector('.popup').style.display = "flex";
    }
    function close_popup(){
        document.querySelector('.popup').style.display = "none";
        document.location.reload('false');
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
                        if(response == "success"){
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Product Added Successfully',
                            timer: 1500,
                            showConfirmButton: false,
                            allowOutsideClick:false,
                            timerProgressBar: true,
                        }).then(() => {
                                document.getElementById('additem-form').reset();
                            })
                        }else{
                           Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: 'Internal Server Error',
                            timer: 1500,
                            showConfirmButton: false,
                            allowOutsideClick:false,
                            timerProgressBar: true,
                           })
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