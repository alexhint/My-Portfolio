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
            <label for="exampleInputEmail1" class="form-label">Education Title</label>
            <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <label for="exampleInputEmail1" class="form-label">Education Year</label>
            <input type="text" name="year" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <label for="exampleInputEmail1" class="form-label">Education Ratio</label>
            <select class="form-select" name="ratio">
                <?php for($i=1;$i <= 100; $i++): ?>
                <option value="<?= $i ?>"><?= $i ?> %</option>
                <?php endfor; ?>
            </select>
            <!-- <input type="text" readonly name="icon" class="form-control hudai" id="exampleInputEmail1" aria-describedby="emailHelp"> -->
            
            <button type="submit" name="insert" class="btn btn-primary mt-3"><i class="material-icons">add</i>Insert</button>   
        </div>
            </form>
        </div>
</div>
</div>


<?php

include "../master/footer.php";

?>