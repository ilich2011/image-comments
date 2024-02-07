<script>
import NewCommentForm from "@/components/NewCommentForm.vue";
import CommentsList from "@/components/CommentsList.vue";
import api from "@/api/api.js";
import CommentItem from "@/components/CommentItem.vue";

export default {
  name: "CommentsBlock",
  components: {CommentItem, CommentsList, NewCommentForm},
  data() {
    return {
      comments: []
    }
  },
  async mounted() {
    this.comments = await api.getAll();
  },
  methods: {
    deleteComment(id) {
      this.comments = this.comments.filter(comment => comment.id !== id);
    },
    addComment(comment){
      this.comments.unshift(comment);
    },
  },
}
</script>

<template>
  <div>
    <NewCommentForm @addComment="addComment" />
    <CommentsList @delete="deleteComment" :comments="comments" />
  </div>
</template>

<style scoped>

</style>