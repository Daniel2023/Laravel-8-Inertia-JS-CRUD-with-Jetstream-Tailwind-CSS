<template>
  <app-layout title="Dashboard">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Dashboard
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
          <!-- component -->
          <div class="container mx-auto px-4 sm:px-8">
            <div class="py-8">
              <div>
                <h2 class="text-2xl font-semibold leading-tight">Users</h2>
              </div>
              <div class="my-2 flex sm:flex-row flex-col">
                <div class="flex flex-row mb-1 sm:mb-0">
                  <div class="relative">
                    <select
                      class="
                        appearance-none
                        h-full
                        rounded-l
                        border
                        block
                        appearance-none
                        w-full
                        bg-white
                        border-gray-400
                        text-gray-700
                        py-2
                        px-4
                        pr-8
                        leading-tight
                        focus:outline-none focus:bg-white focus:border-gray-500
                      "
                      @change="filters"
                      v-model="state.filters.perPage"
                    >
                      <option value="5">5</option>
                      <option value="10">10</option>
                      <option value="20">20</option>
                    </select>
                  </div>
                  <div class="relative">
                    <select
                      class="
                        appearance-none
                        h-full
                        rounded-r
                        border-t
                        sm:rounded-r-none sm:border-r-0
                        border-r border-b
                        block
                        appearance-none
                        w-full
                        bg-white
                        border-gray-400
                        text-gray-700
                        py-2
                        px-4
                        pr-8
                        leading-tight
                        focus:outline-none
                        focus:border-l
                        focus:border-r
                        focus:bg-white
                        focus:border-gray-500
                      "
                      @change="filters"
                      v-model="state.filters.orderBy"
                    >
                      <option value="asc">A-Z</option>
                      <option value="desc">Z-A</option>
                    </select>
                  </div>
                </div>
                <div class="block relative">
                  <span
                    class="
                      h-full
                      absolute
                      inset-y-0
                      left-0
                      flex
                      items-center
                      pl-2
                    "
                  >
                    <svg
                      viewBox="0 0 24 24"
                      class="h-4 w-4 fill-current text-gray-500"
                    >
                      <path
                        d="M10 4a6 6 0 100 12 6 6 0 000-12zm-8 6a8 8 0 1114.32 4.906l5.387 5.387a1 1 0 01-1.414 1.414l-5.387-5.387A8 8 0 012 10z"
                      ></path>
                    </svg>
                  </span>
                  <input
                    placeholder="Search"
                    class="
                      appearance-none
                      rounded-r rounded-l
                      sm:rounded-l-none
                      border border-gray-400 border-b
                      block
                      pl-8
                      pr-6
                      py-2
                      w-full
                      bg-white
                      text-sm
                      placeholder-gray-400
                      text-gray-700
                      focus:bg-white
                      focus:placeholder-gray-600
                      focus:text-gray-700
                      focus:outline-none
                    "
                    @keyup.enter="filters"
                    v-model="state.filters.search"
                  />
                </div>
              </div>
              <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                <div
                  class="
                    inline-block
                    min-w-full
                    shadow
                    rounded-lg
                    overflow-hidden
                  "
                >
                  <table class="min-w-full leading-normal">
                    <thead>
                      <tr>
                        <th
                          class="
                            px-5
                            py-3
                            border-b-2 border-gray-200
                            bg-gray-100
                            text-left text-xs
                            font-semibold
                            text-gray-600
                            uppercase
                            tracking-wider
                          "
                        >
                          Nome
                        </th>
                        <th
                          class="
                            px-5
                            py-3
                            border-b-2 border-gray-200
                            bg-gray-100
                            text-left text-xs
                            font-semibold
                            text-gray-600
                            uppercase
                            tracking-wider
                          "
                        >
                          Email
                        </th>
                        <th
                          class="
                            px-5
                            py-3
                            border-b-2 border-gray-200
                            bg-gray-100
                            text-left text-xs
                            font-semibold
                            text-gray-600
                            uppercase
                            tracking-wider
                          "
                        >
                          Data de cadastro
                        </th>
                        <th
                          class="
                            px-5
                            py-3
                            border-b-2 border-gray-200
                            bg-gray-100
                            text-left text-xs
                            font-semibold
                            text-gray-600
                            uppercase
                            tracking-wider
                          "
                        >
                          Excluir
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="user in users.data" :key="user.id">
                        <td
                          class="
                            px-5
                            py-5
                            border-b border-gray-200
                            bg-white
                            text-sm
                          "
                        >
                          <div class="flex items-center">
                            <div class="ml-3">
                              <p class="text-gray-900 whitespace-no-wrap">
                                {{ user.name }}
                              </p>
                            </div>
                          </div>
                        </td>
                        <td
                          class="
                            px-5
                            py-5
                            border-b border-gray-200
                            bg-white
                            text-sm
                          "
                        >
                          <p class="text-gray-900 whitespace-no-wrap">
                            {{ user.email }}
                          </p>
                        </td>
                        <td
                          class="
                            px-5
                            py-5
                            border-b border-gray-200
                            bg-white
                            text-sm
                          "
                        >
                          <p class="text-gray-900 whitespace-no-wrap">
                            {{ user.data_criacao }}
                          </p>
                        </td>
                        <td>
                          <DangerButton @click="excluir(user.id)">
                            Excluir
                          </DangerButton>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  <div
                    class="
                      px-5
                      py-5
                      bg-white
                      border-t
                      flex flex-col
                      xs:flex-row
                      items-center
                      xs:justify-between
                    "
                  >
                    <!-- PAGINAÇÃO -->
                    <div
                      class="inline-flex mt-2 xs:mt-0"
                      v-if="users.last_page != 1"
                    >
                      <Link
                        v-if="users.prev_page_url"
                        :href="users.prev_page_url"
                      >
                        <button
                          class="
                            text-sm
                            bg-gray-300
                            hover:bg-gray-400
                            text-gray-800
                            font-semibold
                            py-2
                            px-4
                            rounded
                            mx-1
                          "
                        >
                          Prev
                        </button>
                      </Link>
                      <Link
                        v-for="link in links"
                        :key="link.label"
                        :href="link.url"
                      >
                        <button
                          class="
                            text-sm
                            bg-gray-300
                            hover:bg-gray-400
                            text-gray-800
                            font-semibold
                            py-2
                            px-4
                            rounded
                            mx-1
                          "
                          :class="{ 'bg-gray-400': link.active }"
                        >
                          {{ link.label }}
                        </button>
                      </Link>
                      <Link
                        v-if="users.next_page_url"
                        :href="users.next_page_url"
                      >
                        <button
                          class="
                            text-sm
                            bg-gray-300
                            hover:bg-gray-400
                            text-gray-800
                            font-semibold
                            py-2
                            px-4
                            rounded
                            mx-1
                          "
                        >
                          Next
                        </button>
                      </Link>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
import { computed, defineComponent, reactive } from "vue";
import { Link } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";
import AppLayout from "@/Layouts/AppLayout.vue";
import DangerButton from "../Jetstream/DangerButton.vue";

export default defineComponent({
  components: {
    AppLayout,
    Link,
    DangerButton,
  },
  props: {
    users: Array,
    perPage: String,
    orderBy: String,
    search: String,
  },
  setup(props) {
    const state = reactive({
      filters: {
        perPage: props.perPage,
        orderBy: props.orderBy,
        search: props.search,
      },
    });

    const links = computed(() => {
      let linksFmt = props.users.links;
      linksFmt.shift();
      linksFmt.pop();
      return linksFmt;
    });

    // FUNÇÃO PARA INSERIR UM GET NA URL
    // EX: URL/?perPage=5
    function filters() {
      Inertia.replace(route("dashboard", { ...state.filters }));
    }

    function excluir(id) {
      Inertia.delete(route("dashboard.delete", { id: id }), {
        onSuccess: () => {
          Inertia.visit(route("dashboard", { ...state.filters }), {
            preserveState: true,
          });
        },
      });
    }

    return {
      links,
      filters,
      excluir,
      state,
    };
  },
});
</script>
