<template>
  <transition name="error" appear>
    <div
      class="error flex-between flex-col sm:flex-row"
      v-if="form.errors.has(field)"
    >
      <p v-html="form.errors.get(field)" class="text-xs mx-2" />
    </div>
  </transition>
</template>

<script>
// todo functional

import { HasError } from "vform";
export default {
  extend: HasError,
  components: {

  },
  name: "Error",
  props: {
    form: {
      type: Object,
      required: true
    },

    field: {
      type: String,
      required: true
    }
  }
};
</script>

<style scoped lang="scss">
.error {
  @apply my-1 py-1 px-2 bg-red-300 text-red-800 error max-h-full rounded shadow;
}
.error-enter-active {
  transition: all 200ms ease-out;
}
.error-leave-active {
  transition: all 100ms ease-in;
}
.error-enter,
.error-leave-to {
  max-height: 0;
  transform: scale(0.9);
  opacity: 0;
}
</style>
