<template>
  <div class="w-screen h-screen flex justify-center">
    <div class="container flex flex-col items-center">
      <upload-form v-on:getPage="getPage"></upload-form>
      <div class="flex flex-row w-75">
        <div class="flex flex-col w-1/2">
          <table-clients :list="list"></table-clients>
          <Pagination :total="total" :currentPage="page" v-on:getPage="getPage"></Pagination>
        </div>
        <div class="flex flex-col w-1/2 items-center">
          <client-chart :graph="graph"></client-chart>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
// @ is an alias to /src
import UploadForm from "@/components/UploadForm";
import TableClients from "@/components/TableClients";
import Pagination from "@/components/Pagination";
import ClientChart from "@/components/ClientChart";
import Clients from "@/repositories/ClientRepository";

const clients = new Clients();

export default {
  name: "Client",
  data() {
    return {
      list: [],
      page: 1,
      total: [],
      graph:[]
    };
  },
  mounted() {
    this.getList(this.page);
    this.getGraph()
  },
  components: {
    UploadForm,
    TableClients,
    Pagination,
    ClientChart
  },
  methods: {
    getGraph(){
      clients.getGraphItems().then(response => {
        let res = response.data
        this.graph = [{
          data: [res.withLastName, res.withGender, res.validEmails]
        }, {
          data: [res.totalCount - res.withLastName, res.totalCount - res.withGender, res.totalCount - res.validEmails]
        }]
      });
    },
    getPage(page){
      if(page == null){
        page = this.page
      }

      this.page = page 
      this.getList(page)
    },
    getList(page) {
      clients.getListPaginate(page).then((response) => {
        console.log(response.data);
        if(response.data == null){
          return
        }
        this.list = response.data;
        this.total = response.data[0].total
      });
    },
  },
};
</script>
