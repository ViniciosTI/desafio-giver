<template>
    <ul v-if="total.length > 0" class="m-0 p-0 flex flex-wrap w-1/2" >
        <li class="list-none inline  my-3 text-center"  >
            <a class="cursor-pointer px-2 py-1 mx-2 border border-gray-200 hover:bg-blue-700 hover:text-white shadow-md rounded" @click="setPage(1)" >1</a>
        </li>
        <li class="list-none inline  my-3 text-center" >
            <a class="cursor-pointer px-2 py-1 mx-2 border border-gray-200 hover:bg-blue-700 hover:text-white shadow-md rounded" @click="setPage(currentPage <= 0 ? 1 : currentPage - 1)" >&lt;</a>
        </li>
        <li v-for="page in total" :key="page" class=" my-3 cursor-pointer list-none inline text-center"  >
            <a class="px-2 py-1 mx-2 border border-gray-200 hover:bg-blue-700 hover:text-white shadow-md rounded" :class="{'active': currentPage === page}" @click="setPage(page+1)" >{{page+1}}</a>
        </li>
        <li class="list-none inline  my-3 text-center" >
            <a class="cursor-pointer px-2 py-1 mx-2 border border-gray-200 hover:bg-blue-700 hover:text-white shadow-md rounded" @click="setPage(currentPage >= total.length ? total.length : currentPage + 1)" >&gt;</a>
        </li>
        <li class="list-none inline  my-3 text-center"  >
            <a class="cursor-pointer px-2 py-1 mx-2 border border-gray-200 hover:bg-blue-700 hover:text-white shadow-md rounded" @click="setPage(total.length)" >{{total.length}}</a>
        </li>
    </ul>
</template>

<script>

export default {
    name:"Pagination",
    props:["total", "page", "currentPage"],

    methods:{
        setPage(page){
            this.$emit("getPage", page)
        }
    }
}

</script>