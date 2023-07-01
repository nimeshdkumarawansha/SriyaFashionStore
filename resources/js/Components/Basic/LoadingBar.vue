<template>
  <div v-if="loading" class="loading-page">
    <div class="text-center container loading-body">
      <p class="text-success pt-1 animation_i">
        <img src="/img/logo/Ferentino-Logo-Just-F.png" alt="" class="animation_img">
      </p>
    </div>
  </div>
</template>

<script>
export default {
  data: () => ({
    loading: false,
  }),
  methods: {
    start() {
      this.loading = true
    },
    finish() {
      this.loading = false
    },
  },
}
</script>

<style scoped>
.animation_i {
  animation: loader 2s ease-out;
  opacity: 0.6;
}

/* Define the animation */
@keyframes blink {
  0% {
    opacity: 0.7;
  }

  50% {
    opacity: 0.3;
  }

  100% {
    opacity: 0.7;
  }
}

/* Apply the animation to the element */
.animation_i {
  animation: blink 1s infinite;
}

.animation_img{
  width: 8rem;
  margin: auto;
}

.loading-page {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: #e6f1e64d;
  text-align: center;
  padding-top: 200px;
  font-size: 30px;
  font-family: sans-serif;
  z-index: 99999;
}

.loading-body {
  position: relative;
  top: 20%;
}

.loader {
  width: 50px;
  height: 50px;
  display: inline-block;
  padding: 0px;
  opacity: 0.5;
  border: 3px solid #09acfd;
  -webkit-animation: loader 1s ease-in-out infinite alternate;
  animation: loader 1s ease-in-out infinite alternate;
}

.loader:before {
  content: ' ';
  position: absolute;
  z-index: -1;
  top: 5px;
  left: 5px;
  right: 5px;
  bottom: 5px;
  border: 3px solid #09acfd;
}

.loader:after {
  content: ' ';
  position: absolute;
  z-index: -1;
  top: 15px;
  left: 15px;
  right: 15px;
  bottom: 15px;
  border: 3px solid #09acfd;
}

@keyframes loader {
  from {
    transform: rotate(0deg) scale(1, 1);
    border-radius: 0px;
  }

  to {
    transform: rotate(360deg) scale(0, 0);
    border-radius: 50px;
  }
}

@-webkit-keyframes loader {
  from {
    -webkit-transform: rotate(0deg) scale(1, 1);
    border-radius: 0px;
  }

  to {
    -webkit-transform: rotate(360deg) scale(0, 0);
    border-radius: 50px;
  }
}
</style>
