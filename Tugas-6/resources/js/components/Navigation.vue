<template>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="#">Navbar</a>
    <button
      class="navbar-toggler"
      type="button"
      data-toggle="collapse"
      data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <router-link class="nav-link" exact :to="{ name: 'home' }">Home</router-link>
        </li>
        <li class="nav-item">
          <router-link class="nav-link" :to="{ name: 'pages.student' }">Student</router-link>
        </li>
        <li class="nav-item">
          <router-link class="nav-link" :to="{ name: 'pages.lesson' }">Lesson</router-link>
        </li>
      </ul>
    </div>
  </nav>
</template>

<script>
export default {
  mounted() {
    console.log("Component mounted.");
  },
};
</script>
