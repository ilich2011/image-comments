<script>
import FooterComponent from "@/components/FooterComponent.vue";
import PageContent from "@/components/PageContent.vue";

export default {
  name: 'App',
  components: {PageContent, FooterComponent},
}
</script>

<template>
  <div class="wrapper">
    <main class="main">
      <PageContent />
    </main>
    <FooterComponent />
  </div>
</template>

<style scoped>
.wrapper{
  display: flex;
  flex-direction: column;
  height: 100%;
}
.main{
  display: flex;
  flex-direction: column;
  align-items: center;
  flex: 1 0 auto;
}

</style>
