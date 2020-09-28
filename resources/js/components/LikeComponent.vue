<template>
  <div>
       {{ count }}
    <a @click="removefavorite()" class="text-success pointer" v-if="result">
      <i class="fas fa-thumbs-up"></i>
    </a>
    <a @click="favorite()" class="text-secondary thumbs pointer" v-else>
      <i class="fas fa-thumbs-up"></i>いいね
    </a>
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
    this.hasfavorites();
    this.countfavorites();
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
    removefavorite() {
      axios
        .get("/posts/" + this.post.id + "/removefavorites")
        .then((res) => {
          this.result = res.data.result;
          this.count = res.data.count;
        })
        .catch(function (error) {
          console.log(error);
        });
    },
    countfavorites() {
      axios
        .get("/posts/" + this.post.id + "/countfavorites")
        .then((res) => {
          this.count = res.data;
        })
        .catch(function (error) {
          console.log(error);
        });
    },
    hasfavorites() {
      axios
        .get("/posts/" + this.post.id + "/hasfavorites")
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