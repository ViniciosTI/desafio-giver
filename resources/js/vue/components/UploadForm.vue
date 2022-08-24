<template>
  <div
    class="
      w-1/2
      dark:bg-gray-200
      h-fit
      shadow-md
      rounded
      px-8
      pt-6
      pb-6
      mt-6
      mb-4
    "
  >
    <input
      class="
        form-control
        block
        w-full
        text-base
        font-normal
        text-gray-700
        bg-white bg-clip-padding
        border border-solid border-gray-300
        rounded
        transition
        ease-in-out
        m-0
        focus:text-gray-700
        focus:bg-white
        focus:border-blue-600
        focus:outline-none
      "
      v-on:change="handleFileChange"
      type="file"
      id="formFile"
    />

    <p class="mt-1 text-sm text-start ml-2 text-gray-800" id="file_input_help">
      Apenas arquivos .csv
    </p>
    <div class="w-full flex justify-start mt-4">
      <button
        type="button"
        @click="send"
        class="
          inline-block
          px-6
          py-2.5
          bg-blue-600
          text-white
          font-medium
          text-xs
          leading-tight
          uppercase
          rounded
          shadow-md
          hover:bg-blue-700 hover:shadow-lg
          focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0
          active:bg-blue-800 active:shadow-lg
          transition
          duration-150
          ease-in-out
        "
      >
        Enviar
      </button>
    </div>
  </div>
</template>

<script>
// @ is an alias to /src
import Clients from "@/repositories/ClientRepository";
const clients = new Clients();
export default {
  name: "UploadForm",
  props: ["page"],
  data() {
    return {
      name: "",
      file: null,
    };
  },
  components: {},
  methods: {
    handleFileChange(e) {
      this.file = e.target.files[0];
    },

    async send(event) {
      event.preventDefault();
      let dataForm = new FormData();
      dataForm.append(`file`, this.file);
      await this.upload(dataForm);
    },

    upload(data) {
      clients.uploadCsvFile(data).then((response) => {
        console.log("response.data");
        console.log("response.data");
        console.log("response.data");
        console.log(response.data);
        this.$emit("getPage", null)
        this.$emit("getGraph", true)
      });
    },

  },
};
</script>
