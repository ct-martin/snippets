<template>
  <div>
    <custom-list-group-item :project="project" v-for="project in this.itemList" :key="project.name" />
  </div>
</template>

<script>
import CustomListGroupItem from '~/components/CustomListGroupItem.vue'

// 'source' is required
// 'tag' is optional, uses AND logic (all tags required)
export default {
  props: ['source', 'tag'],
  components: {
    CustomListGroupItem
  },
  computed: {
    itemList() {
      if(!this.source) return null;

      let store = Array.from(this.$store.state[this.source].list);

      if(this.tag) {
        this.tag.split(',').forEach(
          tag => store = store.filter(item => item.tags.includes(tag))
        );
      }

      return store.slice(0,3);
    }
  }
}
</script>
