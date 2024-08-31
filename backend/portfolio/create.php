<?php

include "../master/header.php";
include "../../public/fonts/fonts.php";

?>

<div class="row">
        <div class="col">
            <div class="page-description">
                <h1>Insert New Portfolio,</h1>
            </div>
        </div>
</div>


<div class="row">
<div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3>Portfolio</h3>
            </div>
            <form action="store.php" method="POST" enctype="multipart/form-data">
            <div class="card-body">
            <label for="exampleInputEmail1" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <label for="exampleInputEmail1" class="form-label">Sub Title</label>
            <input type="text" name="subtitle" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <label for="exampleInputEmail1" class="form-label">Description</label>
            <textarea type="text" rows="5" name="description" class="form-control"> </textarea>
            <picture class="d-block my-4 d-flex justify-content-center">
                <img id="khamokha" src="../../public/uploads/default/demoimg.jpg" alt="" style="width: 100%; height:300px; object-fit:contain;">
            </picture>
            <label for="exampleInputEmail1" class="form-label">Image</label>
            <input onchange="document.getElementById('khamokha').src = window.URL.createObjectURL(this.files[0])" type="file" name="image" class="form-control hudai" id="exampleInputEmail1" aria-describedby="emailHelp">
            
            <button type="submit" name="insert" class="btn btn-primary mt-3"><i class="material-icons">add</i>Insert</button>   
        </div>
            </form>
        </div>
</div>
</div>

<?php

include "../master/footer.php";

?>