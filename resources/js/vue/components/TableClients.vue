<template>
  <div class="flex flex-col">
    <div class="overflow-x-auto">
      <div class="p-1.5 w-full inline-block align-middle">
        <div class="overflow-hidden border rounded-lg">
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr>
                <th
                  scope="col"
                  class="
                    px-6
                    py-3
                    text-xs
                    font-bold
                    text-left text-gray-500
                    uppercase
                  "
                >
                  ID
                </th>
                <th
                  scope="col"
                  class="
                    px-6
                    py-3
                    text-xs
                    font-bold
                    text-left text-gray-500
                    uppercase
                  "
                >
                  Nome
                </th>
                <th
                  scope="col"
                  class="
                    px-6
                    py-3
                    text-xs
                    font-bold
                    text-left text-gray-500
                    uppercase
                  "
                >
                  Sobrenome
                </th>
                <th
                  scope="col"
                  class="
                    px-6
                    py-3
                    text-xs
                    font-bold
                    text-left text-gray-500
                    uppercase
                  "
                >
                  Email
                </th>
                <th
                  scope="col"
                  class="
                    px-6
                    py-3
                    text-xs
                    font-bold
                    text-left text-gray-500
                    uppercase
                  "
                >
                  Genero
                </th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
              <tr v-for="item in list" v-bind:key="item.id">
                <td
                  class="
                    px-6
                    py-4
                    text-sm
                    font-medium
                    text-gray-800
                    whitespace-nowrap
                  "
                >
                  {{ item.id }}
                </td>
                <td class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap">
                  {{ item.firstName }}
                </td>
                <td class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap">
                  {{ item.lastName }}
                </td>
                <td class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap">
                  {{ item.email }}
                </td>
                <td class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap">
                  {{ item.gender }}
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "TableClients",
  props: ["list"],
};
</script>