<template>
  <div class="embed-responsive embed-responsive-16by9">
    <iframe
      :src="src"
      border="0"
      class="embed-responsive-item"
      allowfullscreen="true"
      mozallowfullscreen="true"
      webkitallowfullscreen="true"
    ></iframe>
  </div>
</template>

<script>
export default {
  props: ['src']
}
</script>
