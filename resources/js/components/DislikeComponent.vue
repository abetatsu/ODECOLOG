<template>
    <div>
          <a @click="removeunfavorite()" class="text-danger pointer" v-if="result">
          <i class="fas fa-thumbs-down"></i>
          </a>
          <a @click="unfavorite()" class="text-secondary thumbs pointer" v-else>
          <i class="fas fa-thumbs-down"></i>怪しい
          </a>
          {{ count }}
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
    this.hasunfavorites();
    this.countunfavorites();
  },
  methods: {
    unfavorite() {
      axios
        .get("/posts/" + this.post.id + "/unfavorites")
        .then((res) => {
          this.result = res.data.result;
          this.count = res.data.count;
        })
        .catch(function (error) {
          console.log(error);
        });
    },
    removeunfavorite() {
      axios
        .get("/posts/" + this.post.id + "/removeunfavorites")
        .then((res) => {
          this.result = res.data.result;
          this.count = res.data.count;
        })
        .catch(function (error) {
          console.log(error);
        });
    },
    countunfavorites() {
      axios
        .get("/posts/" + this.post.id + "/countunfavorites")
        .then((res) => {
          this.count = res.data;
        })
        .catch(function (error) {
          console.log(error);
        });
    },
    hasunfavorites() {
      axios
        .get("/posts/" + this.post.id + "/hasunfavorites")
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
