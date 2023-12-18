<template>
    <div id="carousel-container">
      <div id="carousel" :style="{ transform: `translateX(${translateValue}px)` }">
        <div class="tip" v-for="(tip, index) in tips" :key="index">{{ tip }}</div>
      </div>
    </div>
  </template>
  
  <script>


  export default {
    data() {
      return {
        tips: [
            "Cadastre um usuário e faça boa parte das ações através dele.",
            "É possível fazer edições nas listas",
            "Me contrate",
          ],
        currentIndex: 0,
        translateValue: 0,
      };
    },
    methods: {
      showTip(index) {
        const itemWidth = this.$el.querySelector('.tip').offsetWidth;
        this.translateValue = -index * itemWidth;
      },
      nextTip() {
        this.currentIndex = (this.currentIndex + 1) % this.tips.length;
        this.showTip(this.currentIndex);
      },
    },
    mounted() {
      setInterval(this.nextTip, 3000);
      this.showTip(this.currentIndex);
    },
  };
  </script>
  
  <style scoped>
  #carousel-container {
    width: 300px;
    overflow: hidden;
    margin: 20px auto;
  }
  
  #carousel {
    display: flex;
    transition: transform 0.5s ease-in-out;
  }
  
  .tip {
    min-width: 300px;
    padding: 20px;
    box-sizing: border-box;
    text-align: center;
    font-size: 0.9rem;

  }
  </style>