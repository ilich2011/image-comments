<script>
import api from "@/api/api.js";

export default {
  name: "NewCommentForm",
  emits:['addComment'],
  data() {
    return {
      form: {
        userName: '',
        content: '',
      }
    }
  },
  methods: {
    validateForm(){
      return (this.form.userName.length !== 0) && (this.form.content.length !== 0);
    },
    async addNewComment() {
      if (this.validateForm()) {
        const comment = await api.addNewComment(this.form);
        this.$emit('addComment', comment);
      } else {
        alert('Пожалуйста, заполните все поля');
      }
    },
  }
}

</script>

<template>
  <form @submit.prevent="addNewComment">
    <textarea v-model.trim="form.content" class="commentContent" cols="40" name="comment"
              placeholder="Место для комментария"></textarea>
    <div class="extendedData">
      <input v-model.trim="form.userName" type="text" name="userName" placeholder="Введите имя">
      <input type="checkbox">
      <button>Отправить</button>
    </div>
  </form>
</template>

<style scoped>
form {
  background-color: bisque;
  padding: 20px;
  display: flex;
  flex-direction: column;
}

.commentContent {
  height: 80px;
  resize: none;
}

.extendedData {
  display: flex;
  justify-content: space-between;
  margin-top: 20px;
}
</style>