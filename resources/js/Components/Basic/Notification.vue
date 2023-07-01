<template>
  <div aria-live="assertive" class="fixed inset-0 flex items-end px-4 py-6 pointer-events-none sm:p-6 sm:items-start z-[9999] notification-msg">
    <transition-group tag="div" class="w-full items-center space-y-4 sm:items-end" name="slide-fade">
      <div
        v-for="notification in notifications"
        :key="notification.key"
        class="max-w-sm w-full bg-light shadow-lg rounded-lg pointer-events-auto ring-1 ring-dark ring-opacity-5 overflow-hidden transition-all notification-box mb-2"
      >
        <div class="p-3">
          <div class="flex items-start">
            <div class="flex-shrink-0">
              <i class="fa-solid fa-check text-success fa-3x mt-1"  v-if="notification.type == 'success'"></i>
              <i class="fa-solid fa-triangle-exclamation fa-3x text-danger mt-1" v-else-if="notification.type == 'error'"></i>
            </div>
            <div class="ml-3 w-0 flex-1 pt-0.5">
              <p class="text-sm font-medium text-light-900">{{ notification.title }}</p>
              <p class="mt-1 text-sm text-light-500">{{ notification.message }}</p>
            </div>
            <div class="ml-4 flex-shrink-0 flex">
                <i class="fa-solid fa-square-xmark fa-2x text-danger cursor-pointer" @click="close(notification)"></i>
            </div>
          </div>
        </div>
      </div>
    </transition-group>
  </div>
</template>

<script>
export default {
  data() {
    return {
      disposerTimer: null,
      notifications: [],
    }
  },
  mounted() {
    this.disposerTimer = setInterval(() => {
      this.notifications = this.notifications.filter((notification) => notification.timeout > new Date().getTime())
    }, 10)
  },
  beforeDestroy() {
    clearInterval(this.disposerTimer)
  },
  methods: {
    close(notify) {
      this.notifications = this.notifications.filter((notification) => notification.key !== notify.key)
    },
    success({ title = 'Succuss', message, timeout = 4000 }) {
      this.notifications.push({
        key: Math.random(),
        title,
        message,
        type: 'success',
        timeout: new Date().getTime() + timeout,
      })
    },
    error({ title = 'Error', message, timeout = 4000 }) {
      this.notifications.push({
        key: Math.random(),
        title,
        message,
        type: 'error',
        timeout: new Date().getTime() + timeout,
      })
    },
  },
}
</script>

<style lang="scss">
.notification-msg{
    position: fixed;
    top: 0rem;
    right: 0rem;

}

</style>
