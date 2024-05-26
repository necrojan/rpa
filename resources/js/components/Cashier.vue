<template>
    <div>
        <div class="bg-gray-100 flex flex-wrap items-center justify-center py-5">
            <div class="flex text-red-600 mb-5" v-if="errors">
                {{ errors.message }}
            </div>
            <div class="flex space-x-4 bg-white p-6 rounded-md shadow-md ">
                <input v-model="itemName" type="text" placeholder="Item Name"
                       class="px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                <input v-model="itemPrice" type="text" placeholder="Item Price"
                       class="px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                <button @click="addItem()" type="submit"
                        class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Payment Received
                </button>
            </div>
        </div>
        <div class="bg-gray-100 p-6">
            <div class="max-w-lg mx-auto bg-white shadow-md rounded-lg p-4">
                <h1 class="text-2xl font-bold mb-4">Order List</h1>
                <ul v-if="items.length > 0" v-for="item in items">
                    <li class="flex items-center justify-between py-2 border-b border-gray-200">
                        <div>
                            <span class="block text-lg font-semibold">{{ item.name }}</span>
                            <span class="block text-gray-500">${{ item.price }}</span>
                            <span>
                                  <svg xmlns="http://www.w3.org/2000/svg"
                                       :class="[item.completed === 0 ? 'h-6 w-6 text-gray-500' : 'h-6 w-6 text-green-500']"
                                       fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"/>
                                  </svg>
                                </span>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "Cashier",
    data() {
        return {
            itemName: null,
            itemPrice: null,
            errors: null,
            items: [],
        }
    },

    mounted() {
        Echo.channel('itemupdated')
            .listen('ItemUpdated', (e) => {
                console.log('event from update', e);
                this.getItems();
                console.log('items inside channel', this.items);
            });

        this.getItems();
    },


    methods: {

        async addItem() {
            try {
                let payload = {
                    name: this.itemName,
                    price: this.itemPrice,
                    completed: 0
                }

                let item = await axios.post('/cashier', payload);
                this.items.push(item.data);
                this.itemName = null;
                this.itemPrice = null;
                this.errors = null;
            } catch (e) {
                this.errors = e.response.data;
                console.log('error', e.response.data.message);
            }

        },

        async getItems() {
            try {
                let data = await axios.get('/cashier-list');
                this.items = data.data.items;
                console.log('items', this.items);
            } catch (e) {
                console.log('error', e.message);
            }
        }
    }
}
</script>

<style scoped>

</style>
