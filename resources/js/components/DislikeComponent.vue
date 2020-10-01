<template>
    <div>
          <a @click="removeUnfavorite()" class="text-danger pointer" v-if="result">
          <i class="fas fa-thumbs-down"></i>
          </a>
          <a @click="unfavorite()" class="text-secondary thumbs pointer" v-else>
          <i class="fas fa-thumbs-down"></i>
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
    this.hasUnfavorites();
    this.countUnfavorites();
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
    removeUnfavorite() {
      axios
        .get("/posts/" + this.post.id + "/remove/unfavorites")
        .then((res) => {
          this.result = res.data.result;
          this.count = res.data.count;
        })
        .catch(function (error) {
          console.log(error);
        });
    },
    countUnfavorites() {
      axios
        .get("/posts/" + this.post.id + "/count/unfavorites")
        .then((res) => {
          this.count = res.data;
        })
        .catch(function (error) {
          console.log(error);
        });
    },
    hasUnfavorites() {
      axios
        .get("/posts/" + this.post.id + "/has/unfavorites")
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
