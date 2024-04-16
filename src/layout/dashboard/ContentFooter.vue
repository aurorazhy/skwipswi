<template>
  <footer class="footer">
    <div class="container-fluid">
      <ul class="nav">
        <li class="nav-item">
          <a class="nav-link" href="http://www.creative-tim.com">
            Zadde Auto Mobil
          </a>
        </li>
      </ul>
      <div class="copyright">
        © {{ year }} made with <i class="tim-icons icon-heart-2"></i> by
       Zadde Auto Mobil &
        Aurora
      </div>
    </div>
  </footer>
</template>
<script>
export default {
  data() {
    return {
      year: new Date().getFullYear(),
    };
  },
};
</script>
<style></style>
