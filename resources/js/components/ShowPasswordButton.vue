<template>

</template>

<script>
export default {
  name: "ShowPassword",
  components: {  },
  props: {
    color: { type: String, required: false }
  },
  mounted() {
    document.getElementById("showPass").addEventListener("touchstart", () => {
      this.showPass();
    });
    document.getElementById("showPass").addEventListener("touchend", () => {
      this.hidePass();
    });
  },
  methods: {
    showPass() {
      this.$emit("click", "text");
    },
    hidePass() {
      this.$emit("click", "password");
    }
  }
};
</script>
