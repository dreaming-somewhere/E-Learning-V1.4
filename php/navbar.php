<div class="flex-column w-100">
  <nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
      <a href="#"><i class="text-dark mx-3 bi bi-arrow-left-circle" id="btn"></i></a>
      <div class="d-flex align-items-center justify-content-center">
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        </form>
        <a href="#"><i class="text-dark mx-3 bi bi-bell"></i></a>
      </div>

    </div>
  </nav>

<script>
  let btn = document.querySelector("#btn");
  let sidebar = document.querySelector(".side_bar");

  btn.onclick = function(){
    sidebar.classList.toggle("active");
  }
</script>
<style>
  .side_bar{
    display:block;
  }
  .side_bar.active{
    display:none;
  }
</style>
