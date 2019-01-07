<!-- about.php -->
<div class="main">

<div class="container about">

    <h3>About!</h3>

    <p><button class="fruit-btn add" onclick="toggle_visibility('add')">Click here to add a fruit!</button></p>

    <form class="" id="add" style="display:none; margin: 1rem 0 1rem 0;" action="/about/addAction" method="post">
        <input type="text" name="name" placeholder="Bananas?">
        <button class="fruit-btn add" type="submit" name="add">Add</button>
    </form>



    <ul class='list-group list-unstyled'>
    <?

    foreach($data as $fruit) {

        echo "<li class='list-group-item'>".$fruit['name']."<a class='fruit-btn edit' onclick=toggle_visibility('edit".$fruit['id']."')>EDIT</a><a class='fruit-btn delete' href='/about/deleteAction?id=".$fruit['id']."'>DELETE</a></li>";
        echo "<form class='' id='edit".$fruit['id']."' action='/about/updateAction?id=".$fruit['id']."&&name=".$fruit['name']."' style='display:none; margin: 1rem 0 1rem 0;' method='post'>
            <input type='text' name='name' placeholder=".$fruit['name'].">
            <a class='fruit-btn update'>UPDATE</a>
        </form>";
    }



    ?>
</ul>
</div>
</div>

<script>

function toggle_visibility(id) {

  var e = document.getElementById(id);
  if (e.style.display == 'block' || e.style.display == '')
    e.style.display = 'none';
  else
    e.style.display = 'block';
}

</script>
