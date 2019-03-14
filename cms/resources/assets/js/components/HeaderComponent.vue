<template>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light"　v-cloak>
            <a class="navbar-brand" href="">Twitter</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                  <li class="nav-item active">
                      <router-link to="/login" class="nav-link">signin<span class="sr-only">(current)</span></router-link>
                  </li>
                  <li class="nav-item active">
                      <router-link to="/register" class="nav-link">signup<span class="sr-only">(current)</span></router-link>
                  </li>
              </ul>
            </div>
        </nav>    
    </header>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>


