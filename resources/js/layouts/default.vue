<template>
<v-app> 
  <particles-bg color="#121212" type="thick" :bg="true" />
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
import Navbar from "~/components/Navbar"
import { ParticlesBg } from "particles-bg-vue"

export default {
  name: "MainLayout",
  components: {
    Navbar,
    ParticlesBg
  }
};
</script>

<style>
.canvas{
  z-index: 0!important;
  opacity: 0.1!important;
}

</style>