<template>
<v-app> 
<v-main>
<div class="main-layout">
    <Navbar />

    <div class="container mt-4">
      <transition name="page" mode="out-in">
        <slot>
          <router-view />
        </slot>
      </transition>
    </div>
  </div>
</v-main>
</v-app>
</template>

<script>
import Navbar from "~/components/Navbar";

export default {
  name: "MainLayout",
  components: {
    Navbar
  }
};
</script>

<style>
body{
  background-color: #1A202C!important;
}

</style>