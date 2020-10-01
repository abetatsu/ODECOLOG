<template>
  <div>
    <a @click="removeFavorite()" class="text-success pointer" v-if="result">
      <i class="fas fa-thumbs-up"></i>
    </a>
    <a @click="favorite()" class="text-secondary thumbs pointer" v-else>
      <i class="fas fa-thumbs-up"></i>
    </a>
    <p class="text-muted d-inline-block">{{ count }}</p>
  </div>
</template>

<script>
export default {
  props: ["post"],
  data() {
    return {
      count: "",
      result: "false",
    };
  },
  mounted() {
    this.hasFavorites();
    this.countFavorites();
  },
  methods: {
    favorite() {
      axios
        .get("/posts/" + this.post.id + "/favorites")
        .then((res) => {
          this.result = res.data.result;
          this.count = res.data.count;
        })
        .catch(function (error) {
          console.log(error);
        });
    },
    removeFavorite() {
      axios
        .get("/posts/" + this.post.id + "/remove/favorites")
        .then((res) => {
          this.result = res.data.result;
          this.count = res.data.count;
        })
        .catch(function (error) {
          console.log(error);
        });
    },
    countFavorites() {
      axios
        .get("/posts/" + this.post.id + "/count/favorites")
        .then((res) => {
          this.count = res.data;
        })
        .catch(function (error) {
          console.log(error);
        });
    },
    hasFavorites() {
      axios
        .get("/posts/" + this.post.id + "/has/favorites")
        .then((res) => {
          this.result = res.data;
        })
        .catch(function (error) {
          console.log(error);
        });
    },
  },
};
</script>
