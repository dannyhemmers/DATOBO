<template>
  <v-hover v-slot="{ hover }">
  <v-card
    class="mx-auto my-3"
    max-width="600"
    :elevation="hover ? 14 : 2"
    :class="{ 'on-hover': hover }"
    :to="{ name: path}">
    <v-card-title class="headline">
      <v-icon 
        class="mr-1" 
        v-for="icon in icons" 
        :key="icon">
          {{icon}}
      </v-icon>
      {{title}} 
    </v-card-title>
    <v-card-subtitle>{{ subtitle }}</v-card-subtitle>
  </v-card> 
  </v-hover>
</template>

<script>
export default {
  name: "HomeCard",
  props: ['icons', 'title', 'subtitle', 'path']
};
</script>
