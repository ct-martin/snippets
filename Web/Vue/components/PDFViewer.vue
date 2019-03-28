<template>
  <embed-page :src="srcFull"></embed-page>
</template>

<script>
import EmbedPage from '~/components/EmbedPage.vue'

export default {
  props: ['src'],
    components: {
      EmbedPage
    },
  computed: {
    srcFull() {
      // Google Drive Viewer: `https://docs.google.com/gview?url=${this.src}&embedded=true`
      // PDF.js: `https://mozilla.github.io/pdf.js/web/viewer.html?file=${this.src}`
      return `https://docs.google.com/gview?url=${this.src}&embedded=true`;
    }
  }
}
</script>
