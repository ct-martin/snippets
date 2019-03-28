<template>
  <nuxt-link v-if="project.url.search(/^http[s]{0,1}:\/\/(.*)/gmi) !== 0" :to="project.url" class="card is-block">
    <div class="card-content">
      <p class="subtitle"><span v-if="project.icon" :class="project.icon" class="fa fa-fw"></span>{{ project.name }}</p>
      <p>{{ project.description }}</p>
    </div>
    <!--<span class="fa fa-chevron-right"></span>-->
  </nuxt-link>
  <a v-else :href="project.url" class="card is-block" target="_blank">
    <div class="card-content">
      <p class="subtitle"><span v-if="project.icon" :class="project.icon" class="fa fa-fw"></span>{{ project.name }}</p>
      <p>{{ project.description }}</p>
    </div>
    <!--<span class="fa fa-chevron-right"></span>-->
  </a>
</template>

<script>
export default {
  props: ['project'],
}
</script>
