<script>
import CommentItem from "@/components/CommentItem.vue";
import api from "@/api/api.js";

export default {
  name: "CommentsList",
  components: {CommentItem},
  props: {
    comments: Array
  },
  emits:['delete'],
  methods: {
    deleteComment(id) {
      this.$emit('delete', id);
    }
  }
}

</script>
<template>
  <div v-for="comment in comments">
    <CommentItem @delete="deleteComment" :comment="comment"/>
  </div>
</template>

<style scoped>

</style>