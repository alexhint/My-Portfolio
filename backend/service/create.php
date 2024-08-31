<?php

include "../master/header.php";
include "../../public/fonts/fonts.php";

?>

<div class="row">
        <div class="col">
            <div class="page-description">
                <h1>Insert New Service,</h1>
            </div>
        </div>
</div>


<div class="row">
<div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3>service</h3>
            </div>
            <form action="store.php" method="POST">
            <div class="card-body">
            <label for="exampleInputEmail1" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <label for="exampleInputEmail1" class="form-label">Description</label>
            <textarea type="text" rows="5" name="description" class="form-control"> </textarea>
            <label for="exampleInputEmail1" class="form-label">Icon</label>
            <input type="text" readonly name="icon" class="form-control hudai" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div class="card my-3">
                <div class="card-header">
                    <h5>Select Icons,</h5>
                </div>
                <div class="card-body" style="overflow-y: scroll; height:500px;">
                    <?php foreach($fonts as $font): ?>
                    <span class="m-2 fa-2x">
                        <i class="<?= $font ?>" onclick="myFun(event)"></i>
                    </span>
                    <?php endforeach; ?>
                </div>
            </div>
            
            <button type="submit" name="insert" class="btn btn-primary mt-3"><i class="material-icons">add</i>Insert</button>   
        </div>
            </form>
        </div>
</div>
</div>


<script>

    let input = document.querySelector('.hudai');
    function myFun(e){
        input.value = e.target.classList.value;
    }
</script>

<?php

include "../master/footer.php";

?>