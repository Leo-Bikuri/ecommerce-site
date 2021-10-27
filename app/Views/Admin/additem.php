<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css" rel="stylesheet"/>
    <link href="/assets/css/inventory.css" rel="stylesheet">
    <title>Apparel</title>
</head>
<body>
<section class="intro">
  <div class="background">
    <div class="mask d-flex align-items-center h-100 position-static content">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12 col-lg-10">
            <div class="card background" style="border-radius: 1rem;">
              <div class="card-body p-5">

                <h1 class="mb-5 text-start text-decoration-underline text-white">Add New Item</h1>

                <form>

                  <div class="row">
                    <div class="col-12 col-md-6 mb-4">
                      <div class="form-outline">
                        <input type="text" id="form6Example1" class="form-control border-bottom border-warning rounded-0" />
                        <label class="form-label text-white" for="form6Example1">Title</label>
                      </div>
                    </div>
                    <div class="col-12 col-md-6 mb-4">
                      <div class="form-outline">
                        <input type="text" id="form6Example2" class="form-control border-bottom border-warning rounded-0 w-50" />
                        <label class="form-label text-white" for="form6Example2">Quantity</label>
                      </div>
                    </div>
                  </div>

                    <div class="row">
                        <div class="col-12 col-md-6 mb-4">
                            <div class="form-outline mb-4">
                              <select class="mdb-select md-form select">
                                <option value="" disabled selected>Choose category</option>
                                <option value="1">Men</option>
                                <option value="2">Women</option>
                                <option value="3">Children</option>
                                <option value="3">Pets</option>
                              </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mb-4">
                            <div class="form-outline">
                                <select class="mdb-select md-form select sub">
                                    <option value="" disabled selected>Choose sub-category</option>
                                    <option value="1">Men</option>
                                    <option value="2">Women</option>
                                    <option value="3">Children</option>
                                    <option value="3">Pets</option>
                                </select>
                            </div>
                        </div>
                    </div>


                  <div class="form-outline mb-4">
                    <input type="email" id="form6Example5" class="form-control border-bottom border-warning rounded-0 w-25" />
                    <label class="form-label text-white" for="form6Example5">Price</label>
                  </div>


                  <div class="form-outline mb-4">
                    <label class="form-label text-white img-lbl" for="customFile">Image</label>
                    <input type="file" id="customFile" class="form-control border-bottom border-warning rounded-0 w-75" />
                  </div>

   
                  <div class="form-outline mb-4">
                    <textarea class="form-control border-bottom border-warning rounded-0 w-75" data-mdb-showcounter="true" maxlength="20" id="form16" rows="4"></textarea>
                    <label class="form-label text-white" for="form6Example7">Description</label>
                  </div>


                  <button type="submit" class="btn btn-secondary btn-rounded btn-block btn-color w-75">Submit</button>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script>


</script>
</body>
</html>