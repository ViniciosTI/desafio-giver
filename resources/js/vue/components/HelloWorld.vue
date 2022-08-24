<template>
  <div class="">
    <h1>finalmente esse caralho ta funcionando</h1>
    <input type="file" name="file" ref="files" />
    <button @click="send">Greet</button>
  </div>
</template>

<script>
export default {
  name: "HelloWorld",
  props: {
    msg: String,
  },
  data() {
    return {
      name: "",
      file: [],
    };
  },
  methods: {
    async send(event) {
      event.preventDefault();
      let dataForm = new FormData();
      for (let file of this.$refs.files.files) {
        dataForm.append(`file`, file);
      }
      let url = "http://localhost:8000/clients/uploadFile";
      // const data = {
      //   name: this.name,
      //   file: this.file,
      // }
      console.log("entrei aqui");
      await this.axios.post(url, dataForm).then((response) => {
        console.log(response.data);
        console.log("depois aqui");
      });


      url = "http://localhost:8000/clients/findByPaginate/"+2;
      await this.axios.get(url).then((response) => {
        console.log(response.data);
        console.log("depois aqui");
        
      });
    },

    fileChange(event) {
      console.log(event);
      this.file = event.target.files;
    },
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
h3 {
  margin: 40px 0 0;
}
ul {
  list-style-type: none;
  padding: 0;
}
li {
  display: inline-block;
  margin: 0 10px;
}
a {
  color: #42b983;
}
</style>
