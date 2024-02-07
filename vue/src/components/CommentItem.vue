<script>
import api from "@/api/api.js";

export default {
  name: "CommentItem",
  props: {
    comment: {
      id: Number,
      userName: String,
      content: String,
      date: String,
    }
  },
  emits:['delete'],
  methods: {
    async deleteComment() {
      await api.deleteComment(this.comment.id);
      this.$emit('delete', this.comment.id);
    }
  },
}
</script>

<template>
  <div class="commentItem">
    <p>{{ comment.content }}</p>
    <div class="info">
      <span>Имя: {{ comment.userName }}</span>
      <span>Время отправки: {{ comment.date }}</span>
      <button @click="deleteComment">Удалить</button>
    </div>
  </div>
</template>

<style scoped>
.commentItem {
  margin: 20px;
  padding: 20px;
  border: black;
  background-color: aliceblue;
  display: flex;
  flex-direction: column;
}

.info {
  display: flex;
  justify-content: space-between;
}
</style>