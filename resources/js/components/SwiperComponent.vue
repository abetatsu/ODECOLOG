<template>
     <swiper :options="swiperOption" ref="mySwiper1">
     <swiper-slide v-for="record in records" :key="record.image_path"><img :src="record.image_path"></swiper-slide>
     <div class="swiper-pagination"  slot="pagination"></div>
     <div class="swiper-button-prev" slot="button-prev"></div>
     <div class="swiper-button-next" slot="button-next"></div>
     </swiper>
</template>

<style scoped>
.swiper-slide {
     text-align: center;
}
.swiper-slide img {
     object-fit: contain;
     max-width: 100%;
     overflow: hidden;
}
</style>

<script>
export default {
          props: ["records"],
          data() {
               return {
               swiperOption: {
                    autoplay: {
                         delay: 2500,
                         disableOnInteraction: false
                    },
                    pagination: {
                         el: '.swiper-pagination',
                         clickable: true
                    },
                    navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev'
                    },
               },
          }
     }
}
</script>
