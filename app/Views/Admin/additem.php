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
                  <!-- 2 column grid layout with text inputs for the first and last names -->
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
                                <input type="text" id="form6Example3" class="form-control border-bottom border-warning rounded-0 w-100" />
                                <label class="form-label text-white" for="form6Example3">Category</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mb-4">
                            <div class="form-outline">
                                <input type="text" id="form6Example4" class="form-control border-bottom border-warning rounded-0 w-50" />
                                <label class="form-label text-white" for="form6Example4">Sub Category</label>
                            </div>
                        </div>
                    </div>


                  <!-- Email input -->
                  <div class="form-outline mb-4">
                    <input type="email" id="form6Example5" class="form-control border-bottom border-warning rounded-0 w-25" />
                    <label class="form-label text-white" for="form6Example5">Price</label>
                  </div>

                  <!-- Number input -->
                  <div class="form-outline mb-4">
                    <label class="form-label text-white img-lbl" for="customFile">Image</label>
                    <input type="file" id="customFile" class="form-control border-bottom border-warning rounded-0 w-75" />
                  </div>

                  <!-- Message input -->
                  <div class="form-outline mb-4">
                    <textarea class="form-control border-bottom border-warning rounded-0 w-75" data-mdb-showcounter="true" maxlength="20" id="form16" rows="4"></textarea>
                    <label class="form-label text-white" for="form6Example7">Description</label>
                  </div>

                  <!-- Submit button -->
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
</body>
</html>