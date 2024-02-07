<script>
import CommentsBlock from "@/components/CommentsBlock.vue";

export default {
  name: "PageContent",
  components: {CommentsBlock}
}
</script>

<template>
  <div>
    <h1>Комментарии к PHP</h1>
  </div>
  <div>
    <figure>
      <img src="https://i.pinimg.com/736x/d9/f6/35/d9f635b7c2ef10d04d66eec17a0613a6.jpg">
    </figure>
    <CommentsBlock />
  </div>
</template>

<style scoped>

</style>